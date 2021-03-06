<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Student $student
 */
use Cake\I18n\Time;

?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title"> Student Payment Records </h4>
            </div>
            <div class="panel-body">

                <div>
                    <?= $this->Html->link('Pay Student Fees <i class="fa fa-money"></i>',[
                        'controller'=>'Students',
                        'action'=>'getStudentFees',
                        '?'=>[
                            'student_id'=>$student->id
                        ]
                    ], [
                            'escape' => false,
                            'class'=>'btn btn-sm btn-primary m-r-5'
                        ]
                    ) ?>

                    <?= $this->Html->link('Get Student Bill <i class="fa fa-bars"></i>',[
                        'controller'=>'Students',
                        'action'=>'getStudentBill',
                        '?'=>[
                            'student_id'=>$student->id
                        ]
                    ], [
                            'escape' => false,
                            'class'=>'btn btn-sm btn-primary m-r-5'
                        ]
                    ) ?>

                    <?= $this->Html->link('View Student Payment Record <i class="fa fa-database"></i>',[
                        'controller'=>'Students',
                        'action'=>'studentPaymentRecord',
                        '?'=>[
                            'student_id'=>$student->id
                        ]
                    ], [
                            'escape' => false,
                            'class'=>'btn btn-sm btn-success m-r-5'
                        ]
                    ) ?>
                </div>
                <div class="profile-container">

                    <!-- begin profile-section -->
                    <div class="profile-section">
                        <!-- begin profile-left -->
                        <div class="profile-left">
                            <!-- begin profile-image -->
                            <div class="profile-image">
                                <?= $this->Html->image('student-pictures/students/photo/'.$student->photo_dir.'/'.$student->photo,[
                                    'alt' => $student->first_name
                                ]) ?>
                                <i class="fa fa-user hide"></i>
                            </div>
                        </div>
                        <!-- end profile-left -->
                        <!-- begin profile-right -->
                        <div class="profile-right">
                            <!-- begin profile-info -->
                            <div class="profile-info">
                                <!-- begin table -->
                                <div class="table-responsive">
                                    <table class="table table-user-information">
                                        <tr>
                                            <th><?= __('Admission No.') ?></th>
                                            <td><?= h($student->id) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('First Name') ?></th>
                                            <td><?= h($student->first_name) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Last Name') ?></th>
                                            <td><?= h($student->last_name) ?></td>
                                        </tr>
                                        <tr>
                                            <th><?= __('Class') ?></th>
                                            <td><?= $student->class->class ?></td>
                                        </tr>
                                    </table>

                                </div>
                                <!-- end table -->
                            </div>
                            <!-- end profile-info -->
                        </div>
                        <!-- end profile-right -->
                    </div>
                </div>

                <div class="related">
                    <h4><?= __(' Payment Details ') ?></h4>
                    <?php if (!empty($student->student_fees)): ?>
                        <table class="table table-bordered table-responsive " >
                            <tr>
                                <th scope="col"><?= __('Fees') ?></th>
                                <th scope="col"><?= __('Amount') ?></th>
                                <th scope="col"><?= __('Paid') ?></th>
                                <th scope="col"><?= __('Class') ?></th>
                                <th scope="col"><?= __('Session') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($student->student_fees as $studentFees): ?>
                                <tr>
                                    <td><?= h($studentFees->fee->fee_category->type) ?></td>
                                    <td><?= ($studentFees->amount_remaining) ? $this->Currency->displayCurrency($studentFees->amount_remaining)  : $this->Currency->displayCurrency($studentFees->fee->amount) ?></td>
                                    <td><?= $this->Payment->displayPaidStatus($studentFees->paid) ?></td>
                                    <td><?= h($classes[$studentFees->fee->class_id]) ?></td>
                                    <td><?= h($sessions[$studentFees->fee->session_id] ).'--'.h('('.($studentFees->fee->term_id)? $terms[$studentFees->fee->term_id] : '' .')' ) ?></td>
                                    <td class="actions">
                                        <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['controller' => 'StudentFees', 'action' => 'delete', $studentFees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentFees->id),'escape'=>false,'class'=>'btn btn-danger btn-sm']) ?>

                                        <?php if ( $studentFees->student_fee_payments ) : ?>
                                            <!--<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#paymentDetailModal" data-payment-id="<?= $studentFees->id ?>">
                                            see payment details
                                        </button> -->
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>

                <div>
                    <?= $this->Html->link('Pay Student Fees <i class="fa fa-money"></i>',[
                        'controller'=>'Students',
                        'action'=>'getStudentFees',
                        '?'=>[
                            'student_id'=>$student->id
                        ]
                    ], [
                            'escape' => false,
                            'class'=>'btn btn-sm btn-primary m-r-5'
                        ]
                    ) ?>

                    <?= $this->Html->link('Get Student Bill <i class="fa fa-bars"></i>',[
                        'controller'=>'Students',
                        'action'=>'getStudentBill',
                        '?'=>[
                            'student_id'=>$student->id
                        ]
                    ], [
                            'escape' => false,
                            'class'=>'btn btn-sm btn-primary m-r-5'
                        ]
                    ) ?>

                    <?= $this->Html->link('View Student Payment Record <i class="fa fa-database"></i>',[
                        'controller'=>'Students',
                        'action'=>'studentPaymentRecord',
                        '?'=>[
                            'student_id'=>$student->id
                        ]
                    ], [
                            'escape' => false,
                            'class'=>'btn btn-sm btn-success m-r-5'
                        ]
                    ) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="paymentDetailModal" tabindex="-1" role="dialog" aria-labelledby="paymentDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    // using the modal to load the payment details
    $("#paymentDetailModal").on('shown.bs.modal', function () { // before the modal is fully loaded
        // get the payment id
        console.log(event);
    });

</script>