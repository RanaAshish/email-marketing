<div class="container" ng-cloak="" ng-app="myapp1"  ng-controller="myctr">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                Manage Plan Information
            </h3>
        </div>
    </div>
    <div class="row">
        <!-- Tabs  -->
        <div class="col-sm-12">
            <ul style="width: 100%;" class="nav nav-tabs tabs">
                <li style="width: 50%;" class="active tab">
                    <a class="active" href="#view" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs">
                            <i class="fa fa-home"></i>
                        </span> 
                        <span class="hidden-xs">View Plan</span>
                    </a>
                </li>
                <li style="width: 50%;" class="tab">
                    <a href="#add" data-toggle="tab" aria-expanded="false">
                        <span class="visible-xs">
                            <i class="fa fa-user"></i>
                        </span> 
                        <span class="hidden-xs">Add Plan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Add Form  -->
    <div class="row">
        <div id="add">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            To add Plan fill following information
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div id="addform">
                                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/managePlan/create'; ?>">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Plan Name:</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="txtname" class="form-control" placeholder="Name of Plan" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">No of Subscriber:</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="txtsub" class="form-control" placeholder="No of Subscriber" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">No of Email:</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="txtemail" class="form-control" placeholder="No of Email" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Duration:</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="txtduration" class="form-control" required="" placeholder="Duration">
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="dur" required="">
                                                <option value="day" selected>Days</option>
                                                <option value="year">Years</option>
                                                <option value="month">Month</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Price:</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="txtprice" class="form-control" placeholder="Price" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Description:</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" name="txtdesc"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Form -->
    <div class="row">
        <div id="view">            
            <div  id="viewform" class="col-sm-12">
                <div class="row"></div>
                <div class="panel panel-default">
                    <div class="panel-heading" style="height: 50px">
                        <div class="panel-title">
                            <input type="text" class="form-control" style="width:25%;float:left;" placeholder="Search" value="India" ng-model="var">
                            <input type="number" min="1"  max="25" class="form-control" style="width:8%; float:right" placeholder="Search" ng-model="pageSize"/>
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
                                        <a href="#" ng-click="sortType = 'maximum_subscriber';
                                                    sortReverse = !sortReverse">
                                            No of Subscriber 
                                            <span ng-show="sortType == 'maximum_subscriber' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'maximum_subscriber' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="#" ng-click="sortType = 'maximum_mail';
                                                    sortReverse = !sortReverse">
                                            No of Email 
                                            <span ng-show="sortType == 'maximum_mail' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'maximum_mail' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
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
                                        <a href="#" ng-click="sortType = 'price';
                                            sortReverse = !sortReverse">
                                            Price 
                                            <span ng-show="sortType == 'price' && !sortReverse" class="fa fa-caret-down"></span>
                                            <span ng-show="sortType == 'price' && sortReverse" class="fa fa-caret-up"></span>
                                        </a>
                                    </th>
                                    <th style="display:none;visibility:hidden"></th>
                                    <th>Action</th>
                                </tr>
                                <tr dir-paginate="x in res|filter:var|orderBy:sortType:sortReverse| itemsPerPage: pageSize" current-page= "currentPage">
                                    <td>{{x.name}}</td>
                                    <td>{{x.maximum_subscriber}}</td>
                                    <td>{{x.maximum_mail}}</td>
                                    <td>{{x.duration}}</td>
                                    <td>{{x.price}}</td>
                                    <td style="display:none;visibility:hidden">{{x.description}}</td>
                                    <td><a class="info" id="{{x.id}}" href="#" data-toggle="modal"><span class="md md-info"></span></a>
                                        &nbsp;<a class="update" id="{{x.id}}" href="#" data-toggle="modal"><span class="md md-edit"></span></a>
                                        &nbsp;<a class="delete" href="<?php echo base_url() . 'index.php/admin/managePlan/delete/'; ?>{{x.id}}"><span class="md md-delete"></span></a>
                                    </td>
 <!-- href="<?php // echo base_url() . 'index.php/admin/managePlan/edit/'; ?>{{x.id}}" -->
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
                         <!-- Model for update -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                            </button>
                            <h4 class="modal-title" id="myLargeModalLabel">Update Plan Information
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <form class="form-horizontal" id="updateForm" method="post" action="">
                                   <div class="form-group">
                                        <label class="control-label col-sm-3">Plan Name:</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" class="form-control" placeholder="Name of Plan" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">No of Subscriber:</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="sub" class="form-control" placeholder="No of Subscriber" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">No of Email:</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="email" class="form-control" placeholder="No of Email" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Duration:</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="duration" class="form-control" required="" placeholder="Duration">
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="dura" required="">
                                                <option value="day" selected>Days</option>
                                                <option value="month">Month</option>
                                                <option value="year">Years</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Price:</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="price" class="form-control" placeholder="Price" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Description:</label>
                                        <div class="col-sm-8">
                                            <textarea name="des" class="form-control" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for information -->
            <div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-hidden="true" style="display: none">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                            </button>
                            <h4 class="modal-title" id="myLargeModalLabel">Plan Information
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <table class="table table-bordered table-stripped">
                                   <tr>
                                        <td>Plan Name</td>
                                        <td name="lblname">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No of Subscriber</td>
                                        <td name="lblsub">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No of Email</td>
                                        <td name="lblemail">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Duration</td>
                                        <td name="lblduration">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td name="lblprice">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td name="lbldes">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button class="btn btn-primary" style="float:right" data-dismiss="modal">Close</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var app = angular.module('myapp1', ['angularUtils.directives.dirPagination']);
    app.controller('myctr', function($scope) {
        $scope.res = <?php echo $result; ?>;
        $scope.currentPage = 1;
        $scope.pageSize = 5;
    });
</script>
<script type="text/javascript">
    $(function(){
        $(".table").on("click",".update",function(){
            $("[name='dura']").find($("option")).prop("selected",false);
            var id = $(this).attr("id");
            $("#updateForm").attr("action","<?php echo base_url() . "index.php/admin/managePlan/update/"; ?>" + id);
            $("[name='name']").val($(this).parents('tr').children().first().html());
            $("[name='sub']").val($(this).parents('tr').children().first().next().html());
            $("[name='email']").val($(this).parents('tr').children().first().next().next().html());
            var d = $(this).parents('tr').children().first().next().next().next().html().split(" ");
            $("[name='duration']").val(d[0]);
            $("[name='price']").val($(this).parents('tr').children().first().next().next().next().next().html());
            $("[name='des']").html($(this).parents('tr').children().first().next().next().next().next().next().html());
            $("[name='dura']").find($("option[value="+d[1]+"]")).prop("selected",true);
            $(".bs-example-modal-lg").modal("show");
        });

        $(".table").on("click",".info",function(){
            $("[name='lblname']").html($(this).parents('tr').children().first().html());
            $("[name='lblsub']").html($(this).parents('tr').children().first().next().html());
            $("[name='lblemail']").html($(this).parents('tr').children().first().next().next().html());
            $("[name='lblduration']").html($(this).parents('tr').children().first().next().next().next().html());
            $("[name='lblprice']").html($(this).parents('tr').children().first().next().next().next().next().html());
            $("[name='lbldes']").html($(this).parents('tr').children().first().next().next().next().next().next().html());
            $(".bs-example-modal-lg1").modal("show"); 
        });
    });
</script>