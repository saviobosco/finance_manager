<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $expenditureCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $expenditureCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Expenditure Categories'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="expenditureCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($expenditureCategory) ?>
    <fieldset>
        <legend><?= __('Edit Expenditure Category') ?></legend>
        <?php
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
