<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title"> Quick Links </h4>
            </div>
            <div class="panel-body">
                <div class="m-b-15">

                    <?= $this->Html->link('<i class="fa fa-dashboard"> </i> Dashboard',[
                        'controller' => 'Dashboard',
                        'action' => 'index'
                    ],[
                        'escape' => false,
                        'class' => 'btn btn-success btn-sm m-r-5 m-b-5'
                    ]) ?>

                    <?= $this->Html->link('<i class="fa fa-users"> </i> Students',[
                        'controller' => 'Students',
                        'action' => 'index'
                    ],[
                        'escape' => false,
                        'class' => 'btn btn-primary btn-sm m-r-5 m-b-5'
                    ]) ?>

                    <div class="btn-group m-r-5 m-b-5">
                        <a href="javascript:;" class="btn btn-success btn-sm "><i class="fa fa-bars"></i> Fee Categories </a>
                        <a href="javascript:;" data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle">
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <?= $this->Html->link('All',['controller'=>'FeeCategories','action'=>'index']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link('Add New Category',['controller'=>'FeeCategories','action'=>'add']) ?>
                            </li>
                        </ul>
                    </div>

                    <div class="btn-group m-r-5 m-b-5">
                        <a href="javascript:;" class="btn btn-danger btn-sm "><i class="fa fa-bars"></i> Expenditure Categories </a>
                        <a href="javascript:;" data-toggle="dropdown" class="btn btn-danger btn-sm dropdown-toggle">
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <?= $this->Html->link('All',['controller'=>'ExpenditureCategories','action'=>'index']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link('Add New Category',['controller'=>'ExpenditureCategories','action'=>'add']) ?>
                            </li>
                        </ul>
                    </div>

                    <div class="btn-group m-r-5 m-b-5">
                        <a href="javascript:;" class="btn btn-inverse btn-sm "><i class="fa fa-money "></i> Fees </a>
                        <a href="javascript:;" data-toggle="dropdown" class="btn btn-inverse btn-sm dropdown-toggle">
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <?= $this->Html->link('All',[
                                    'plugin'=>null,
                                    'controller'=>'Fees',
                                    'action'=>'index'
                                ],
                                    [
                                        'escape' => false
                                    ])  ?>
                            </li>
                            <li>
                                <?= $this->Html->link('New',[
                                    'plugin'=>null,
                                    'controller'=>'Fees',
                                    'action'=>'add'
                                ],
                                    [
                                        'escape' => false
                                    ]
                                )  ?>
                            </li>
                            <li>
                                <?= $this->Html->link('Fee Statistics',[
                                    'plugin'=>null,
                                    'controller'=>'Fees',
                                    'action'=>'feeStatistics'
                                ],
                                    [
                                        'escape' => false
                                    ]
                                )  ?>
                            </li>
                            <li>
                                <?= $this->Html->link('Fee Query',[
                                    'plugin'=>null,
                                    'controller'=>'Fees',
                                    'action'=>'feesQuery'
                                ],
                                    [
                                        'escape' => false
                                    ]
                                )  ?>
                            </li>
                            <li>
                                <?= $this->Html->link('Fee Defaulters',[
                                    'plugin'=>null,
                                    'controller'=>'Fees',
                                    'action'=>'feeDefaulters'
                                ],
                                    [
                                        'escape' => false
                                    ]
                                )  ?>
                            </li>
                            <li>
                                <?= $this->Html->link('Fee Complete Students',[
                                    'plugin'=>null,
                                    'controller'=>'Fees',
                                    'action'=>'getStudentsWithCompleteFees'
                                ],
                                    [
                                        'escape' => false
                                    ]
                                )  ?>
                            </li>
                            <li>
                                <?= $this->Html->link('Add Fees to Students',[
                                    'plugin'=>null,
                                    'controller'=>'Fees',
                                    'action'=>'addFeesToStudents'
                                ],
                                    [
                                        'escape' => false
                                    ]
                                )  ?>
                            </li>
                        </ul>
                    </div>

                    <?= $this->Html->link('<i class="fa fa-gears"> </i>Settings ',[
                        'controller' => 'Dashboard',
                        'action' => 'settings'
                    ],[
                        'escape' => false,
                        'class' => 'btn btn-primary btn-sm m-r-5 m-b-5'
                    ]) ?>

                    <?= $this->Html->link('<i class="fa fa-money"> </i> New Expenditure ',[
                        'controller' => 'Expenditures',
                        'action' => 'add'
                    ],[
                        'escape' => false,
                        'class' => 'btn btn-danger btn-sm m-r-5 m-b-5'
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>