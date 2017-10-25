<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Site helper
 * @property \Cake\View\Helper\HtmlHelper $Html
 * @property \Cake\View\Helper\FormHelper $Form
 */
class SiteHelper extends Helper
{
    var $helpers = ['Url', 'Text','Html','Form'];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public $path = [
        'plugin' => 'assets/plugins/',
        'assets' => 'assets/'
    ];

    /**
     * @param array|string $path
     * @param array|string $folder
     * @param array $options
     * @return null|string
     */
    public function css($path, $folder , array $options = [])
    {
        $options += ['pathPrefix' => $this->path[$folder] ];
        return $this->Html->css($path , $options);
    }

    /**
     * @param array|string $path
     * @param array|string $folder
     * @param array $options
     * @return null|string
     */
    public function script($path ,$folder ,array $options = [])
    {
        $options += ['pathPrefix' => $this->path[$folder] ];
        return $this->Html->script($path , $options);
    }

    /**
     * @param null $photo
     * @param null $photoPath
     * @param array $options
     * @return string
     * This displays the admin photo
     */
    public function displayAdminPhoto($photo = null,$photoPath = null,$options = [] )
    {
        if ( isset($photo)) {
            return $this->Html->image($photoPath.$photo,$options);
        }
        return $this->Html->image('avatar/avatar_placeholder.png',$options);
    }

    public function datePickerInput($name)
    {
        return $this->Form->control($name,[
            'id' => 'datepicker-autoClose',
            'type' => 'text',
            'templates'=>[
                'inputContainer' => '<div class="form-group">{{content}}</div>'
                ,'input' => '<input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>'
            ]
        ]);
    }

}
