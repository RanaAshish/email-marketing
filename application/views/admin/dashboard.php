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
                        <?php echo $totEmail; ?>
                    </span>
                    Total Email Sent
                </div>
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
                    <i class="fa fa-users">
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
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow bg-white">
                <span class="mini-stat-icon bg-info">
                    <i class="ion-android-contacts">
                    </i>
                </span>
                <div class="mini-stat-info text-right text-dark">
                    <span class="counter text-dark">
                        <?php echo $totUser; ?>
                    </span>
                    Total User
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow bg-white">
                <span class="mini-stat-icon bg-info">
                    <i class="md md-invert-colors-on">
                    </i>
                </span>
                <div class="mini-stat-info text-right text-dark">
                    <span class="counter text-dark">
                        <?php echo $totTrackCampaign; ?>
                    </span>
                    Tracked Campaign
                </div>
            </div>
        </div>
        
    </div>
</div>
<script src="<?php echo base_url(); ?>template/user/abc/vendor/waypoints/lib/jquery.waypoints.js"></script>
<script src="<?php echo base_url(); ?>template/user/abc/plugins/counterup/jquery.counterup.min.js"></script>
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