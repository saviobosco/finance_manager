<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Students'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Student Fees'), ['controller' => 'StudentFees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Fee'), ['controller' => 'StudentFees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="students form large-9 medium-8 columns content">
    <?= $this->Form->create($student) ?>
    <fieldset>
        <legend><?= __('Add Student') ?></legend>
        <?php
            echo $this->Form->control('id',['label' => 'Admission Number','type'=>'text']);
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('date_of_birth');
        echo $this->Form->label('Gender');
        echo $this->Form->radio('gender',[
            ['value' => 'male', 'text' => 'Male',],
            ['value' => 'female', 'text' => 'Female',]
        ],['hiddenField'=>false,'label'=>true,'templates'=>['input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',]]);
            //echo $this->Form->control('state_id');
            echo $this->Form->control('religion');
            echo $this->Form->control('home_residence');
            echo $this->Form->control('guardian');
            echo $this->Form->control('relationship_to_guardian');
            echo $this->Form->control('occupation_of_guardian');
            echo $this->Form->control('guardian_phone_number');
            echo $this->Form->control('session_id');
            echo $this->Form->control('class_id');
            echo $this->Form->control('photo');
            echo $this->Form->control('photo_dir');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
