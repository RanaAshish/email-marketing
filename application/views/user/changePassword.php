<style>
    .front{
        display:none;
        position: absolute;
        top: 36%;
        left: 40%;
        width: 30%;
        height: 25%;
        padding: 16px;

        background-color: transparent;
        -moz-border-radius-topright: 2em;
        -moz-border-radius-topleft: 2em;
        -moz-border-radius-bottomright: 2em;
        -moz-border-radius-bottomleft: 2em;
        z-index:3;
    }
    .back{
        display: none;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        opacity:0.7;
        z-index:2;
    }
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
</style>
<div class="content">
    <div class="wraper container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-picture text-center parallax" data-stellar-background-ratio="0.8" style="background-image:url('<?php echo base_url(); ?>template/adminTemplate/images/big/bg.jpg')">
                    <div class="bg-picture-overlay">
                    </div>
                    <div class="profile-info-name">

                        <a title="Change Picture">
                            <img id="profilepic" src="<?php echo base_url(); ?>template/BasicTemplate/<?php echo $userid . '/ProfileImage.jpg?'.  rand(0, 1020304050); ?>" cursor:'hand' class="thumb-lg img-thumbnail change" alt="profile-image" data-toggle='modal' data-target='#mymodal'>
                        </a>
                        <h3 id='pname' class="text-white"><?php echo $fname . " " . $lname ?>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content profile-tab-content">
                    <div class="tab-pane active" id="home-2">
                        <div class="row" ng-app='myapp' ng-controller='myctr'>
                            <div class="col-md-6">
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
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Change Footer Image
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <img class="fImg" src="<?php echo base_url() . 'template/BasicTemplate/' . $userid . '/emailMarketing.jpeg?' . rand(0, 10502525); ?>">
                                            <div class="fileUpload btn btn-success" style="float:right">
                                                <span>Change</span> 
                                                <input type="file" accept="image/*" class="upload" ng-file-select="onFooterChange($files)" name="myfile"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Personal Information
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="about-info-p">
                                            <strong class="col-md-6">First Name
                                            </strong>
                                            <a href="#" id="fname" class="text-muted">
                                                <?php echo $fname; ?>
                                            </a>
                                        </div>
                                        <div class="about-info-p">
                                            <strong class="col-md-6">Last Name
                                            </strong>
                                            <a href="#" id="lname" class="text-muted">
                                                <?php echo $lname; ?>
                                            </a>
                                        </div>
                                        <div class="about-info-p">
                                            <strong  class="col-md-6">Email
                                            </strong>
                                            <p id="email" class="text-muted">
                                                <?php echo $email; ?>
                                            </p>
                                        </div>
                                        <div class="about-info-p">
                                            <strong  class="col-md-6">Workforce
                                            </strong>
                                            <a href="#" id="workforce" class="text-muted">
                                                <?php echo $workforce; ?>
                                            </a>
                                        </div>
                                        <div class="about-info-p">
                                            <strong  class="col-md-6">Name of Organization
                                            </strong>
                                            <a href="#" id="name_organization" class="text-muted">
                                                <?php echo $name_organization; ?>
                                            </a>
                                        </div>
                                        <div class="about-info-p">
                                            <strong  class="col-md-6">Age of Organization
                                            </strong>
                                            <a href="#" id="age_Organization" class="text-muted">
                                                <?php echo $age_Organization; ?>
                                            </a>
                                        </div>
                                        <div class="about-info-p">
                                            <strong  class="col-md-6">Website
                                            </strong>
                                            <a href="#" id="website" class="text-muted">
                                                <?php echo $website; ?>
                                            </a>
                                        </div>
                                        <div class="about-info-p">
                                            <strong  class="col-md-6">Address
                                            </strong>
                                            <a href="#" id="address" class="text-muted">
                                                <?php echo $address; ?>
                                            </a>
                                        </div>
                                        <!-- <div class="about-info-p">
                                            <strong  class="col-md-6">Type of organization
                                            </strong>
                                            <a href="#" id="type_organization" class="text-muted">
                                        <?php echo $type_organization; ?>
                                            </a>
                                        </div>
                                        <div class="about-info-p">
                                            <strong  class="col-md-6">Profile
                                            </strong>
                                            <a href="#" id="profile" class="text-muted">
                                        <?php echo $profile; ?>
                                            </a>
                                        </div>
                                        <div class="about-info-p">
                                            <strong  class="col-md-6">City
                                            </strong>
                                            <a href="#" id="city" class="text-muted">
                                        <?php echo $city; ?>
                                            </a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div id="mymodal" class='modal' >
                                <div class='modal-dialog' style="width:20%">
                                    <div class='modal-content'>
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                            </button>
                                            <h4 class="modal-title" id="myLargeModalLabel">Update Profile Picture
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row" style="max-width:100%">
                                                    <div class="fileUpload btn btn-info col-sm-12">
                                                        <span>Change Profile</span>
                                                        <input type="file" class="upload" ng-file-select="onFileSelect($files)" name="myfile"/>
                                                    </div>
                                                </div>
                                            </form>
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
<div id="back" class="back"></div>
<div id="front" class="front">
    <img src="<?php echo base_url() . 'template/user/images/animated.gif'; ?>" alt="processing"/>
</div>

<style>

    .change:hover
    {
        cursor: pointer;

        opacity : 0.7; 
    }
</style>
<script type="text/javascript">
    $('document').ready(function() {
        $("#form").submit(function()
        {
            var oldpass = $("#OldPassword").val();
            var newpass = $("#Password").val();
            var repass = $("#RePassword").val();
            if (oldpass == "")
            {
                swal("Enter Current Password");

            }
            else if (newpass == "")
            {
                swal("Enter New Password");
            }
            else if (repass == "")
            {
                swal("Re-Enter New Password");
            }
            else if (newpass != repass)
            {
                sweetAlert("Wrong Password", "New Password and Re-entered Password doesn't match", "error");
            }
            else
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/user/changePassword/change",
                    type: "post",
                    data: "oldpass=" + oldpass + "&newpass=" + newpass,
                    success: function(str)
                    {
                        if (str == 0)
                        {
                            sweetAlert("Wrong Password", "Current Password is Wrong", "error");
                            return false;
                        }
                        swal("Password changed", "Your Password has been changed", "success");
                        $("#OldPassword").val("");
                        $("#Password").val("");
                        $("#RePassword").val("");
                    }
                });
            }
            return false;
        });
    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>template/user/abc/pages/jquery.xeditable_user.js"></script>
<script type="text/javascript">
    var app = angular.module('myapp', ['angularFileUpload']);
    app.controller('myctr', function($scope, $http, $upload)
    {

        $scope.onFileSelect = function($files)
        {
            $("#mymodal").modal("hide");
            $("#back").css("display", "block");
            $("#front").css("display", "block");
            $upload.upload({
                url: '<?php echo base_url() . 'index.php/user/ProfileImage' ?>',
                file: $files
            }).success(function(response)
            {
                if (response == "success")
                {
                    $("#back").css("display", "none");
                    $("#front").css("display", "none");
                    $(".change").attr("src","<?php echo base_url(); ?>template/BasicTemplate/<?php echo $userid . '/ProfileImage.jpg?'.  rand(152, 1020304050); ?>");
                    swal("File Successfuly uploaded...");
                }
                else
                {
                    $("#back").css("display", "none");
                    $("#front").css("display", "none");
                    swal("File Formate is not Supported");
                }
            });
        };
        $scope.onFooterChange = function($files)
        {
            //$("#mymodal").modal("hide");
            $("#back").css("display", "block");
            $("#front").css("display", "block");
            $upload.upload({
                url: '<?php echo base_url() . 'index.php/user/FooterImage' ?>',
                file: $files
            }).success(function(response)
            {
                $('.fImg').attr('src', response);
                $("#back").css("display", "none");
                $("#front").css("display", "none");

            });
        };
    });
</script>