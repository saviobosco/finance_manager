<?php
/**
 * Created by PhpStorm.
 * User: saviobosco
 * Date: 10/21/17
 * Time: 1:18 PM
 */

namespace App\View\Cell;


use Cake\View\Cell;

/**
 * Class DashboardCell
 * @package App\View\Cell
 *
 *
 * @property \App\Model\Table\FeeCategoriesTable $FeeCategories
 * @property \App\Model\Table\IncomesTable $Incomes
 * @property \App\Model\Table\ExpendituresTable $Expenditures
 */
class DashboardCell extends Cell
{
    public function getNumberOfStudents()
    {
        $this->loadModel('Students');
        $students = $this->Students->find('all');
        $this->set('students', $students->count());
    }

    public function getNumberOfSessions()
    {
        $this->loadModel('Sessions');
        $sessions = $this->Sessions->find();
        $this->set('sessions', $sessions->count());
    }

    public function getIncomeSources()
    {
        // get fee income ordered by fee category
        $this->loadModel('FeeCategories');
        $incomeSources = $this->FeeCategories->find('IncomeByFeeCategories');

        $this->set(compact('incomeSources'));
    }

    public function getTotalIncome()
    {
        // load the income Table
        $this->loadModel('Incomes');
        $incomes = $this->Incomes->find();
        $totalIncome = 0;
        foreach ( $incomes as $income ) {
            $totalIncome += $income->amount;
        }
        $this->set(compact('totalIncome'));
    }

    public function getTotalExpenditure()
    {
        // load the income Table
        $this->loadModel('Expenditures');
        $Expenses = $this->Expenditures->find();
        $totalExpenses = 0;
        foreach ( $Expenses as $expense ) {
            $totalExpenses += $expense->amount;
        }
        $this->set(compact('totalExpenses'));
    }

}