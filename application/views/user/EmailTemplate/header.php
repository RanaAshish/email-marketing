            <div class="topbar">
                <!-- LOGO -->
                
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
<!--                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>-->
                                <div class="logo">
									<a href="<?php echo base_url().'index.php/user/' ?>" class="logo">
										<i class="md md-terrain"></i> 
										<span>
											Email Marketing
										</span>
									</a>
                                </div>
                                <span class="clearfix"></span>
                            </div>
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown">
                                    <a href="tables-editable.html" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url(); ?>template/BasicTemplate/<?php echo $userid . '/ProfileImage.jpg?'.  rand(0, 1020304050); ?>" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>index.php/user/changePassword/"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="<?php echo base_url().'index.php/login/logout'?>"><i class="md md-settings-power"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>