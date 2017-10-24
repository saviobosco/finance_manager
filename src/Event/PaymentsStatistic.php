<?php
/**
 * Created by PhpStorm.
 * User: saviobosco
 * Date: 10/20/17
 * Time: 5:29 AM
 */

namespace App\Event;



use Cake\Event\EventListenerInterface;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

class PaymentsStatistic implements EventListenerInterface
{

    /**
     * Returns a list of events this object is implementing. When the class is registered
     * in an event manager, each individual method will be associated with the respective event.
     *
     * ### Example:
     *
     * ```
     *  public function implementedEvents()
     *  {
     *      return [
     *          'Order.complete' => 'sendEmail',
     *          'Article.afterBuy' => 'decrementInventory',
     *          'User.onRegister' => ['callable' => 'logRegistration', 'priority' => 20, 'passParams' => true]
     *      ];
     *  }
     * ```
     *
     * @return array associative array or event key names pointing to the function
     * that should be called in the object when the respective event is fired
     */
    public function implementedEvents()
    {
    // TODO: Implement implementedEvents() method.
        return [
            'Model.StudentFeePayments.afterPayment' => 'recordIncome',
            'Model.StudentFeePayments.afterEachPaymentSaved' => 'recordIncomeByFeeAndFeeCategories'
        ];

    }

    // record Income
    public function recordIncome($event,$receipt)
    {
        if ($event->isStopped()) {
            return false;
        }
        $incomeTable = TableRegistry::get('Incomes');
        $dateCreated = new Time($receipt->created);
        $income = $incomeTable->newEntity([
            'amount' => $receipt->total_amount_paid,
            'week' => $dateCreated->toWeek(),
            'month' => $dateCreated->month,
            'year' => $dateCreated->year
        ]);

        // Record it to database
        $incomeTable->save($income);
    }

    public function recordIncomeByFeeAndFeeCategories($event,$paymentDetail)
    {
        if ($event->isStopped()) {
            return false;
        }
        // Recording fee
        $feesTable = TableRegistry::get('Fees');
        $fee = $feesTable->find()->where(['id'=>$paymentDetail->fee_id])->first();
        $fee->amount_earned += $paymentDetail->amount_paid;
        $feesTable->save($fee);

        // Recording Income to Fee Category
        $feeCategoriesTable = TableRegistry::get('FeeCategories');
        $feeCategory = $feeCategoriesTable->find()->where(['id'=>$paymentDetail->fee_category_id])->first();
        $feeCategory->income_amount += $paymentDetail->amount_paid;
        $feeCategoriesTable->save($feeCategory);
    }
}