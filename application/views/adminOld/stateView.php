<div id="page-wrapper" ng-app="myapp1" ng-controller="myctr">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    State 
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-anchor"></i><a href="#" onclick="showview()" > View</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-dashboard"></i><a href="#" onclick="showadd()"> Add</a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div  id="viewform" class="table table-responsive" >
            <table class="table table-bordered table-striped" >
                <tr>
                    <td colspan="5">
                        <input ng-model="test" class="form-control" style="width: 20%;float: left;" placeholder="search"/>
                        <div class="col-sm-offset-11">
                                <input type="number" min="1"  max="25" class="form-control" style="width: 80%;" placeholder="pageSize" ng-model="pageSize"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#" ng-click="sortType = 'name'; sortReverse = !sortReverse">
                        State
                         <span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-up"></span>
                    </td>
                    <td>
                        <a href="#" ng-click="sortType = 'cname'; sortReverse = !sortReverse">
                        Country
                         <span ng-show="sortType == 'cname' && !sortReverse" class="fa fa-caret-down"></span>
                        <span ng-show="sortType == 'cname' && sortReverse" class="fa fa-caret-up"></span>
                    </td>
                    
                    <td style="width: 15%"><center>Operation</center></td>
                </tr>
                <tr dir-paginate="row in res|filter:test|orderBy:sortType:sortReverse|itemsPerPage: pageSize" current-page= "currentPage" id="{{row.id}}">
                    <td>{{row.name}}</td>
                    <td>{{row.cname}}</td>
                    <td>
                        <a href="" class="edit"  onclick="showedit()"><i class="glyphicon glyphicon-pencil"></i></a>
                        &nbsp;&nbsp;
                        <a href="<?php echo base_url()?>index.php/admin/state/delete/{{row.id}}"  class="delete"><i class="glyphicon glyphicon-trash delete"></i></a></td>
                </tr>
            </table>
            <div style="float: right">
                <dir-pagination-controls boundary-links="true"  template-url="<?php echo base_url(); ?>template/paging/dirPagination.tpl.html"></dir-pagination-controls>
            </div>
        </div>

        <!-- /.row -->
        
         <!-- Add Form-->
                <div id="addform" style="display:none;visibility:hidden">
                        <form  method="post" class="form-horizontal" action="<?php
                                    echo base_url().'index.php/admin/state/insert/';
                                ?>">
                        <div class="form-group">
                                <label class="control-label col-sm-2">Country : </label>
                                <div class="col-sm-8">
                                    <select name="con"  class="form-control" ng-init="coun=<?php echo htmlspecialchars($countries)?>">
                                    <option value='' >Select</option>
                                    <option ng-repeat="x in coun" value="{{x.id}}">{{x.name}}</option>
                                </select>
                                </div>
                        </div>
                        <div class="form-group">
                                <lable class="control-label col-sm-2">State:</lable>
                            <div class="col-sm-8">
                                <input type="text" name="state"  id='state' class="form-control" required="true"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="submit" class="btn btn-success" style="width: 20%" >Save</button>
                            </div>
                        </div>
                                
                    </form>
                </div>
            </div>
            <!-- End Of Add Form-->
            
            <!--Start Edit form-->
                <div id="editform" style="display:none;visibility:hidden">
                        <form id='f1' method="post" class="form-horizontal" action="<?php
                                    echo base_url().'index.php/admin/state/update/';
                                ?>">
                        <div class="form-group">
                                <label class="control-label col-sm-2">Country : </label>
                                <div class="col-sm-8">
                                <select name="ucon"  class="form-control " ng-init="coun=<?php echo htmlspecialchars($countries)?>">
                                    <option value='' >Select</option>
                                    <option ng-repeat="x in coun" value="{{x.id}}" abc="{{x.name}}">{{x.name}}</option>
                                </select>
                                </div>
                        </div>
                        <div class="form-group">
                                <lable class="control-label col-sm-2">State:</lable>
                            <div class="col-sm-8">
                                <input type="text" name="ustate"  id='ustate' class="form-control" required="true"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="submit" class="btn btn-success" style="width: 20%" >Save</button>
                            </div>
                        </div>
                                
                    </form>
                </div>
            </div>    
            <!--End of Edit Form-->
            

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
        $scope.res = <?php echo $records; ?>;
        $scope.currentPage = 1;
        $scope.pageSize = 5;
    });
    </script>
    <script  src="<?php echo base_url(); ?>template/admin/js/jquery-1.11.0.js"></script>
    <script type="text/javascript">
        $('document').ready(function()
        {
            $("#viewform").on("click",".edit",function()
            {
                var sid=$(this).parent().parent().attr("id");
                var action="<?php echo base_url();?>index.php/admin/state/update/"+sid;
                var cid=$(this).parent().siblings("td").first().next().html();
                $("#ustate").val($(this).parent().siblings("td").first().html());
                $("option[abc="+cid+"]").attr("selected",true);
                $("#f1").attr("action",action);
            });
        });
    </script>