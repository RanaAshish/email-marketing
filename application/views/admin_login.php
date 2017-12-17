<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <title>Email Marketing  </title>
        <?php include_once 'headercss.php'; ?>
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In</h3>
                </div> 


                <div class="panel-body">
                    <form class="form-horizontal m-t-20" action="<?php echo base_url().'index.php/login/adminLogin/check' ?>" method="post">

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input name="txtemail" class="form-control input-lg " type="text" required="" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input name="txtpwd" class="form-control input-lg" type="password" required="" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>

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
                        </div>
                    </form> 
                </div>                                 

            </div>
        </div>


        <script>
            var resizefunc = [];
        </script>
       <?php include_once 'footerscript.php';  ?>
    </body>
</html>