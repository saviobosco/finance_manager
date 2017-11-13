<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Class $class
  */
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel panel-heading">
                <h4 class="panel-title"> <?= h($class->id) ?> </h4>
            </div>
            <div class="panel-body">
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th scope="row"><?= __('Class') ?></th>
                        <td><?= h($class->class) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created By') ?></th>
                        <td><?= h($class->created_by) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified By') ?></th>
                        <td><?= h($class->modified_by) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($class->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($class->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($class->modified) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>