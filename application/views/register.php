    <?php // include_once 'headercss.php'; ?>
<body class="container">
        <div class="wrapper-page" style="margin : 0px auto;">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img">
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white">Create a new Account</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal m-t-20" method="post" action="<?php echo base_url().'index.php/login/register/create' ?>">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input name="txtemail" class="form-control input-lg" type="email" required="" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input name="txtuname" class="form-control input-lg" type="text" required="" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input name="txtpwd" class="form-control input-lg" type="password" required="" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-primary waves-effect waves-light btn-lg w-lg" type="submit">Register</button>
                            </div>
                        </div>
                        <div class="form-group m-t-30">
                            <div class="col-sm-12 text-center">
                                <a href="./../">Already have account?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <?php include_once 'footerscript.php'; ?>
    <script>var resizefunc = [];</script>