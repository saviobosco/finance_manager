<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Fee $fee
  */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title"> <?= h($fee->id) ?> </h4>
            </div>
            <div class="panel-body">
                <div class="m-b-15">
                    <?= $this->Html->link('Get Fees Defaulters',['controller'=>'Fees','action'=>'getFeeDefaulters',$fee->id],['class'=>'btn btn-danger m-r-15']) ?>
                    <?= $this->Html->link('Get Fees Complete Students',['controller'=>'Fees','action'=>'getFeeCompleteStudents',$fee->id],['class'=>'btn btn-success m-r-15']) ?>
                </div>
                <table class="table table-responsive">
                    <tr>
                        <th scope="row"><?= __('Fee Category') ?></th>
                        <td><?= $fee->has('fee_category') ? $this->Html->link($fee->fee_category->type, ['controller' => 'FeeCategories', 'action' => 'view', $fee->fee_category->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Term') ?></th>
                        <td><?= $fee->has('term') ? $this->Html->link($fee->term->term, ['controller' => 'Terms', 'action' => 'view', $fee->term->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Class') ?></th>
                        <td><?= $fee->has('class') ? $this->Html->link($fee->class->class, ['controller' => 'Classes', 'action' => 'view', $fee->class->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Session') ?></th>
                        <td><?= $fee->has('session') ? $this->Html->link($fee->session->session, ['controller' => 'Sessions', 'action' => 'view', $fee->session->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created By') ?></th>
                        <td><?= h($fee->created_by_user->first_name.' '.$fee->created_by_user->last_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified By') ?></th>
                        <td><?= h($fee->modified_by_user->first_name.' '.$fee->modified_by_user->last_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= __($fee->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Amount') ?></th>
                        <td><?= $this->Currency->displayCurrency($fee->amount) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($fee->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($fee->modified) ?></td>
                    </tr>
                </table>
                <div class="related">
                    <h4><?= __(' Student Fees') ?></h4>
                    <?php if (!empty($fee->student_fees)): ?>
                        <table id="data-table" class="table table-responsive table-bordered" >
                            <thead>
                            <tr>
                                <th scope="col"><?= __('Admission Number') ?></th>
                                <th scope="col"><?= __('Paid') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($fee->student_fees as $studentFees): ?>
                                <tr>
                                    <td><?= h($studentFees->student_id) ?></td>
                                    <td><?= ($studentFees->paid) ? '<span class="label label-success">Yes  </span>' : '<span class="label label-danger"> No </span>' ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
