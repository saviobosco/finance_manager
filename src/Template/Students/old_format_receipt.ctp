<div class="invoice">
    <div class="invoice-company">
                    <span class="pull-right hidden-print">
                    <a href="javascript:;" class="btn btn-sm btn-success m-b-10"><i class="fa fa-download m-r-5"></i> Export as PDF</a>
                    <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-success m-b-10"><i class="fa fa-print m-r-5"></i> Print</a>
                    </span>
        Company Name, Inc
    </div>
    <div class="invoice-header">
        <div class="invoice-from">
            <small> Payment Details </small>
            <table class="table table-user-information table-bordered">
                <tr>
                    <th><?= __('Admission No.') ?></th>
                    <td><?= h($student->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($student->first_name.' '.$student->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Class') ?></th>
                    <td><?= h($student->class->class) ?></td>
                </tr>
                <tr>
                    <th><?= __('Session') ?></th>
                    <td><?= h($student->session->session) ?></td>
                </tr>
            </table>
        </div>
        <div class="invoice-to">
            <small> Student Details</small>
            <table class="table table-user-information table-bordered">
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($student->first_name.' '.$student->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Admission No.') ?></th>
                    <td><?= h($student->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Class') ?></th>
                    <td><?= h($student->class->class) ?></td>
                </tr>
            </table>
        </div>
        <div class="invoice-date">
            <small> Payment / Receipt</small>
            <div class="date m-t-5"><?=  (new \Cake\I18n\Time($receiptDetails->created))->format('l jS \\of F, Y \\a\\t h:i:s A') ?> </div>
            <div class="invoice-detail">
                #<?= h($receiptDetails->ref_number) ?><br />
                Services Product
            </div>
        </div>
    </div>
    <div class="invoice-content">
        <div class="table-responsive">
            <table class="table table-invoice">
                <thead>
                <tr>
                    <th> ITEMS </th>
                    <th> AMOUNT </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($receiptDetails->student_fee_payments as $studentFeePayment): ?>
                    <tr>
                        <td><?= h($studentFeePayment->student_fee->fee->fee_category->type) ?> <br/>
                            <small>
                                <?= $classes[$studentFeePayment->student_fee->fee->class_id].'/'.$sessions[$studentFeePayment->student_fee->fee->session_id].'/'.$terms[$studentFeePayment->student_fee->fee->term_id] ?>
                            </small>
                        </td>
                        <td><?= $this->Currency->displayCurrency($studentFeePayment->amount_paid) ?></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="invoice-price">
            <div class="invoice-price-left">
                <div class="invoice-price-row">
                    <!--<div class="sub-price">
                        <small>SUBTOTAL</small>
                        $4,500.00
                    </div>
                    <div class="sub-price">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="sub-price">
                        <small>PAYPAL FEE (5.4%)</small>
                        $108.00
                    </div> -->
                </div>
            </div>
            <div class="invoice-price-right">
                <small>TOTAL</small> <?= $this->Currency->displayCurrency($this->Payment->calculateTotal($receiptDetails->student_fee_payments,'amount_paid')) ?>
            </div>
        </div>
    </div>

    <h5> Arrears </h5>
    <table class=" m-t-15 table table-responsive table-bordered">
        <tr>
            <th scope="col"><?= __('Fees') ?></th>
            <th scope="col"><?= __('Amount') ?></th>
        </tr>
        <?php foreach ($arrears as $studentArrears): ?>
            <tr>
                <td><?= h($studentArrears->fee->fee_category->type.' ('.$classes[$studentArrears->fee->class_id].'/'.$sessions[$studentArrears->fee->session_id].'/'.$terms[$studentArrears->fee->term_id].')' ) ?></td>
                <td><?= $this->Currency->displayCurrency( ($studentArrears->amount_remaining) ? $studentArrears->amount_remaining : $studentArrears->fee->amount  ) ?></td>

            </tr>
        <?php endforeach; ?>
        <tr>
            <td> <b>Total </b> </td>
            <td> <?= $this->Currency->displayCurrency($this->Payment->calculateArrearsTotal($arrears)) ?></td>
        </tr>
    </table>


    <div class="invoice-note">
        * Make all cheques payable to [Your Company Name]<br />
        * Payment is due within 30 days<br />
        * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
    </div>
    <div class="invoice-footer text-muted">
        <p class="text-center m-b-5">
            POWERED BY UPSILION TECHNOLOGIES
        </p>
        <p class="text-center">
            <span class="m-r-10"><i class="fa fa-globe"></i> upsitech.com</span>
            <span class="m-r-10"><i class="fa fa-phone"></i> T:016-18192302</span>
            <span class="m-r-10"><i class="fa fa-envelope"></i> support@upsitech.com</span>
        </p>
    </div>
</div>