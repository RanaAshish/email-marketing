<div id="page-wrapper"   ng-app="myapp1"  ng-controller="myctr" >
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Manage plan Information
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-edit"></i><a href="#" onclick="showadd()"> Add</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-info-circle"></i><a href="#" onclick="showview()" > View</a>
                    </li>
                </ol>
                <div id="addform">
                    <?php
                    if (isset($res_edit)) {
                        $a = explode(" ", $res_edit->duration);
                        ?>
                        <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/admin/managePlan/update/' . $res_edit->id; ?>">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Plan Name:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="txtname" class="form-control" placeholder="Name of Plan" required="" value="<?php echo $res_edit->name ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">No of Subscriber:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="txtsub" class="form-control" placeholder="No of Subscriber" required="" value="<?php echo $res_edit->maximum_subscriber ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">No of Email:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="txtemail" class="form-control" placeholder="No of Email" required="" value="<?php echo $res_edit->maximum_mail ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Duration:</label>
                                <div class="col-sm-3">
                                    <input type="text" name="txtduration" class="form-control" required="" placeholder="Duration" value="<?php echo $a[0]; ?>">
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="dur" required="">
                                        <option value="day" <?php
                                        if ($a[1] == "day") {
                                            echo "selected";
                                        }
                                        ?>>Days</option>
                                        <option value="year" <?php
                                        if ($a[1] == "year") {
                                            echo "selected";
                                        }
                                        ?>>Years</option>
                                        <option value="month" <?php
                                        if ($a[1] == "month") {
                                            echo "selected";
                                        }
                                        ?>>Month</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
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
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div  id="viewform" >
            <div class="table table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                    <td colspan="5">
                        <input type="text" class="form-control" style="width:25%;float:left;" placeholder="Search" value="India" ng-model="var">
                        <input type="number" min="1"  max="25" class="form-control" style="width:8%; float:right" placeholder="Search" ng-model="pageSize"/>
                    </td>
                    </tr>
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
                        <th></th>
                    </tr>
                    <tr dir-paginate="x in res|filter:var|orderBy:sortType:sortReverse| itemsPerPage: pageSize" current-page= "currentPage">
                        <td>{{x.name}}</td>
                        <td>{{x.maximum_subscriber}}</td>
                        <td>{{x.maximum_mail}}</td>
                        <td>{{x.duration}}</td>
                        <td><a href="<?php echo base_url() . 'index.php/admin/managePlan/edit/'; ?>{{x.id}}"><span class="glyphicon glyphicon-pencil"></span></a>
                            &nbsp;<a class="delete" href="<?php echo base_url() . 'index.php/admin/managePlan/delete/'; ?>{{x.id}}"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                </table>
                <div style="float:right">
                <dir-pagination-controls boundary-links="true"  template-url="<?php echo base_url(); ?>/template/paging/dirPagination.tpl.html"></dir-pagination-controls>
                </div>
            </div>
        </div>
    </div>
</div>  
<script type="text/javascript">
<?php
if (isset($res_edit)) {
    ?>
        showadd();
    <?php
} else {
    ?>
        showview();
<?php } ?>
    function showadd()
    {
        document.getElementById('viewform').style.visibility = "hidden";
        document.getElementById('viewform').style.display = "none";
        document.getElementById('addform').style.visibility = "visible";
        document.getElementById('addform').style.display = "block";
    }

    function showview()
    {
        document.getElementById('viewform').style.visibility = "visible";
        document.getElementById('viewform').style.display = "block";
        document.getElementById('addform').style.visibility = "hidden";
        document.getElementById('addform').style.display = "none";
    }

    var app = angular.module('myapp1', ['angularUtils.directives.dirPagination']);
    app.controller('myctr', function ($scope) {
        $scope.res = <?php echo $result; ?>;
        $scope.currentPage = 1;
        $scope.pageSize = 5;
    });
   

</script>

