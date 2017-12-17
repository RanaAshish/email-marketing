<?php // include_once 'headercss.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-offset-1 col-lg-5 col-sm-12">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading" style="padding: 10px;"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white">Conact Information</h3>
                </div> 

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 style="color: blue">Address</h3>
                        </div>
                        <div class="col-sm-offset-1 col-sm-11">
                            301, Queeni Park Apt.,<br/>
                            Sagrampura Main Road,<br/>
                            Sagrampura,<br/>
                            Surat - 395002
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 style="color: blue">Email Address</h3>
                        </div>
                        <div class="col-sm-offset-1 col-sm-11">
                            ashisharana@yahoo.com<br/>
                            rana_ashish11@yahoo.com
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 style="color: blue">Phone Number</h3>
                        </div>
                        <div class="col-sm-offset-1 col-sm-11">
                            8866280326<br>
                            8238381538<br/>
                            7359707395
                        </div>
                    </div>
                </div>                                 

            </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-4 col-sm-12">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img" style="padding: 10px;"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white">Feedback Form</h3>
                </div> 


                <div class="panel-body">
                    <form class="form-horizontal m-t-20" action="<?php echo base_url() . 'index.php/menu/contact/feedback' ?>" method="post">

                        <div class="form-group">
                            <div class="col-xs-6">
                                <input name="txtfname" class="form-control input-lg" type="text" required="" placeholder="First Name">
                            </div>
                            <div class="col-xs-6">
                                <input name="txtlname" class="form-control input-lg" type="text" required="" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input name="txtemail" class="form-control input-lg " type="email" required="" placeholder="Enter Your Email Address">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <textarea placeholder="Put feedback content here" class="form-control" name="txtcontent" required=""></textarea>
                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button value="submit" name="submit" class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Submit</button>
                            </div>
                        </div>
                    </form> 
                </div>                                 

            </div>
        </div>
    </div>
</div>


<script>
    var resizefunc = [];
</script>
<?php include_once 'footerscript.php'; ?>