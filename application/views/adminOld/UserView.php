<div id="page-wrapper" ng-app="myapp1"  ng-controller="myctr" >
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Manage User Information
                </h1>
            </div>
        </div>
        <div  id="viewform" >
            <div class="table table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td colspan="5">
                            <input type="text" class="form-control" style="width: 20%;float: left;" placeholder="Search" ng-model="var"/>
                            <div class="col-sm-offset-11">
                                <input type="number" min="1"  max="25" class="form-control" placeholder="Search" ng-model="pageSize"/>
                            </div>
                        </td>
                    </tr>
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
                            <a href="#" ng-click="sortType = 'IsActivated';
                                        sortReverse = !sortReverse">
                                Block/Unblock
                                <span ng-show="sortType == 'IsActivated' && !sortReverse" class="fa fa-caret-down"></span>
                                <span ng-show="sortType == 'IsActivated' && sortReverse" class="fa fa-caret-up"></span>
                            </a>
                        </th>
                        <th></th>
                    </tr>
                    <tr dir-paginate="x in res|filter:var|orderBy:sortType:sortReverse| itemsPerPage: pageSize" current-page= "currentPage">
                        <td>{{x.username}}</td>
                        <td ng-if="x.fname == null"> ----- </td>
                        <td ng-if="x.fname != null">{{x.fname + " " + x.lname}}</td>                            
                        <td>{{x.email}}</td>
                        <td ng-if="x.IsActivated == 0">Unblock</td>
                        <td ng-if="x.IsActivated == 1">Block</td>                            
                        <td>
                            <a href="<?php echo base_url() . 'index.php/admin_1/user/view/'; ?>{{x.id}}">
                                <span class="fa fa-info"></span>
                            </a>&nbsp;
                            <a ng-if="x.IsActivated == 0" href="#" ng-click="userBlock(x.id, x.IsActivated)">
                                <span class="fa fa-lock"></span>
                            </a>
                            <a ng-if="x.IsActivated == 1" href="#" ng-click="userBlock(x.id, x.IsActivated)">
                                 <!--href="<?php echo base_url() . 'index.php/admin_1/user/block/'; ?>{{x.id+"/"+x.IsActivated}}"-->
                                <span class="fa fa-unlock"></span>
                            </a>
                        </td>
                    </tr>
                </table>
                <dir-pagination-controls boundary-links="true"  template-url="<?php echo base_url(); ?>/template/paging/dirPagination.tpl.html"></dir-pagination-controls>
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
            var abc = confirm("Are you sure");
            if(abc == true)
            {
                $http.get("<?php echo base_url(); ?>index.php/admin_1/user/block/" + id + "/" + block).success(function(str) {
                $scope.res = str;
                });
            }
            }
    });
</script>