<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Session $session
  */
?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel panel-heading">
                <h4 class="panel-title"> <?= __('View Sessions') ?> </h4>
            </div>
            <div class="panel-body">
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th scope="row"><?= __('Session') ?></th>
                        <td><?= h($session->session) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created By') ?></th>
                        <td><?= h($session->created_by_user->first_name.' '.$session->created_by_user->last_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified By') ?></th>
                        <td><?= h($session->modified_by_user->first_name.' '.$session->modified_by_user->last_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($session->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Created') ?></th>
                        <td><?= h($session->created) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Modified') ?></th>
                        <td><?= h($session->modified) ?></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>