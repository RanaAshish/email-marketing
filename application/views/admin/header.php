<div class="topbar">
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="<?php echo base_url().'index.php/admin/' ?>" class="logo">
                            <i class="md md-terrain">
                            </i> 
                            <span>Email Marketing
                            </span>
                        </a>
                    </div>
                </div>
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="fa fa-bars">
                                    </i>
                                </button> 
                                <span class="clearfix">
                                </span>
                            </div>
                            <form class="navbar-form pull-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control search-bar" placeholder="">
                                </div>
                                <button type="submit" class="btn btn-search">
                                    <i class="fa fa-search">
                                    </i>
                                </button>
                            </form>
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect">
                                        <i class="md md-crop-free">
                                        </i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                                        <img src="<?php echo base_url(); ?>template/adminTemplate/images/users/avatar-1.jpg" alt="user-img" class="img-circle">
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?php echo base_url()."index.php/admin/changePassword/ "?>">
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
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>