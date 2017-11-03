<div class="row">
    <div class="col-sm-12">
        <h5> Income statistics for Week :( <?= (new \Cake\I18n\Date())->format('W') ?> ) <span class="pull-right"> Generated On : <?= (new \Cake\I18n\Date())->format('l jS \\of F, Y') ?> </span></h5>
        <?php if ( isset($incomes) ) : ?>

            <?php
            /* formatting the income
            $daysOfTheWeek = [1=>'Monday',2=>'Tuesday',3=>'Wednesday',4=>'Thursday',5=>'Friday',6=>'Saturday',7=>'Sunday'];
            $newValue = $incomes->map(function($row ) {
                $row['day'] = (new \Cake\I18n\Date($row['created']))->dayOfWeek;
                return $row;
            })->sortBy('day', SORT_ASC)->groupBy('day')->toArray();
            debug($newValue);

            $incomeCollections = new \Cake\Collection\Collection($newValue);

            $sum = $incomeCollections->sumOf(function ($item) {
                debug($item);
            });

            */
            ?>
            <table class="table table-responsive ">
                <thead>
                <tr>
                    <th> #</th>
                    <th> Amount</th>
                    <th> Date Recorded</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ( $incomes as $income) : ?>
                    <tr>
                        <td> <?= $income['id'] ?> </td>
                        <td data-amount="<?= $income['amount'] ?>" > <?= $this->Currency->displayCurrency($income['amount']) ?> </td>
                        <td> <?= $income['created'] ?> </td>
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