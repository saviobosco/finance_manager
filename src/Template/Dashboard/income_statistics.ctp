<?= $this->Site->css('bootstrap-daterangepicker/daterangepicker.css','plugin',['block'=>'topCss']) ?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title"> Income Statistics </h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="control-label col-md-4">Default Date Ranges</label>
                        <div class="col-md-8">
                            <div class="input-group" id="default-daterange">
                                <input type="text" name="default-daterange" class="form-control" value="" placeholder="click to select the date range" />
										    <span class="input-group-btn">
												<button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Advance Date Ranges</label>
                        <div class="col-md-8">
                            <div id="advance-daterange" class="btn btn-white btn-block">
                                <span></span>
                                <i class="fa fa-angle-down fa-fw"></i>
                            </div>
                        </div>
                    </div>
                </form>

                <table>
                    <thead>
                       <tr>
                           <th> Amount </th>
                           <td> week </td>
                           <th> Year </th>
                       </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->Site->script('bootstrap-daterangepicker/moment.js','plugin',['block'=>'bottomScripts']) ?>
<?= $this->Site->script('bootstrap-daterangepicker/daterangepicker.js','plugin',['block'=>'bottomScripts']) ?>

<?php
$this->Html->scriptStart(['block' =>'bottomScripts']);
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
</script>
END;
$this->Html->scriptEnd();
?>