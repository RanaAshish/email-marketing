<style type="text/css">
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
<div class="container">
    <ul style="width: 100%;" class="nav nav-tabs tabs">
        <li style="width: 25%;" class="tab active">
            <a class="active" href="#view" data-toggle="tab" aria-expanded="true">
                <span class="visible-xs">
                    <i class="fa fa-home">
                    </i>
                </span> 
                <span class="hidden-xs">View Subscriber
                </span>
            </a>
        </li>
        <li style="width: 25%;" class="tab ">
            <a class="" href="#add" data-toggle="tab" aria-expanded="false">
                <span class="visible-xs">
                    <i class="fa fa-user">
                    </i>
                </span> 
                <span class="hidden-xs">Add Subscriber
                </span>
            </a>
        </li>
        <div style="right: 534px; left: 0px;" class="indicator">
        </div>
    </ul>

    <div class="tab-content" ng-app="myapp1"  ng-controller="myctr">
        <div style="display: block;"  ng-cloak="" class="tab-pane active" id="view">
            <div class="row" style="margin:2px" ng-if="subres.length != 0">
                <div class="fileUpload col-lg-offset-9" style="float:right">
                    <a href="<?php echo base_url() . 'index.php/user/exportSubscriber' ?>" class="btn btn-danger  btn-link"><span>Export Excel File</span></a>
                </div>
            </div>

            <div class="alert alert-danger" ng-if="msg != ''">
                <?php echo $errormsg ?>
            </div>
            <div class="table table-responsive">
                <table class="table table-bordered table-striped" ng-if="subres.length != 0">
                    <tr>
                        <td colspan="5">
                            <input type="text" class="form-control" style="width:25%;float:left;" placeholder="Search" value="India" ng-model="var">
                            <input type="number" min="1"  max="25" class="form-control" style="width:8%; float:right" placeholder="Search" ng-model="pageSize"/>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <a href="#" ng-click="sortType = 'fname';
                                        sortReverse = !sortReverse">
                                Subscriber Name
                                <span ng-show="sortType == 'fname' && !sortReverse" class="fa fa-caret-down"></span>
                                <span ng-show="sortType == 'fname' && sortReverse" class="fa fa-caret-up"></span>
                            </a>
                        </th>
                        <th>
                            <a href="#" ng-click="sortType = 'email';
                                        sortReverse = !sortReverse">
                                Subscriber Email
                                <span ng-show="sortType == 'email' && !sortReverse" class="fa fa-caret-down"></span>
                                <span ng-show="sortType == 'email' && sortReverse" class="fa fa-caret-up"></span>
                            </a>
                        </th>
                        <th>
                            <a href="#" ng-click="sortType = 'RegistrationTime';
                                        sortReverse = !sortReverse">
                                Registration Date
                                <span ng-show="sortType == 'RegistrationTime' && !sortReverse" class="fa fa-caret-down"></span>
                                <span ng-show="sortType == 'RegistrationTime' && sortReverse" class="fa fa-caret-up"></span>
                            </a>
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                    <tr dir-paginate="x in subres|filter:var|orderBy:sortType:sortReverse| itemsPerPage: pageSize" current-page= "currentPage">
                        <td>{{x.fname + " " + x.lname}}</td>
                        <td>{{x.email}}</td>
                        <td>{{x.RegistrationTime}}</td>
                        <td><a class="update" id="{{x.id}}" href="#" data-toggle="modal"><span class="fa fa-pencil"></span></a>
                            &nbsp;
                            <a class="delete" href="<?php echo base_url() . 'index.php/user/subscriber/delete/'; ?>{{x.id}}"><span class="fa fa-trash-o"></span></a></td>
                    </tr>
                </table>

                <!-- Model for update -->
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                </button>
                                <h4 class="modal-title" id="myLargeModalLabel">Update Subscriber
                                </h4>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <form class="form-horizontal" id="updateForm" method="post" action="">
                                        <div class="col-sm-8">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">
                                                        Subscriber info
                                                    </h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">First Name:</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="fname" placeholder="First Name" type="text" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-3 control-label">Last Name:</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="lname" placeholder="Last Name" type="text" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword4" class="col-sm-3 control-label">Email</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" name="email" placeholder="Email" type="email" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group m-b-0">
                                                        <div class="col-sm-offset-3 col-sm-9">
                                                            <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">
                                                        Groups Name
                                                    </h3>
                                                </div>
                                                <div class="panel-body todoapp">
                                                    <div class="row">
                                                    </div>
                                                    <ul tabindex="5002" class="list-group no-margn nicescroll todo-list" style="max-height: 300px; overflow: hidden;" id="todo-list">
                                                        <div class="alert alert-info" ng-if="res.length == 0">
                                                            No Group available.
                                                        </div>
                                                        <li class="list-group-item" ng-repeat="x in res">
                                                            <div class="checkbox checkbox-primary">
                                                                <input class="todo-done ch" value="{{x.id}}" type="checkbox" name="group[]">
                                                                <label>
                                                                    {{x.name}}
                                                                </label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="alert alert-info" ng-if="subres.length == 0">
                    No available Subscriber
                </div>



                <div style="float:right">
                    <dir-pagination-controls boundary-links="true"  template-url="<?php echo base_url(); ?>/template/paging/dirPagination.tpl.html"></dir-pagination-controls>
                </div>
            </div>
        </div>
        <div style="display: none;" class="tab-pane" id="add">
            <div class="container">
                <div class="row" style="margin:2px">
                    <div class="fileUpload btn btn-danger col-lg-offset-9" style="float:right">
                        <span>Import From Excel File</span>
                        <input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" class="upload" ng-file-select="onFileSelectInModel($files)" name="myfile"/>
                    </div>
                </div>
                <div class="row">
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . "index.php/user/subscriber/create"; ?>">
                        <div class="col-sm-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        Subscriber info
                                    </h3>
                                </div>
                                <div class="panel-body" style="min-height: 350px">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">First Name:</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="txtfname" placeholder="First Name" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Last Name:</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="txtlname" placeholder="Last Name" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="txtemail" placeholder="Email" type="email" required="">
                                        </div>
                                    </div>
                                    <div class="form-group m-b-0">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        Groups Name
                                    </h3>
                                </div>
                                <div class="panel-body todoapp">
                                    <div class="row">
                                    </div>
                                    <ul tabindex="5002" class="list-group no-margn nicescroll todo-list" style="max-height: 300px;min-height: 300px;  overflow: hidden;" id="todo-list">
                                        <div class="alert alert-info" ng-if="res.length == 0">
                                            No Group available.
                                        </div>
                                        <li class="list-group-item" ng-repeat="x in res">
                                            <div class="checkbox checkbox-primary">
                                                <input class="todo-done" value="{{x.id}}" type="checkbox" name="groups[]">
                                                <label>
                                                    {{x.name}}
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="filemanager" class="modal" role="dialog" style="">
            <div class="modal-dialog col-lg-12" style="width: 100%;height: 100%;min-height: 100%;top:6%;bottom: 0px;position: fixed;padding: 0px; overflow: hidden">
                <div id="back1" class="back"></div>
                <div id="front1" class="front">
                    <img src="<?php echo base_url() . 'template/user/images/animated.gif'; ?>" alt="processing"/>
                </div>
                <!-- Modal content-->
                <div class="modal-content" style="max-height: 91%;min-height: 91%;overflow: scroll;background-color: whitesmoke">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Select Data specific field and group in which subscriber is going to add</h4>
                    </div>
                    <div class="modal-body" >
                        <div class='col-sm-12 col-md-12 col-lg-12'>
                            <div class='col-lg-5'>
                                <div class='col-sm-12 col-lg-12'>
                                    <div class="panel panel-primary">
                                        <div class='panel-heading'>
                                            <h3 class="panel-title">Select Field Name</h3>
                                        </div>
                                        <div class='fieldData panel-body nicescroll' style="max-height: 200px;min-height: 200px;  overflow: hidden;">
                                        </div>
                                    </div>
                                </div>
                                <div class='groupData col-sm-12 col-lg-12'>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                Groups Name
                                            </h3>
                                        </div>
                                        <div class="panel-body nicescroll"  style="max-height: 200px;min-height: 200px;  overflow: hidden;">
                                            <div class="row">
                                            </div>
                                            <ul tabindex="5002" class="list-group no-margn">
                                                <div class="alert alert-info" ng-if="res.length == 0">
                                                    No Group available.
                                                </div>
                                                <li class="list-group-item" ng-repeat="x in res" style="padding:2px;border:none">
                                                    <div class="checkbox checkbox-primary">
                                                        <input class="" value="{{x.id}}" type="checkbox" name="grp[]">
                                                        <label>
                                                            {{x.name}}
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-lg-7'>
                                <div class='row'>
                                    <div class='col-sm-12 col-lg-12'>
                                        <div class="panel panel-primary">
                                            <div class='panel-heading'>
                                                <h3 class="panel-title">Select Subscriber</h3>
                                            </div>
                                            <div class='subscriberData panel-body nicescroll' style="max-height: 400px;min-height: 400px;  overflow: hidden;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-12 col-lg-12'>
                                        <button class='addsub btn btn-success col-sm-offset-8 col-sm-4'>Add Subscriber</button>
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

<script type="text/javascript">
    var app = angular.module('myapp1', ['angularUtils.directives.dirPagination', 'angularFileUpload']);
    app.controller('myctr', function($scope, $http, $upload)
    {
        $scope.res = <?php echo $result; ?>;
        $scope.subres = <?php echo $Subresult ?>;
        $scope.msg = "<?php if (isset($errormsg)) {
                    echo $errormsg;
                } ?>";
        $scope.currentPage = 1;
        $scope.pageSize = 10;
        $scope.openFilemanager = function()
        {
            $http
                    .post("<?php echo base_url() . 'index.php/user/thubimage' ?>")
                    .success(function(dir_data)
                    {
                        $scope.thumb = dir_data;
                        $("#filemanager").modal({backdrop: false});
                    });
        };
        $scope.onFileSelectInModel = function($files)
        {
            $("#back").css("display", "block");
            $("#front").css("display", "block");
            $upload.upload({
                url: '<?php echo base_url() . 'index.php/user/UploadExcelFile' ?>',
                file: $files
            }).success(function(response)
            {
                $(".fieldData").html(response[0]);
                $(".subscriberData").html(response[1]);
                //alert(response[0]+"\n\n\n"+response[1]);
                //$scope.lists.selected.sc = response;
                // $http
                //     .post("<?php echo base_url() . 'index.php/user/thubimage' ?>")
                //     .success(function(str)
                //     {
                //     //alert(str);
                //         $scope.thumb = str;
                $("#back").css("display", "none");
                $("#front").css("display", "none");
                $("#filemanager").modal({backdrop: false});
                //     });
            });
        };
    });
</script>
<script type="text/javascript">
    $(function()
    {
        $(".table").on("click", ".update", function() {
            var url = '<?php echo base_url() . 'index.php/user/subscriber/'; ?>';
            var id = $(this).attr("id");
            $("#updateForm").attr("action", "<?php echo base_url() . "index.php/user/subscriber/update/"; ?>" + id);
            $.get(url + "get/" + id, function(str)
            {
                var arr = JSON.parse(str);
                $("[name='fname']").val(arr.fname);
                $("[name='lname']").val(arr.lname);
                $("[name='email']").val(arr.email);
            });
            $.get(url + "getGroup/" + id, function(str)
            {
                var arr = JSON.parse(str);
                $(".ch").prop("checked", false);
                for (var index in arr)
                {
                    $("[name='group[]'][value=" + arr[index].group_id + "]").prop("checked", true);
                }
                $(".bs-example-modal-lg").modal("show");
            });
        });
        var old = '';
        $(".fieldData").on("click", ".sel", function() {
            old = $(this).val();
        });
        $(".fieldData").on("change", ".sel", function() {
            var n = $(this).val();
            if (n != '0')
            {
                $(".sel option:not(:selected)[value=" + n + "]").attr("disabled", "disabled");
            }
            if (old != '0')
            {
                $(".sel option[value=" + old + "]").attr("disabled", false);
            }
        });
        $(".addsub").click(function() {
            var fname = $('.sel option:selected[value=fname]').parent().attr("sel");
            var lname = $('.sel option:selected[value=lname]').parent().attr("sel");
            var email = $('.sel option:selected[value=email]').parent().attr("sel");

//            if(($(".sel").length - $(".sel option:selected[value=0]").length)==3)
            if ((typeof (fname) !== "undefined") && (typeof (email) !== "undefined"))
            {
                if (typeof (lname) !== "undefined")
                {
                    lname = "";
                }
                $("#back1").css("display", "block");
                $("#front1").css("display", "block");


                // All the Selected Subscriber
                var subarr = $("[name='sub[]']:checked").map(function() {
                    return $(this).val();
                }).get();

                // Get All the selected group
                var grouparr = $("[name='grp[]']:checked").map(function() {
                    return $(this).val();
                }).get();

                var dta = new Array();
                dta[0] = fname;
                dta[1] = lname;
                dta[2] = email;
                dta[3] = subarr;
                dta[4] = grouparr;

                // alert(JSON.stringify(dta));
                $.ajax({
                    url: '<?php echo base_url() . "index.php/user/ImportexcelFile/" ?>',
                    data: "data=" + JSON.stringify(dta),
                    type: "post",
                    success: function(str) {
                        $("#back1").css("display", "none");
                         $("#front1").css("display", "none");
                        if(str == "1")
                        {
                            swal("Subscriber is imported");
                            window.location = "<?php echo base_url() . 'index.php/user/subscriber/' ?>";                        
                        }
                        else
                        {
                            swal("You are exceeding your plan limit\nSubscriber can't be imported");
                        }
                        
                    }
                });
            }

            else if (typeof (fname) === "undefined")
            {
                swal("Please Select first name Field");
            }
            else if (typeof (email) === "undefined")
            {
                swal("Please Select email Field");
            }
        });
    });
</script>