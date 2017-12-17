<div class="container" ng-cloak="" ng-app="myapp1"  ng-controller="myctr">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                Manage User Information
            </h3>
        </div>
    </div>

    <!-- View Form -->
    <div class="row">
        <div ng-if='res.length == 0' class='alert alert-info'>
            No User availble
        </div>
        <div id="view"  ng-if='res.length != 0'>            
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
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>
                                        <a href="#" ng-click="sortType = 'username';
                                        sortReverse = !sortReverse">
                                            Username 
                                            <span ng-show="sortType == 'username' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'username' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'fname';
                                        sortReverse = !sortReverse">
                                            Full Name
                                            <span ng-show="sortType == 'fname' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'fname' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'email';
                                        sortReverse = !sortReverse">
                                            Email 
                                            <span ng-show="sortType == 'email' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'email' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
									<th>
                                        <a href="#" ng-click="sortType = 'cntSub';
                                        sortReverse = !sortReverse">
                                            No. of Subscriber
                                            <span ng-show="sortType == 'cntSub' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'cntSub' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
									<th>
                                        <a href="#" ng-click="sortType = 'cntEmail';
                                        sortReverse = !sortReverse">
                                            Total Sent Email 
                                            <span ng-show="sortType == 'cntEmail' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'cntEmail' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'IsActivated';
                                        sortReverse = !sortReverse">
                                            Block/Unblock
                                            <span ng-show="sortType == 'IsActivated' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'IsActivated' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>Actions</th>
                                </tr>
                                <tr dir-paginate="x in res|filter:var|orderBy:sortType:sortReverse| itemsPerPage: pageSize" current-page= "currentPage">
                                    <td>{{x.username}}</td>
                                    <td ng-if="x.fname == null"> ----- </td>
                                    <td ng-if="x.fname != null">{{x.fname + " " + x.lname}}</td>                            
                                    <td>{{x.email}}</td>
                                    <td>{{x.cntSub}}</td>
                                    <td>{{x.cntEmail}}</td>
                                    <td ng-if="x.IsActivated == 1">Unblock</td>
                                    <td ng-if="x.IsActivated == 0">Block</td>                            
                                    <td>
                                        <a class='info' title="Information" id="{{x.id}}" href=''>
                                            <span class="fa fa-info"></span>
                                        </a>&nbsp;
                                        <a class='plan' title="Plan" href='<?php echo base_url() . 'index.php/admin/user/plan/'?>{{x.id}}/'>
                                            <span class="fa fa-calendar-check-o"></span>
                                        </a>&nbsp;
                                        <a class='campaign' title="Campaign" href='<?php echo base_url() . 'index.php/admin/user/campaign/'?>{{x.id}}/'>
                                            <span class="fa fa-envelope-o"></span>
                                        </a>&nbsp;
										<a class='group' title="Groups" href='<?php echo base_url() . 'index.php/admin/user/group/'?>{{x.id}}/'>
                                            <span class="ion-android-contacts"></span>
                                        </a>&nbsp;
										<a class='subscriber' title="Subscriber" href='<?php echo base_url() . 'index.php/admin/user/subscriber/'?>{{x.id}}/'>
                                            <span class="fa fa-user"></span>
                                        </a>&nbsp;
                                        <a ng-if="x.IsActivated == 1" title="Block This User" href="#" ng-click="userBlock(x.id, x.IsActivated)">
                                            <span class="fa fa-lock"></span>
                                        </a>
                                        <a ng-if="x.IsActivated == 0" title="Unblock This User"  href="#" ng-click="userBlock(x.id, x.IsActivated)">
                                             <!--href="<?php echo base_url() . 'index.php/admin/user/block/'; ?>{{x.id+"/"+x.IsActivated}}"-->
                                            <span class="fa fa-unlock"></span>
                                        </a>&nbsp;
                                    </td>
                                </tr>
                            </table>

                            <!-- Information Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">User Information</h4>
                                  </div>
                                  <div class="modal-body">
                                    <table class='table table-bordered table-hover table-striped'>
                                        <tr>
                                            <td>Username</td>
                                            <td>
                                                <label id="username">
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>First Name</td>
                                            <td>
                                                <label id="fname">
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Last Name</td>
                                            <td>
                                                <label id="lname">
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <label id="email">
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Block Status</td>
                                            <td>
                                                <label id="block">
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Workforce</td>
                                            <td>
                                                <label id="workforce">
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Name of an Organization</td>
                                            <td>
                                                <label id="orgName">
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Age of an Organization</td>
                                            <td>
                                                <label id="orgAge">
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Website</td>
                                            <td>
                                                <label id="website">
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>
                                                <label id="add">
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Type of an Organization</td>
                                            <td>
                                                <label id="orgType">
                                                </label>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td>City</td>
                                            <td>
                                                <label id="city">
                                                </label>
                                            </td>
                                        </tr>                                  -->
                                    </table>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>
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
</div>
<script type="text/javascript">
    var app = angular.module('myapp1', ['angularUtils.directives.dirPagination']);
    app.controller('myctr', function($scope, $http) {
        $scope.IsActivated = 0;
        $scope.res = <?php echo $result; ?>;
        $scope.currentPage = 1;
        $scope.pageSize = 5;

        $scope.userBlock = function(id, block)
        {
            if(block == 1)
            {
                swal(
                {
                    title: "Are you sure?",
                    text: "You are going to Block this user",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Block it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function (isConfirm) 
                {
                    if (isConfirm) 
                    {
                        $http.get("<?php echo base_url(); ?>index.php/admin/user/block/" + id + "/" + block).success(function(str) 
                        {
                            $scope.res = str;
                        });
                    }
                });
            }
            if(block == 0)
            {
                swal(
                {
                    title: "Are you sure?",
                    text: "You are going to Unblock this user",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Unblock it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                },
                function (isConfirm) 
                {
                    if (isConfirm) 
                    {
                        $http.get("<?php echo base_url(); ?>index.php/admin/user/block/" + id + "/" + block).success(function(str) 
                        {
                            $scope.res = str;
                        });
                    }
                });
            }
        }
    });
</script>
<script type="text/javascript">
    $('document').ready(function(){
        $(".table").on("click",".info",function(){
            $.ajax({
                url : "<?php echo base_url(); ?>index.php/admin/user/getSingleUser/"+$(this).attr("id"),
                success : function(str)
                {
                    str = str.split('null').join('"---------"');
                    var data = JSON.parse(str);
                    $("#username").html(data.username);
                    $("#fname").html(data.fname);
                    $("#lname").html(data.lname);
                    $("#email").html(data.email);
                    if(data.IsActivated == 0)
                    {
                        $("#block").html("Block");
                    }
                    else
                    {
                        $("#block").html("Unblock");
                    }
                    $("#workforce").html(data.workforce);
                    $("#orgName").html(data.name_organization);
                    $("#orgAge").html(data.age_Organization);
                    $("#website").html(data.website);
                    $("#add").html(data.address);
                    $("#orgType").html(data.type_organization);
                    $("#myModal").modal("show");
                }
            });
            return false;
        });
    });
</script>