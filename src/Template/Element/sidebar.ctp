<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;">
                        <?= $this->Site->displayAdminPhoto($this->request->session()->read('Auth.User.photo')) ?>
                    </a>
                </div>
                <div class="info">
                    <?= ucfirst($this->request->session()->read('Auth.User.username')) ?>
                    <small>
                        <?= ($this->request->session()->read('Auth.User.is_superuser')) ? 'Superuser'  : ucfirst($this->request->session()->read('Auth.User.role')) ?>
                    </small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Navigation</li>

            <li class="has-sub">
                <?= $this->html->link('<i class="fa fa-dashboard"></i> Dashboard',[
                    'plugin'=>null,
                    'controller'=>'Dashboard',
                    'action' => 'index'
                ],[
                    'escape' => false
                ]) ?>
            </li>
            <li class="has-sub">
                <?= $this->html->link('<i class="fa fa-home"></i> Home',[
                    'plugin'=>null,
                    'controller'=>'Accounts',
                    'action' => 'home'
                ],[
                    'escape' => false
                ]) ?>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-calendar"></i><span> Sessions </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <?= $this->Html->link('All',[
                            'plugin'=>null,
                            'controller'=>'Sessions',
                            'action'=>'index'
                        ],
                            [
                                'escape' => false
                            ])  ?>
                    </li>
                    <li>
                        <?= $this->Html->link('New',[
                            'plugin'=>null,
                            'controller'=>'Sessions',
                            'action'=>'add'
                        ],
                            [
                                'escape' => false
                            ]
                        )  ?>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-bars"></i><span>Fees Categories </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <?= $this->Html->link('List',[
                            'plugin'=>null,
                            'controller'=>'FeeCategories',
                            'action'=>'index'
                        ],
                        [
                            'escape' => false
                        ])  ?>
                    </li>
                    <li>
                        <?= $this->Html->link('New',[
                            'plugin'=>null,
                            'controller'=>'FeeCategories',
                            'action'=>'add'
                        ],
                            [
                                'escape' => false
                            ]
                        )  ?>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-bars"></i><span>Expenditure Categories </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <?= $this->Html->link('List',[
                            'plugin'=>null,
                            'controller'=>'ExpenditureCategories',
                            'action'=>'index'
                        ],
                            [
                                'escape' => false
                            ])  ?>
                    </li>
                    <li>
                        <?= $this->Html->link('New',[
                            'plugin'=>null,
                            'controller'=>'ExpenditureCategories',
                            'action'=>'add'
                        ],
                            [
                                'escape' => false
                            ]
                        )  ?>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-money"></i><span> Fees </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <?= $this->Html->link('List',[
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
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-money"></i><span>Expenditures </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <?= $this->Html->link('List ',[
                            'plugin'=>null,
                            'controller'=>'Expenditures',
                            'action'=>'index'
                        ],
                            [
                                'escape' => false
                            ])  ?>
                    </li>
                    <li>
                        <?= $this->Html->link('New',[
                            'plugin'=>null,
                            'controller'=>'Expenditures',
                            'action'=>'add'
                        ],
                            [
                                'escape' => false
                            ]
                        )  ?>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-database"></i><span>Receipts </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <?= $this->Html->link('List',[
                            'plugin'=>null,
                            'controller'=>'Receipts',
                            'action'=>'index'
                        ],
                            [
                                'escape' => false
                            ])  ?>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-users"></i><span>Students </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <?= $this->Html->link('List',[
                            'plugin'=>null,
                            'controller'=>'Students',
                            'action'=>'index',
                            '?' => [
                                'class_id' => 1
                            ]
                        ],
                            [
                                'escape' => false
                            ])  ?>
                    </li>
                    <li>
                        <?= $this->Html->link('New',[
                            'plugin'=>null,
                            'controller'=>'Students',
                            'action'=>'add'
                        ],
                            [
                                'escape' => false
                            ]
                        )  ?>
                    </li>
                    <li>
                        <?= $this->Html->link('Change Students Class',[
                            'plugin'=>null,
                            'controller'=>'Students',
                            'action'=>'changeClass'
                        ],
                            [
                                'escape' => false
                            ]
                        )  ?>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-users"></i><span>Accounts </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <?= $this->Html->link('List',[
                            'plugin'=>null,
                            'controller'=>'Accounts',
                            'action'=>'index'
                        ],
                            [
                                'escape' => false
                            ])  ?>
                    </li>
                    <li>
                        <?= $this->Html->link('New',[
                            'plugin'=>null,
                            'controller'=>'Accounts',
                            'action'=>'add'
                        ],
                            [
                                'escape' => false
                            ]
                        )  ?>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-gears"></i><span> Configuration </span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <?= $this->html->link('Settings',[
                            'plugin'=>null,
                            'controller'=>'Dashboard',
                            'action' => 'settings'
                        ],[
                            'escape' => false
                        ]) ?>
                    </li>
                    <li>
                        <?= $this->html->link('Update',[
                            'plugin'=>null,
                            'controller'=>'Dashboard',
                            'action' => 'update'
                        ],[
                            'escape' => false
                        ]) ?>
                    </li>
                    <li>
                        <?= $this->html->link('About',[
                            'plugin'=>null,
                            'controller'=>'Dashboard',
                            'action' => 'about'
                        ],[
                            'escape' => false
                        ]) ?>
                    </li>
                    <li>
                        <?= $this->html->link('Help',[
                            'plugin'=>null,
                            'controller'=>'Dashboard',
                            'action' => 'help'
                        ],[
                            'escape' => false
                        ]) ?>
                    </li>
                </ul>
            </li>
            <li>
                <?= $this->html->link('<i class="fa fa-key"></i> Change Password',[
                    'plugin'=>null,
                    'controller'=>'Accounts',
                    'action' => 'changePassword'
                ],[
                    'escape' => false
                ]) ?>
            </li>
            <li>
                <?= $this->html->link('<i class="fa fa-power-off"></i>Log Out',[
                    'plugin'=>null,
                    'controller'=>'Accounts',
                    'action' => 'logout'
                ],[
                    'escape' => false
                ]) ?>
            </li>
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>