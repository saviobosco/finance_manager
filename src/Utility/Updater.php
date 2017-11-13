<?php
/**
 * Created by PhpStorm.
 * User: saviobosco
 * Date: 11/4/17
 * Time: 10:50 PM
 */

namespace App\Utility;

use Cake\Filesystem\Folder;
use Migrations\Migrations;

/**
 * Class Updater
 * @package App\Utility
 * This is the main file for updating the application
 */
class Updater
{
    private $updateSrcPath ;

    private $updateDestPath = ROOT;

    /**
     * @param $updateSrcPath
     * @param $updateDestPath
     */
    public function __construct($updateSrcPath,$updateDestPath = null )
    {
        $this->setUpdateSrcPath($updateSrcPath);

        if ( !is_null($updateDestPath)) {
            $this->setUpdateDestPath($updateDestPath);
        }
    }

    public function runMigrations()
    {
        $migration = new Migrations(['source'=>$this->getUpdateSrcPath().DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'Migrations']);

        try {
            if ($migration->migrate()) {
                return true;
            }
        } catch ( \Exception $e ) {
            return false;
        }
    }

    public function installComposerPackages()
    {

    }

    public function copyAppFiles()
    {
        $folder = new Folder($this->getUpdateSrcPath());

        $status = $folder->copy([
                    'to' => $this->getUpdateDestPath(),
                    'scheme' => Folder::MERGE
                  ]);

        if ($status) {
            return true;
        }
        return false;
    }

    public function removeUpdateFile()
    {
        $folder = new Folder($this->getUpdateSrcPath());

        if ($folder->delete()) {
            return true;
        }
    }

    public function finalizeUpdate()
    {
        // clear the database cache to prevent any error
        $command = 'bin'.DIRECTORY_SEPARATOR.'cake orm_cache clear';

        passthru($command);
    }



    /**
     * @return mixed
     */
    public function getUpdateSrcPath()
    {
        return $this->updateSrcPath;
    }

    /**
     * @param mixed $updateSrcPath
     */
    public function setUpdateSrcPath($updateSrcPath)
    {
        $this->updateSrcPath = $updateSrcPath;
    }

    /**
     * @return string
     */
    public function getUpdateDestPath()
    {
        return $this->updateDestPath;
    }

    /**
     * @param string $updateDestPath
     */
    public function setUpdateDestPath($updateDestPath)
    {
        $this->updateDestPath = $updateDestPath;
    }



}