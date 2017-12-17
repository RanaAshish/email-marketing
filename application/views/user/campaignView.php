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
<div class="container" ng-cloak="" ng-app="myapp1"  ng-controller="myctr" ng-cloak="">
    <div class="row">
        <div class="col-sm-8">
            <h3 class="page-title">
                Sent Campaign
            </h3>
        </div>
        <div class="col-sm-offset-2 col-sm-2">
            <input type="button" style="margin:10px" value="File manager" class="btn btn-success" ng-click="openFilemanager()"/>
        </div>
    </div>
    <div class="row">
        <hr>
    </div>
    <div class="row">
        <div class='alert alert-info' ng-if='res.length == 0'>
            No Campaign Found
        </div>
        <div id="view" ng-if='res.length != 0'>            
            <div  id="viewform" class="col-sm-12">
                <div class="row"></div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="height: 50px">
                        <div class="panel-title">
                            <input type="text" class="form-control" style="width: 20%;float: left;" placeholder="Search" ng-model="var"/>
                            <div class="col-sm-offset-11">
                                <input type="number" min="1"  max="25" class="form-control" placeholder="Search" ng-model="pageSize"/>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table table-responsive">
                            <table class="abc table table-bordered table-striped">
                                <tr>
                                    <th>
                                        <a href="#" ng-click="sortType = 'name';
                                                sortReverse = !sortReverse">
                                            Campaign Name
                                            <span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'email_subject';
                                                sortReverse = !sortReverse">
                                            Subject of Email
                                            <span ng-show="sortType == 'email_subject' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'email_subject' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'from_name';
                                                sortReverse = !sortReverse">
                                            Sent From Name
                                            <span ng-show="sortType == 'from_name' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'from_name' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'from_email';
                                                sortReverse = !sortReverse">
                                            Sent From Email
                                            <span ng-show="sortType == 'from_email' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'from_email' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'creationDate';
                                                sortReverse = !sortReverse">
                                            Campaign Date
                                            <span ng-show="sortType == 'creationDate' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'creationDate' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'type';
                                                sortReverse = !sortReverse">
                                            Campaign Type
                                            <span ng-show="sortType == 'type' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'type' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        Details
                                    </th>
                                </tr>
                                <tr dir-paginate="x in res|filter:var|orderBy:sortType:sortReverse| itemsPerPage: pageSize" current-page= "currentPage">
                                    <td>{{x.name}}</td>
                                    <td>{{x.email_subject}}</td>
                                    <td>{{x.from_name}}</td>
                                    <td>{{x.from_email}}</td>
                                    <td>{{x.creationDate}}</td>
                                    <td>{{x.type}}</td>
                                    <td>
                                        <a href='' id={{x.id}} class='info' title="Content of Campaign"><span class="fa fa-info"></span></a>&nbsp;
                                        <a href='' id={{x.id}} class='subscriber' title="Subsciber of Campaign"><span class="fa fa-user-md"></span></a>&nbsp;
                                        <a ng-if='x.type == "HTML Email"' href="<?php echo base_url() . 'index.php/user/editTemplate/'; ?>{{x.id}}" class="edit" id="{{x.id}}"><span class="fa fa-pencil"></span></a>
                                        &nbsp;
                                        <!-- <a class="delete" href="<?php echo base_url() . 'index.php/user/campaign/delete/'; ?>{{x.id}}"><span class="fa fa-trash-o"></span></a> -->


                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div style="float:right">
                            <dir-pagination-controls boundary-links="true"  template-url="<?php echo base_url(); ?>/template/paging/dirPagination.tpl.html"></dir-pagination-controls>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="filemanager" class="modal" role="dialog" style="">
        <!--Process pop-up start-->
        <div id="back" class="back"></div>
        <div id="front" class="front">
            <img src="<?php echo base_url() . 'template/user/images/animated.gif'; ?>" alt="processing"/>
        </div>
        <!--Process pop-up end-->
        <!--Imagename edit pop-up start-->

        <div id="editFile" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" ng-click="close()">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <label>Change Filename:</label>
                                <input type="text" class="form-control" ng-model="imgname" name="imgname">
                            </div>
                            <button class="btn btn-default" ng-click="chageName(<?php echo $userid; ?>)">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" ng-click="close()">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <!--Imagename edit pop-up end-->

        <div class="modal-dialog col-lg-12" style="width: 100%;height: 100%;min-height: 100%;top:6%;bottom: 0px;position: fixed;padding: 0px; overflow: hidden">

            <!-- Modal content-->
            <div class="modal-content" style="max-height: 91%;min-height: 91%;overflow: scroll;background-color: whitesmoke">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Images</h4>
                </div>
                <div class="modal-body" >
                    <form name="myform" id="myform" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="fileUpload btn btn-info">
                                <span>Upload</span>
                                <input type="file" class="upload" ng-file-select="onFileSelectInModel($files)" name="myfile"/>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div style="width: 17.1%;float: left;margin-right:2%;" ng-repeat="x in thumb">
                            <div class="gal-detail thumb col-sm-12">
                                <div style="text-align: center" class="row">
                                    <div style="min-height: 169px;max-height: 169px;min-width: 221px;max-width: 221px;vertical-align: central">
                                        <a href="<?php echo base_url() . 'template/BasicTemplate/' . $userid . '/img/' ?>{{x}}"  class="image-popup" title="{{x}}">
                                            <img src="<?php echo base_url() . 'template/BasicTemplate/' . $userid . '/thumbnil/' ?>{{x}}" alt="{{x}}" style="max-height: 100%;min-height: 100%"/>
                                        </a>
                                        <br>
                                        <h5 title="{{x}}">
                                            <!--    {{x|limitTo:25}}{{x.length > 25 ? '...': '' }} -->
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-offset-9 col-sm-3">
                                        <button name="btn" class="btn btn-default" ng-click="deleteimage(x,<?php echo $userid ?>)"><span class="fa fa-trash"></span></button>&nbsp;
<!--                                        <button name="btn" class="btn btn-default" ng-click="editImgName(x)"><span class="fa fa-pencil"></span></button>-->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="alert-info" ng-if="thumb.length == 0">
                        No File in directory
                    </div>
                </div>
            </div>

        </div>



    </div>



    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body" style="max-height:500px;overflow:scroll">

                    <div class="col-sm-12" id="tmp-content">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>




    <script type="text/javascript">
                var app = angular.module('myapp1', ['angularUtils.directives.dirPagination', 'angularFileUpload']);
        app.controller('myctr', function($scope, $http, $upload) {
            var old = "";
            $scope.res = <?php echo $result; ?>;
            $scope.currentPage = 1;
            $scope.pageSize = 8;
            $scope.chageName = function(uid)
            {
                var s = 0;
                for (var i = 0; i < $scope.thumb.length; i++)
                {
                    if ($scope.thumb[i] == $scope.imgname)
                    {
                        s++;
                    }
                }

                if (s == 0)
                {
                    var old1 = 'template/BasicTemplate/' + uid + '/thumbnil/' + old;
                    var old2 = 'template/BasicTemplate/' + uid + '/img/' + old;
                    var new1 = 'template/BasicTemplate/' + uid + '/thumbnil/' + $scope.imgname;
                    var new2 = 'template/BasicTemplate/' + uid + '/img/' + $scope.imgname;
                    var dt = {'thumbold': old1, 'thumbnew': new1, 'imgold': old2, 'imgnew': new2};
                    $http({
                        url: "<?php echo base_url() . 'index.php/user/manageFile/edit' ?>",
                        method: "post",
                        data: dt
                    }).success(function(res)
                    {
                        $scope.thumb = res;
                        $scope.close();
                    });
                }
                else
                {
                    swal("Name Alrady Exists");
                }
            }
            $scope.close = function()
            {
                $("#editFile").modal("hide");
            };
            $scope.editImgName = function(name)
            {
                $scope.imgname = name;
                old = name;
                $("#editFile").modal();
            };
            $scope.openFilemanager = function()
            {
                $http.post("<?php echo base_url() . 'index.php/user/thubimage' ?>")
                        .success(function(dir_data)
                        {
                            $scope.thumb = dir_data;
                            $("#filemanager").modal({backdrop: false});
                        });
            };
            $scope.onFileSelectInModel = function($files) {

                $("#back").css("display", "block");
                $("#front").css("display", "block");
                $upload.upload({
                    url: '<?php echo base_url() . 'index.php/user/UploadImage' ?>',
                    file: $files
                }).success(function(response) {
                    if (response == "fail")
                    {
                        swal("File Formate is not Supported");
                        $("#back").css("display", "none");
                        $("#front").css("display", "none");
                    }
                    else
                    {
                        $http.post("<?php echo base_url() . 'index.php/user/thubimage' ?>")
                                .success(function(str)
                                {
                                    //alert(str);
                                    $scope.thumb = str;
                                    $("#back").css("display", "none");
                                    $("#front").css("display", "none");
                                });
                        swal("File Successfuly uploaded...");
                    }
                });
            };
            $scope.deleteimage = function(filename, uid)
            {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function() {
                    var src = 'template/BasicTemplate/' + uid + '/thumbnil/' + filename;
                    var src1 = 'template/BasicTemplate/' + uid + '/img/' + filename;
                    var dt = {'thumb': src, 'img': src1};
                    $http({
                        url: "<?php echo base_url() . 'index.php/user/manageFile/del' ?>",
                        method: "post",
                        data: dt
                    }).success(function(res)
                    {
                        $scope.thumb = res;
                        swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    });
                });
            };
        });</script>
    <script type="text/javascript">
        $('document').ready(function() {
            $(".abc").on("click", ".info", function() {
                var cid = $(this).attr("id");
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url() . 'index.php/user/campaign/getContent/'; ?>" + cid,
                    success: function(str)
                    {
                        $(".modal-title").html("Campaign Content");
                        $("#tmp-content").html(str);
                        $(".apply").removeClass("apply");
                        $("#myModal").modal("show");
                    }
                });
                return false;
            });
            $(".abc").on("click", ".subscriber", function() {
                var cid = $(this).attr("id");
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url() . 'index.php/user/campaign/getSubscriber/'; ?>" + cid,
                    success: function(str)
                    {
                        $(".modal-title").html("Campaign's Subscriber");
                        $("#tmp-content").html(str);
                        $("#myModal").modal("show");
                    }
                });
                return false;
            });
        });
    </script>