<!-- begin row -->
<div class="row">
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
                <h4>Students </h4>
                <p>
                    <?= $this->cell('Dashboard::getNumberOfStudents') ?>
                </p>
            </div>
            <div class="stats-link">
                <?= $this->Html->link('View Detail <i class="fa fa-arrow-circle-o-right"></i>',['controller'=>'Students','action'=>'index'],['escape'=>false]) ?>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon"><i class="fa fa-money"></i></div>
            <div class="stats-info">
                <h4>
                    INCOME GENERATED
                </h4>
                <p>
                    <?= $this->cell('Dashboard::getTotalIncome') ?>
                </p>
            </div>
            <div class="stats-link">
                <?= $this->Html->link('View Detail <i class="fa fa-arrow-circle-o-right"></i>',['controller'=>'Dashboard','action'=>'incomeStatistics'],['escape'=>false]) ?>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-red">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
                <h4>
                    EXPENDITURES
                </h4>
                <p>
                    <?= $this->cell('Dashboard::getTotalExpenditure') ?>
                </p>
            </div>
            <div class="stats-link">
                <?= $this->Html->link('View Detail <i class="fa fa-arrow-circle-o-right"></i>',['controller'=>'Dashboard','action'=>'expenditureStatistics'],['escape'=>false]) ?>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-purple">
            <div class="stats-icon"><i class="fa fa-calendar"></i></div>
            <div class="stats-info">
                <h4>SESSIONS</h4>
                <p>
                    <?= $this->cell('Dashboard::getNumberOfSessions') ?>
                </p>
            </div>
            <div class="stats-link">
                <?= $this->Html->link('View Detail <i class="fa fa-arrow-circle-o-right"></i>',['controller'=>'Sessions','action'=>'index'],['escape'=>false]) ?>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
</div>
<!-- end row -->
<!-- begin row -->
<div class="row">
    <!-- begin col-8 -->
    <div class="col-md-8">
        <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title"> Statistics ( Current year ) </h4>
            </div>
            <div class="panel-body">
                <div id="interactive-chart" class="height-sm"></div>
            </div>
        </div>




    </div>
    <!-- end col-8 -->
    <!-- begin col-4 -->
    <div class="col-md-4">
        <div class="panel panel-inverse" data-sortable-id="index-6">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Income Details</h4>
            </div>
            <div class="panel-body p-t-0">

                <?= $this->cell('Dashboard::getIncomeSources') ?>

            </div>
        </div>

        <div class="panel panel-inverse" data-sortable-id="index-10">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Calendar</h4>
            </div>
            <div class="panel-body">
                <div id="datepicker-inline" class="datepicker-full-width"><div></div></div>
            </div>
        </div>
    </div>
    <!-- end col-4 -->
</div>
<!-- end row -->
<?= $this->Site->script('flot/jquery.flot.min.js','plugin',['block'=>'bottomScripts']) ?>
<?= $this->Site->script('flot/jquery.flot.time.min.js','plugin',['block'=>'bottomScripts']) ?>
<?= $this->Site->script('flot/jquery.flot.resize.min.js','plugin',['block'=>'bottomScripts']) ?>
<?= $this->Site->script('flot/jquery.flot.pie.min.js','plugin',['block'=>'bottomScripts']) ?>

<?php
$this->Html->scriptStart(['block' =>'bottomScripts']);

echo <<< END
var blue		= '#348fe2',
    blueLight	= '#5da5e8',
    blueDark	= '#1993E4',
    aqua		= '#49b6d6',
    aquaLight	= '#6dc5de',
    aquaDark	= '#3a92ab',
    green		= '#00acac',
    greenLight	= '#33bdbd',
    greenDark	= '#008a8a',
    orange		= '#f59c1a',
    orangeLight	= '#f7b048',
    orangeDark	= '#c47d15',
    dark		= '#2d353c',
    grey		= '#b6c2c9',
    purple		= '#727cb6',
    purpleLight	= '#8e96c5',
    purpleDark	= '#5b6392',
    red         = '#ff5b57';

var handleInteractiveChart = function () {
	"use strict";
    function showTooltip(x, y, contents) {
        $('<div id="tooltip" class="flot-tooltip">' + contents + '</div>').css( {
            top: y - 45,
            left: x - 55
        }).appendTo("body").fadeIn(200);
    }
	if ($('#interactive-chart').length !== 0) {

        var data1 = [
            [1, 40], [2, 50], [3, 60], [4, 60], [5, 60], [6, 65], [7, 75], [8, 90], [9, 100], [10, 105],
            [11, 110], [12, 110], [13, 120], [14, 130], [15, 135],[16, 145], [17, 132], [18, 123], [19, 135], [20, 150]
        ];
        var data2 = [
            [1, 10],  [2, 6], [3, 10], [4, 12], [5, 18], [6, 20], [7, 25], [8, 23], [9, 24], [10, 25],
            [11, 18], [12, 30], [13, 25], [14, 25], [15, 30], [16, 27], [17, 20], [18, 18], [19, 31], [20, 23]
        ];
        var xLabel = [
            [1,'January'],[2,'February'],[3,'March'],[4,'April'],[5,'May'],[6,'June'],[7,'July'],[8,'August'],[9,'September'],
            [10,'October'],[11,'November'],[12,'December']
        ];
        $.plot($("#interactive-chart"), [
                {
                    data: data1,
                    label: "Income",
                    color: blue,
                    lines: { show: true, fill:false, lineWidth: 2 },
                    points: { show: true, radius: 3, fillColor: '#fff' },
                    shadowSize: 0
                }, {
                    data: data2,
                    label: 'Expenses',
                    color: red,
                    lines: { show: true, fill:false, lineWidth: 2 },
                    points: { show: true, radius: 3, fillColor: '#fff' },
                    shadowSize: 0
                }
            ],
            {
                xaxis: {  ticks:xLabel, tickDecimals: 4, tickColor: '#ddd'},
                yaxis: {  ticks: 10, tickColor: '#ddd', min: 0, max: 200 },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#ddd",
                    borderWidth: 1,
                    backgroundColor: '#fff',
                    borderColor: '#ddd'
                },
                legend: {
                    labelBoxBorderColor: '#ddd',
                    margin: 10,
                    noColumns: 1,
                    show: true
                }
            }
        );
        var previousPoint = null;
        $("#interactive-chart").bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));
            if (item) {
                if (previousPoint !== item.dataIndex) {
                    previousPoint = item.dataIndex;
                    $("#tooltip").remove();
                    var y = item.datapoint[1].toFixed(2);

                    var content = item.series.label + " " + y;
                    showTooltip(item.pageX, item.pageY, content);
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
            event.preventDefault();
        });
    }
};
handleInteractiveChart();
END;
$this->Html->scriptEnd();
?>
