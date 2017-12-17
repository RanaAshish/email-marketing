<div class="container" ng-cloak="" ng-app="myapp1"  ng-controller="myctr">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                User's Subscriber - <?php echo $uname; ?>
            </h3>
        </div>
    </div>

    <div class="row">
        <div id="view">            
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
                            <table class="table table-bordered table-striped" ng-if="res.length != 0">
                                <!-- <tr>
                                    <td colspan="5">
                                        <input type="text" class="form-control" style="width:25%;float:left;" placeholder="Search" value="India" ng-model="var">
                                        <input type="number" min="1"  max="25" class="form-control" style="width:8%; float:right" placeholder="Search" ng-model="pageSize"/>
                                    </td>
                                </tr> -->
                                <tr>
                                    <th>
                                        <a href="#" ng-click="sortType = 'fname';
                                                sortReverse = !sortReverse">
                                            First Name
                                            <span ng-show="sortType == 'fname' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'fname' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'lname';
                                                sortReverse = !sortReverse">
                                            Last Name
                                            <span ng-show="sortType == 'lname' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'lname' && sortReverse" class="fa fa-caret-up"></span>
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
                                        <a href="#" ng-click="sortType = 'totMail';
                                                sortReverse = !sortReverse">
                                            Total Sent Mail
                                            <span ng-show="sortType == 'totMail' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'totMail' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                <tr dir-paginate="x in res|filter:var|orderBy:sortType:sortReverse| itemsPerPage: pageSize" current-page= "currentPage">
                                    <td>{{x.fname}}</td>
                                    <td>{{x.lname}}</td>
                                    <td>{{x.email}}</td>
                                    <td>{{x.RegistrationTime}}</td>
                                    <td>{{x.totMail}}</td>
                                    <td>
                                        <a href='' id={{x.id}} class='group' title="Groups"><span class="ion-android-contacts"></span></a>
                                    </td>
                                </tr>
                            </table>
                            <div class="alert alert-info" ng-if="res.length == 0">
                                No available Subscriber
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

<!-- Subscriber Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    Subscriber Available in following group
                </h4>
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
    var app = angular.module('myapp1', ['angularUtils.directives.dirPagination']);
    app.controller('myctr', function ($scope) {
    $scope.res = <?php echo $result; ?>;
        $scope.currentPage = 1;
        $scope.pageSize = 10;
    });
</script>
<script type="text/javascript">
    $('document').ready(function(){
        $(".table").on("click",".group",function(){
            var gid = $(this).attr("id");
            $.ajax({
                type: "post",
                url : "<?php echo base_url().'index.php/admin/user/subscriber/"+gid+"/getGroups/'; ?>",
                success : function(str)
                {
                    $("#tmp-content").html(str);
                    $("#myModal").modal("show");
                }
            });
            return false;
        });
    });
</script>