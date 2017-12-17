<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="<?php echo base_url(); ?>template/adminTemplate/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class='pname'>
                        <?php
                            echo $name;
                        ?>
                        </span>
                        <span class="caret">
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo base_url()."index.php/admin/changePassword/"?>">
                                <i class="md md-settings">
                                </i> Change Password
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url()."index.php/login/logout"; ?>">
                                <i class="md md-settings-power">
                                </i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
                <p class="text-muted m-0">Administrator
                </p>
            </div>
        </div>
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo base_url() . 'index.php/admin/#'; ?>" class="waves-effect waves-light active">
                        <i class="md md-home">
                        </i>
                        <span>Dashboard
                        </span>
                    </a>
                </li>
                <!--<li class="has_sub">
                    <a href="<?php echo base_url() . 'index.php/admin/#'; ?>" class="waves-effect waves-light">
                        <i class="md md-now-widgets">
                        </i>
                        <span>Templates
                        </span>
                        <span class="pull-right">
                            <i class="md md-add">
                            </i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="inbox.html">Inbox
                            </a>
                        </li>
                        <li>
                            <a href="email-compose.html">Compose Mail
                            </a>
                        </li>
                        <li>
                            <a href="email-read.html">View Mail
                            </a>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <a href="<?php echo base_url() . 'index.php/admin/user' ?>" class="waves-effect">
                        <i class="md md-event">
                        </i>
                        <span>Users
                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() . 'index.php/admin/managePlan/' ?>" class="waves-effect">
                        <i class="md md-palette">
                        </i> 
                        <span>Plan-Information
                        </span> 
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() . 'index.php/admin/trackWord/' ?>" class="waves-effect">
                        <i class="md md-invert-colors-on">
                        </i>
                        <span>Track Word
                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() . 'index.php/admin/trackwordReport/' ?>" class="waves-effect">
                        <i class="md md-invert-colors-on">
                        </i>
                        <span>Tracked Campaign
                        </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() . 'index.php/admin/Feedback'; ?>" class="waves-effect waves-light">
                        <i class="md md-now-widgets">
                        </i>
                        <span>Feedback
                        </span>
                    </a>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect waves-light">
                        <i class="md md-redeem">
                        </i> 
                        <span>Location
                        </span> 
                        <span class="pull-right">
                            <i class="md md-add">
                            </i>
                        </span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo base_url() . 'index.php/admin/country/' ?>">Country
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() . 'index.php/admin/state/' ?>">State
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() . 'index.php/admin/city/' ?>">City
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="clearfix">
            </div>
        </div>
        <div class="clearfix">
        </div>
    </div>
</div>