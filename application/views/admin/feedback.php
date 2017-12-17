<div class="container" ng-cloak="" ng-app="myapp1"  ng-controller="myctr">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                User's Feedback
            </h3>
        </div>
    </div>

    <!-- View Form -->
    <div class="row">
        <div ng-if='res.length == 0' class='alert alert-info'>
            No Feedback availble
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
                                        <a href="#" ng-click="sortType = 'username';
                                        sortReverse = !sortReverse">
                                            Date &amp; Time 
                                            <span ng-show="sortType == 'feedbackDate' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'feedbackDate' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'IsActivated';
                                        sortReverse = !sortReverse">
                                            Content
                                            <span ng-show="sortType == 'content' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'content' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th></th>
                                </tr>
                                <tr dir-paginate="x in res|filter:var|orderBy:sortType:sortReverse| itemsPerPage: pageSize" current-page= "currentPage">
                                    <td>{{x.fname + " " + x.lname}}</td>                            
                                    <td>{{x.email}}</td>
                                    <td>{{x.feedbackDate}}</td>
                                    <td>{{x.content}}</td>
                                    <td>
                                        <a class='info' title="Information" id="{{x.id}}" href=''>
                                            <span class="fa fa-info"></span>
                                        </a>
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
                                    <h4 class="modal-title">User Feedback</h4>
                                  </div>
                                  <div class="modal-body">
                                    <table class='table table-bordered table-hover table-striped'>
                                        <tr>
                                            <td>Name</td>
                                            <td>
                                                <label id="fname">
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
                                            <td>Date &amp; Time</td>
                                            <td>
                                                <label id="date">
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Content</td>
                                            <td>
                                                <label id="content">
                                                </label>
                                            </td>
                                        </tr>
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
    });
</script>
<script type="text/javascript">
    $('document').ready(function(){
        $(".table").on("click",".info",function(){
            var row = $(this).parent().parent().children();
            //alert(row);
            $("#fname").html(row.first().html());
            $("#email").html(row.first().next().html());
            $("#date").html(row.first().next().next().html());
            $("#content").html(row.first().next().next().next().html());
            $("#myModal").modal("show");
            return false;
        });
    });
</script>