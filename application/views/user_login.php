<?php // include_once 'headercss.php';  ?>

<div class="wrapper-page" style="margin : 0px auto;">
    <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-heading bg-img"> 
            <div class="bg-overlay"></div>
            <h3 class="text-center m-t-10 text-white">Sign In to User</h3>
        </div> 


        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="<?php echo base_url() . 'index.php/login/userLogin/check' ?>" method="post">

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input name="txtemail" class="form-control input-lg " type="email" required="" placeholder="Email ID">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input name="txtpwd" class="form-control input-lg" type="password" required="" placeholder="Password">
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button value="submit" name="submit" class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

                <div class="form-group m-t-30">
                    <div class="col-sm-7">
                        <a href="#"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    </div>
                    <div class="col-sm-5 text-right">
                        <a href="<?php echo base_url() . 'index.php/login/register/' ?>">
                            Create an account
                        </a>
                    </div>
                </div>
            </form> 
        </div>                                 

    </div>
</div>
<script>
    var resizefunc = [];
</script>
<?php include_once 'footerscript.php'; ?>