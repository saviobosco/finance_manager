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
                <h4 class="panel-title"> Fee Statistic </h4>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($fee->id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Fee Category') ?></th>
                        <td><?= $fee->fee_category->type ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Term') ?></th>
                        <td><?= $fee->term->term ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Class') ?></th>
                        <td><?= $fee->class->class ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Session') ?></th>
                        <td><?= $fee->session->session ?></td>
                    </tr>

                    <tr>
                        <th scope="row"><?= __('Amount') ?></th>
                        <td><?= $this->Currency->displayCurrency($fee->amount) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Amount Expected') ?></th>
                        <td><?= $this->Currency->displayCurrency($fee->income_amount_expected) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Amount Earned') ?></th>
                        <td><?= $this->Currency->displayCurrency($fee->amount_earned) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>