<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">
                Dashboard</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow bg-white">
                <span class="mini-stat-icon bg-info">
                    <i class="md md-email">
                    </i>
                </span>
                <div class="mini-stat-info text-right text-dark">
                    <span class="counter text-dark">
                        <?php echo $totEmail ?>
                    </span>
                    Total Email Sent</div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow bg-white">
                <span class="mini-stat-icon bg-purple">
                    <i class="fa fa-envelope-o">
                    </i>
                </span>
                <div class="mini-stat-info text-right text-dark">
                    <span class="counter text-dark">
                        <?php echo $totCampaign ?>
                    </span>
                    Total Sent Campaign</div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow bg-white">
                <span class="mini-stat-icon bg-success">
                    <i class="ion-android-contacts">
                    </i>
                </span>
                <div class="mini-stat-info text-right text-dark">
                    <span class="counter text-dark">
                        <?php echo $totGroup ?></span>
                    Total Group</div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow bg-white">
                <span class="mini-stat-icon bg-primary">
                    <i class="fa fa-user">
                    </i>
                </span>
                <div class="mini-stat-info text-right text-dark">
                    <span class="counter text-dark">
                        <?php echo $totSub ?>
                    </span>
                    Total Subscriber</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-3" >
            <div class="mini-stat clearfix bx-shadow bg-white" style="padding-bottom: 0px">
                <span class="mini-stat-icon bg-info">
                    <i class="fa fa-calendar-check-o">
                    </i>
                </span>
                <div class="mini-stat-info text-right text-dark">
                    <span class="text-dark">
                        <?php echo $PlanDuration ?>
                    </span>
                    <?php echo $PlanName ?>
                </div>
                <div class="mini-stat-info text-right text-dark">
                    <div class="m-t-20">
                        <h6 class="text-uppercase">
                            Activation Date <span class="">
                            </span>
                                <span class="" style="color: black">
                                    
                                    <?php echo date("d/m/Y",strtotime($PlanDate)); ?>
                                </span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow bg-white">
                <span class="mini-stat-icon bg-purple">
                    <i class="ion-ios7-cart">
                    </i>
                </span>
                <div class="mini-stat-info text-right text-dark">
                    <span class="text-dark">
                        <b class="counter">
                            <?php echo $remainDay ?>
                        </b>/<?php echo $totPlanDay ?></span>
                    Remaining Day</div>
                    <div class="tiles-progress">
                        <div class="m-t-20">
                            <h5 class="text-uppercase">
                                Remaining
                                <span class="pull-right">
                                    <?php echo cntPercentage($totPlanDay,$remainDay).'%' ?>
                                </span>
                            </h5>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo cntPercentage($totPlanDay,$remainDay).'%' ?>">
                                    <span class="sr-only">
                                        <?php cntPercentage($totPlanDay,$remainDay) ?>% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow bg-white">
                <span class="mini-stat-icon bg-success">
                    <i class="md md-email">
                    </i>
                </span>
                <div class="mini-stat-info text-right text-dark">
                    <span class="text-dark">
                        <b class="counter"><?php echo $remainMail ?></b>/<?php echo $totPlanMail ?></span>
                    Remainig Mail to sent</div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">
                            Remaining <span class="pull-right">
                                <?php echo cntPercentage($totPlanMail,$remainMail).'%' ?></span>
                        </h5>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo cntPercentage($totPlanMail,$remainMail).'%' ?>">
                                <span class="sr-only">
                                    <?php echo cntPercentage($totPlanMail,$remainMail).'%' ?> Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow bg-white">
                <span class="mini-stat-icon bg-primary">
                    <i class="fa fa-user">
                    </i>
                </span>
                <div class="mini-stat-info text-right text-dark">
                    <span class="counter text-dark">
                        <?php echo $remainSub ?>
                    </span>
                    Add more Subscriber</div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">
                            .<span class="pull-right">
                                <?php echo cntPercentage($maxSub,$remainSub).'%' ?></span>
                        </h5>
                        <div class="progress progress-sm m-0">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo cntPercentage($maxSub,$remainSub).'%' ?>">
                                <span class="sr-only">
                                    <?php echo cntPercentage($maxSub,$remainSub).'%' ?> Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>template/user/abc/vendor/waypoints/lib/jquery.waypoints.js"></script>
<script src="<?php echo base_url(); ?>template/user/abc/plugins/counterup/jquery.counterup.min.js"></script>
<script type="text/javascript">
                jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
</script>
<?php
    function cntPercentage($tot,$val)
    {
        if($tot != 0)
        {
            return sprintf("%.2f",$val*100/$tot);
        }
        else
        {
            return 0.00;
        }
    }
?>