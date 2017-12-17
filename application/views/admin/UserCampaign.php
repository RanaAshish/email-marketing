<div class="container" ng-cloak="" ng-app="myapp1"  ng-controller="myctr">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                User's Campaign - <?php echo $uname; ?>
            </h3>
        </div>
    </div>

    <div class="row">
        <div class='alert alert-info' ng-if='res.length==0'>
            No Campaign Found
        </div>
        <div id="view" ng-if='res.length!=0'>            
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
                                        <a href='' id={{x.id}} class='subscriber' title="Subsciber of Campaign"><span class="fa fa-user-md"></span></a>
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
    var app = angular.module('myapp1', ['angularUtils.directives.dirPagination']);
    app.controller('myctr', function($scope, $http) {
        $scope.res = <?php echo $result; ?>;
        $scope.currentPage = 1;
        $scope.pageSize = 8;
    });
</script>
<script type="text/javascript">
    $('document').ready(function(){
        $(".table").on("click",".info",function(){
            var cid = $(this).attr("id");
            $.ajax({
                type: "post",
                url : "<?php echo base_url().'index.php/admin/campaign/getContent/'; ?>"+cid,
                success : function(str)
                {
                    $(".modal-title").html("Campaign Content");
                    $("#tmp-content").html(str);
                    $(".apply").removeClass("apply");
                    $("#myModal").modal("show");
                }
            });
            return false;
        });

        $(".table").on("click",".subscriber",function(){
            var cid = $(this).attr("id");
            $.ajax({
                type: "post",
                url : "<?php echo base_url().'index.php/admin/campaign/getSubscriber/'; ?>"+cid,
                success : function(str)
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