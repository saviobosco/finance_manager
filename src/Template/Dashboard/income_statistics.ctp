<?= $this->Site->css('bootstrap-daterangepicker/daterangepicker.css', 'plugin', ['block' => 'topCss']) ?>
<?php
$formTemplates = [
    'radioWrapper' => '{{label}}',
];
$this->Form->templates($formTemplates);

?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title"> Income Statistics </h4>
                </div>
                <div class="panel-body">
                    <?= $this->Form->create(null, ['id'=>'get-income-form', 'class' => 'form-horizontal form-bordered m-b-20']) ?>
                    <div class="form-group text-center">
                        <label class="m-r-15" for="query-week">
                            <input name="query" value="week" type="radio"> This Week
                        </label>
                        <label class="m-r-15" for="query-week">
                            <input name="query" value="month" type="radio"> This Month
                        </label>
                        <label class="m-r-15" for="query-week">
                            <input name="query" value="year" type="radio"> This Year
                        </label>
                        <label class="m-r-15" for="query-week">
                            <input name="query" id="custom" value="custom" type="radio"> Custom ( Select Date Range )
                        </label>
                    </div>

                    <div class="row" id="income-date-range">
                        <div class="col-sm-6">
                            <?= $this->Site->datePickerInput('start_date',['disabled'=>true]); ?>

                        </div>
                        <div class="col-sm-6">
                            <?= $this->Site->datePickerInput('end_date',['disabled'=>true]); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <!--<div class="col-md-8">
                            <div class="input-group" id="default-daterange">
                                <input type="text" name="daterange" class="form-control" value=""
                                       placeholder="click to select the date range"/>
								<span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>-->
                    </div>
                    <!--<div class="form-group">
                        <label class="control-label col-md-4">Advance Date Ranges</label>
                        <div class="col-md-8">
                            <div id="advance-daterange" class="btn btn-white btn-block">
                                <span></span>
                                <i class="fa fa-angle-down fa-fw"></i>
                            </div>
                        </div>
                    </div> -->
                    <?= $this->Form->submit(__('Get Income'), ['class' => ' m-t-10 btn btn-primary pull-right']) ?>
                    <?= $this->Form->end() ?>

                    <div id="ajax-response">

                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function(){
        $("input[name=query]:radio").change(function () {
            var radioValue = $(this).val();
            if ( radioValue === 'custom') {
                // get the date-range input
                $('#income-date-range input').each(function(index){
                    // for each of them enable the input
                    $(this).prop('disabled',false);
                })
            } else {
                $('#income-date-range input').each(function(index){
                    // for each of them enable the input
                    $(this).prop('disabled',true);
                })
            }
        })

        $('#get-income-form').submit(function(event){
            event.preventDefault();
            // process an ajax request
            var thisValue = this;
            $.ajax({
                type: "POST",
                url:'<?= $this->Url->build(['action'=>'ajaxGetIncomeStatistics'], true) ?>' ,
                contentType:false,
                cache:false,
                processData:false,
                data: new FormData(thisValue),
                beforeSend:function(){
                    $('#ajax-response').html('<h2 class="text-center text-info"> <i class="fa fa-spinner fa-spin fa-fw"> </i> loading Data... </h2>');
                },
                success: function(data){
                    $('#ajax-response').html(data);
                },
                dataType: 'text'
            });
        });

        // calculating all total in the table
        var totalAmount = 0;
        $('td[data-amount]').each(function(){
            console.log($(this).text())
        })
    });
</script>
<?php /*$this->Site->script('bootstrap-daterangepicker/moment.js', 'plugin', ['block' => 'bottomScripts']) ?>
<?php $this->Site->script('bootstrap-daterangepicker/daterangepicker.js', 'plugin', ['block' => 'bottomScripts']) */?>
<?php
$this->Html->scriptStart(['block' => 'bottomScripts']);
/*
echo <<< END
    var handleDateRangePicker = function() {
        $('#default-daterange').daterangepicker({
                opens: 'right',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                startDate: moment().subtract('days', 29),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2018',
            },
            function (start, end) {
                $('#default-daterange input').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });

        $('#advance-daterange span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#advance-daterange').daterangepicker({
            format: 'MM/DD/YYYY',
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: { days: 60 },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'right',
            drops: 'down',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-primary',
            cancelClass: 'btn-default',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        }, function(start, end, label) {
            $('#advance-daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });
    };
    handleDateRangePicker();
</script>
END;
*/
$this->Html->scriptEnd();
?>