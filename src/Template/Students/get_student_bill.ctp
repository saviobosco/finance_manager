<?php

$formTemplates = [
    'submitContainer' => '{{content}}'
];
$this->Form->templates($formTemplates);
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title"> Student Bill  </h4>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-12">
                        <?= $this->Form->create('',['class'=>'form-inline','type'=>'GET']) ?>
                        <div class="form-group">
                            <?= $this->Form->hidden('student_id',['value'=>$student->id]) ?>
                            <?= $this->Form->input('session_id',['options' => $sessions,'class'=>'form-control','data-select-id'=>'school','label'=>['text'=>' Change Session '],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['session_id'])]); ?>
                            <?= $this->Form->input('class_id',['options' => $classes,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Change Class'],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['class_id'])]); ?>
                            <?= $this->Form->input('term_id',['empty' => 'All','options' => $terms,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Change Term'],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['term_id'])]); ?>
                            <?= $this->Form->submit(__('change'),[
                                'templates' => [
                                    'submitContainer' => '{{content}}'
                                ],
                                'class'=>'btn btn-primary']) ?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>

                <?php

                // For hiding the input labels
                $formTemplates = [
                    'label' => '',
                    'submitContainer' => '{{content}}'
                ];
                $this->Form->templates($formTemplates);
                ?>

                <div class="profile-container">
                    <!-- begin profile-section -->
                    <div class="profile-section">
                        <!-- begin profile-left -->
                        <h2 class=""> Student Information </h2>
                        <div class="profile-left">
                            <!-- begin profile-image -->
                            <div class="profile-image">
                                <?= $this->Html->image('student-pictures/students/photo/'.$student->photo_dir.'/'.$student->photo,[
                                    'alt' => $student->full_name
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
                                <div class="table-responsive table-bordered">
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
                                            <th><?= __('Gender') ?></th>
                                            <td><?= h($student->gender) ?></td>
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

                <h2 class=""> Student Fees </h2>
                <?php if ( $studentFees ) : ?>
                    <table class="table table-responsive table-bordered" >
                        <tr>
                            <th scope="col"><?= __('Fees') ?></th>
                            <th scope="col"><?= __('Amount') ?></th>
                            <th scope="col"><?= __('Class') ?></th>
                            <th scope="col"><?= __('Session') ?></th>
                            <th scope="col"> <?= __('Term') ?> </th>
                        </tr>

                        <?= $this->Form->hidden('student_id',['value' => $student->id]) ?>
                        <?php $count = count($studentFees); ?>
                        <?php for ($num = 0; $num < $count; $num++ ): ?>
                            <tr>
                                <td><?= h($studentFees[$num]->fee->fee_category->type) ?></td>
                                <td><?= $this->Currency->displayCurrency(($studentFees[$num]->amount_remaining)? $studentFees[$num]->amount_remaining : $studentFees[$num]->fee->amount)  ?></td>
                                <td><?= h($classes[$studentFees[$num]->fee->class_id]) ?></td>
                                <td><?= h($sessions[$studentFees[$num]->fee->session_id] ) ?></td>
                                <td> <?= ' - ('. ( $studentFees[$num]->fee->term_id ) ? $terms[$studentFees[$num]->fee->term_id] : 'All Terms' .')' ?> </td>

                            </tr>
                        <?php endfor; ?>
                    </table>
                <?php else : ?>
                    <div class="alert alert-danger">
                        No Fees available for this student
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

