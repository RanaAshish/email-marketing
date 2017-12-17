<div class="content">
    <div class="wraper container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-picture text-center parallax" data-stellar-background-ratio="0.8" style="background-image:url('<?php echo base_url(); ?>template/adminTemplate/images/big/bg.jpg')">
                    <div class="bg-picture-overlay">
                    </div>
                    <div class="profile-info-name">
                        <img src="<?php echo base_url(); ?>template/adminTemplate/images/users/avatar-1.jpg" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                        <h3 class="text-white pname"><?php echo $name ?>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content profile-tab-content">
                    <div class="tab-pane active" id="home-2">
                        <div class="row">
                            
                            <div class="col-md-8">
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Change Password
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <form id="form" role="form" method="post" action="#">
                                            <div class="form-group">
                                                <label for="Username">Current Password
                                                </label>
                                                <input type="password" placeholder="Enter Current Password" id="OldPassword" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="Password">New Password
                                                </label>
                                                <input type="password" placeholder="Enter New Password" id="Password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="RePassword">Re-Password
                                                </label>
                                                <input type="password" placeholder="Re-enter new Password" id="RePassword" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Change" class="btn btn-success col-sm-3" name="submit" id="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Personal Information
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="about-info-p">
                                            <strong>First Name
                                            </strong>
                                            <br>
                                            <a href="#" id="fname" class="text-muted">
                                                <?php echo $fname; ?>
                                            </a>
                                        </div>
                                        <div class="about-info-p">
                                            <strong>Last Name
                                            </strong>
                                            <br>
                                            <a href="#" id="lname" class="text-muted">
                                                <?php echo $lname; ?>
                                            </a>
                                        </div>
                                        <div class="about-info-p">
                                            <strong>Email
                                            </strong>
                                            <br>
                                            <p class="text-muted">
                                                <?php
                                                    echo $email;
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>template/adminTemplate/pages/jquery.xeditable.js"></script>
<script type="text/javascript">
    $('document').ready(function(){
        $("#form").submit(function()
        {
            var oldpass = $("#OldPassword").val();
            var newpass = $("#Password").val();
            var repass = $("#RePassword").val();
            if(oldpass == "")
            {
                swal("Enter Current Password");
                return false;
            }
            if(newpass == "")
            {
                swal("Enter New Password");
                return false;
            }
            if(repass == "")
            {
                swal("Re-Enter New Password");
                return false;
            }
            if(newpass != repass)
            {
                sweetAlert("Wrong Password","New Password and Re-entered Password doesn't match","error");
                return false;
            }
            $.ajax({
                url : "<?php echo base_url(); ?>index.php/admin/changePassword/change",
                type : "post",
                data : "oldpass="+oldpass+"&newpass="+newpass,
                success : function(str)
                {
                    if(str == 0)
                    {
                        sweetAlert("Wrong Password","Current Password is Wrong","error");
                        return false;
                    }
                    swal("Password changed","Your Password has been changed","success");
                    $("#OldPassword").val("");
                    $("#Password").val("");
                    $("#RePassword").val("");
                }
            });
            return false;
        });
    });
</script>