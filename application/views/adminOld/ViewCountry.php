<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Country
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-anchor"></i><a href="#" onclick="showview()"> View</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-dashboard"></i><a href="#" onclick="showadd()"> Add</a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div  id="viewform" ng-app="myapp1" ng-controller="myctr" class="table table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <td colspan="3">
                        <input type="text" class="form-control" style="width:35%;float:left;" placeholder="Search" value="India" ng-model="search">
                        <input type="number" min="1"  max="25" class="form-control" style="width:8%; float:right" placeholder="Search" ng-model="pageSize"/>
                    </td>
                </tr>
                <tr>
                    <td style="width:85%">
                        <a href="#" ng-click="sortType = 'name'; sortReverse = !sortReverse">
                        Name
                        <span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-up"></span>
                    </td>
                    <td colspan="2" style="width:14%;">Operation</td>
                </tr>
                <tr dir-paginate="row in record|filter:search|orderBy:sortType:sortReverse| itemsPerPage: pageSize" current-page= "currentPage" id="{{row.id}}}">
                    <td>{{row.name}}</td>
                    <td colspan="2"><a href="" onclick="showedit()" class="edit"><span class="glyphicon glyphicon-pencil"></span></a>
                    &nbsp;<a class="delete" href="<?php echo base_url() . 'index.php/admin/country/Delete/'; ?>{{row.id}}"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
            </table>
            <div style="float:right">
                <dir-pagination-controls boundary-links="true"  template-url="<?php echo base_url(); ?>template/paging/dirPagination.tpl.html"></dir-pagination-controls>
            </div>
            
        </div>

        <!-- Add Form -->

        <div id="addform" style="visibility: hidden; display: none">
            <form class="form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>index.php/admin/country/Insert/">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name"> Country Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" id="name" required="" placeholder="Enter Name of Country">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <button type="submit" class="btn btn-primary" style="width: 20%">Insert</button>
                    </div>
                </div>
            </form>
        </div>
        
        <div id="editform" style="visibility: hidden; display: none">
            <form class="form-horizontal updateForm" role="form" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name"> Country Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="Up_name" id="Up_name" required="" placeholder="Enter Name of Country">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <button type="submit" class="btn btn-primary" style="width: 20%">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function showadd()
        {
            document.getElementById('viewform').style.visibility = "hidden";
            document.getElementById('viewform').style.display = "none";
            document.getElementById('addform').style.visibility = "visible";
            document.getElementById('addform').style.display = "block";
            document.getElementById('editform').style.visibility = "hidden";
            document.getElementById('editform').style.display = "none";
        }

        function showview()
        {
            document.getElementById('viewform').style.visibility = "visible";
            document.getElementById('viewform').style.display = "block";
            document.getElementById('addform').style.visibility = "hidden";
            document.getElementById('addform').style.display = "none";
            document.getElementById('editform').style.visibility = "hidden";
            document.getElementById('editform').style.display = "none";
        }
        
        function showedit()
        {
            document.getElementById('viewform').style.visibility = "hidden";
            document.getElementById('viewform').style.display = "none";
            document.getElementById('addform').style.visibility = "hidden";
            document.getElementById('addform').style.display = "none";
            document.getElementById('editform').style.visibility = "visible";
            document.getElementById('editform').style.display = "block";
        }

        var app = angular.module('myapp1', ['angularUtils.directives.dirPagination']);
        app.controller('myctr', function ($scope) {
        $scope.record = <?php echo $records; ?>;
        $scope.currentPage = 1;
        $scope.pageSize = 5;
    });

    </script>

    <script src="<?php echo base_url(); ?>template/admin/js/jquery-1.11.0.js"></script>
    <script type="text/javascript">
         $('document').ready(function(){
             $("#viewform").on("click",".edit",function(){
                 $(".updateForm").attr("action","<?php echo base_url()."index.php/admin/country/update/"; ?>" + $(this).closest("tr").attr("id"));
                 $("#Up_name").val($(this).closest("tr").children().first().html());
             });
         });
    </script>