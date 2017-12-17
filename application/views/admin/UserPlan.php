<div class="container" ng-cloak="" ng-app="myapp1"  ng-controller="myctr">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                User's Plan Information - <?php echo $uname; ?>
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
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>
                                        <a href="#" ng-click="sortType = 'name';
                                        sortReverse = !sortReverse">
                                            Plan Name
                                            <span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'duration';
                                        sortReverse = !sortReverse">
                                            Duration
                                            <span ng-show="sortType == 'duration' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'duration' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'maximum_subscriber';
                                        sortReverse = !sortReverse">
                                            Maximum Subscriber 
                                            <span ng-show="sortType == 'maximum_subscriber' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'maximum_subscriber' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'maximum_mail';
                                        sortReverse = !sortReverse">
                                            Maximum Mail
                                            <span ng-show="sortType == 'maximum_mail' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'maximum_mail' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'activation_date';
                                        sortReverse = !sortReverse">
                                            Activation Date
                                            <span ng-show="sortType == 'activation_date' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'activation_date' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'email_sent';
                                        sortReverse = !sortReverse">
                                            Sent Email
                                            <span ng-show="sortType == 'email_sent' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'email_sent' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                </tr>
                                <tr dir-paginate="x in res|filter:var|orderBy:sortType:sortReverse| itemsPerPage: pageSize" current-page= "currentPage">
                                    <td>{{x.name}}</td>
                                    <td>{{x.duration}}</td>
                                    <td>{{x.maximum_subscriber}}</td>
                                    <td>{{x.maximum_mail}}</td>
                                    <td>{{x.activation_date}}</td>
                                    <td>{{x.email_sent}}</td>
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