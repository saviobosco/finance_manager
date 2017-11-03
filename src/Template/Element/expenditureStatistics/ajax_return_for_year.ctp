<div class="row">
    <div class="col-sm-12">
        <h5> Expenditure statistics for Year ( <?= (new \Cake\I18n\Date())->format('Y') ?> ) <span class="pull-right">  Generated On : <?= (new \Cake\I18n\Date())->format('l jS \\of F, Y') ?> </span></h5>
        <?php if ( isset($expenditures) ) : ?>
            <table class="table table-responsive ">
                <thead>
                <tr>
                    <th> #</th>
                    <th> Amount</th>
                    <th> Date Recorded</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ( $expenditures as $expenditure) : ?>
                    <tr>
                        <td> <?= $expenditure['id'] ?> </td>
                        <td data-amount="<?= $expenditure['amount'] ?>" > <?= $this->Currency->displayCurrency($expenditure['amount']) ?> </td>
                        <td> <?= $expenditure['created'] ?> </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th> Total</th>
                    <td data-total="total" colspan="2">

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