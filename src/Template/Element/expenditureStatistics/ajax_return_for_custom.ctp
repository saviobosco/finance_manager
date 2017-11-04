<div class="row">
    <div class="col-sm-12">
        <h5> Expenditure statistics Between ( <?= $startDate->format('l jS \\of F, Y') ?> - <?= $endDate->format('l jS \\of F, Y') ?> ) <span class="pull-right">  Generated On : <?= (new \Cake\I18n\Date())->format('l jS \\of F, Y') ?> </span></h5>
        <?php if ( isset($expenditures) ) : ?>
            <table class="table table-responsive ">
                <thead>
                <tr>
                    <th> #</th>
                    <th> Category</th>
                    <th> Purpose</th>
                    <th> Amount</th>
                    <th> Date</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ( $expenditures as $expenditure) : ?>
                    <tr>
                        <td> <?= $expenditure['id'] ?> </td>
                        <td> <?= $expenditure['expenditure_category']['type'] ?></td>
                        <td> <?= $expenditure['purpose'] ?></td>
                        <td data-amount="<?= $expenditure['amount'] ?>" > <?= $this->Currency->displayCurrency($expenditure['amount']) ?> </td>
                        <td> <?= (new \Cake\I18n\Date($expenditure['date']))->format('d-m-Y') ?> </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th> Total</th>
                    <td style="text-align:left" data-total="total" colspan="4">

                    </td>
                </tr>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
<script>
    // calculating all total in the table
    var totalAmount = 0;
    $('td[data-amount]').each(function(){
        totalAmount += Number($(this).attr('data-amount'));
        console.log($(this).text())
    });
    $('td[data-total]').html('&#8358;'+totalAmount)
</script>