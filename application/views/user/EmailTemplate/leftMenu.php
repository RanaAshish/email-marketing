<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="<?php echo base_url(); ?>template/BasicTemplate/<?php echo $userid . '/ProfileImage.jpg'; ?>" alt="User" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $username ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>index.php/user/changePassword/"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                        <li><a href="<?php echo base_url().'index.php/login/logout'?>"><i class="md md-settings-power"></i> Logout</a></li>
                    </ul>
                </div> 
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
				<li>
					<a href="<?php echo base_url() . 'index.php/user/'; ?>" class="waves-effect waves-light">
                        <i class="fa fa-home"></i>
                        <span>Dashboard
                        </span>
                    </a>
				</li>
                <li class="has_sub">
                    <a href="#" class="waves-effect waves-light">
                        <i class="fa fa-envelope-o"></i>
                        <span>Campaign
                        </span>
                        <span class="pull-right">
                            <i class="md md-add">
                            </i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo base_url() . 'index.php/user/manageTemplate/plain/'; ?>">Plain Text
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() . 'index.php/user/manageTemplate/'; ?>">HTML Template
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() . 'index.php/user/campaign/'; ?>">Sent Campaign
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo base_url() . 'index.php/user/saveTemplate/view'; ?>" class="waves-effect"><i class="fa fa-file-text-o"></i>
                        <span>Template</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url() . 'index.php/user/manageGroup/'; ?>" class="waves-effect"><i class="fa fa-group"></i>
                        <span>Group</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url() . 'index.php/user/subscriber/'; ?>" class="waves-effect"><i class="fa fa-user-md"></i>
                        <span>Subscriber</span>
                    </a>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect waves-light">
                        <i class="fa fa-calendar-check-o"></i>
                        <span>Plan
                        </span>
                        <span class="pull-right">
                            <i class="md md-add">
                            </i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo base_url() . 'index.php/user/UserPlan/'; ?>">Plan History
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() . 'index.php/user/UserPlan/NewPlan/'; ?>">Activate New Plan
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!--
                                <li class="has_sub">
                                    <a href="#" class="waves-effect"><i class="md md-schedule"></i> <span> Schedule </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="manual-timetable.php">Manual Timetable</a></li>
                                        <li><a href="temporary-timetable.php">Temporary Timetable</a></li>
                                    </ul>
                                </li>-->
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>