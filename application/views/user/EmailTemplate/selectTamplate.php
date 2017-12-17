<div class="container">
    <ul style="width: 100%;" class="nav nav-tabs tabs">
        <li style="width: 25%;" class="tab active">
            <a class="active" href="#view" data-toggle="tab" aria-expanded="true">
                <span class="visible-xs">
                    <i class="fa fa-home">
                    </i>
                </span> 
                <span class="hidden-xs">
                    Basic Templates
                </span>
            </a>
        </li>
        <li style="width: 25%;" class="tab ">
            <a class="" href="#add" data-toggle="tab" aria-expanded="false">
                <span class="visible-xs">
                    <i class="fa fa-user">
                    </i>
                </span> 
                <span class="hidden-xs">
                    Save Templates
                </span>
            </a>
        </li>
        <div style="right: 629px; left: 0px;" class="indicator">
        </div>
    </ul>   
    <div class="row" id="view" style="display: block;" class="tab-pane active" id="view">
        <div class="col-sm-4">
            <div class="gal-detail thumb" style="min-height: 275px;">
                <div class="col-sm-7">
                    <img height="250" width="200" src="<?php echo base_url(); ?>template/user/images/1_column.png" alt="1 Column Template"/>
                </div>
                <div class="col-sm-5">
                    <div style="min-height: 215px">
                        1 Column Tamplate. <p class="muted text-muted">Drag & Drop Template</p>
                    </div>
                    <div>
                        <a href="<?php echo base_url() . "index.php/user/manageTemplate/$type/1/" ?>" class="btn btn-info waves waves-light" style="float:right">
                            Select
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="gal-detail thumb" style="min-height: 275px;">
                <div class="col-sm-7">
                    <img height="250" width="200" src="<?php echo base_url(); ?>template/user/images/1-2 column.png" alt="1:2 Column Template"/>
                </div>
                <div class="col-sm-5">
                    <div style="min-height: 215px">
                        1:2 Column Tamplate. <p class="muted text-muted">Drag & Drop Template</p>
                    </div>
                    <div>
                        <a href="<?php echo base_url() . "index.php/user/manageTemplate/$type/12/" ?>" class="btn btn-info waves waves-light" style="float:right">
                            Select
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="gal-detail thumb" style="min-height: 275px;">
                <div class="col-sm-7">
                    <img height="250" width="200" src="<?php echo base_url(); ?>template/user/images/1-2-1 column.png" alt="1:2:1 Column Template"/>
                </div>
                <div class="col-sm-5">
                    <div style="min-height: 215px">
                        1:2:1 Column Tamplate. <p class="muted text-muted">Drag & Drop Template</p>
                    </div>
                    <div>
                        <a href="<?php echo base_url() . "index.php/user/manageTemplate/$type/121/" ?>" class="btn btn-info waves waves-light" style="float:right">
                            Select
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="gal-detail thumb" style="min-height: 275px;">
                <div class="col-sm-7">
                    <img height="250" width="200" src="<?php echo base_url(); ?>template/user/images/1-3 column.png" alt="1:3 Column Template"/>
                </div>
                <div class="col-sm-5">
                    <div style="min-height: 215px">
                        1:3 Column Tamplate. <p class="muted text-muted">Drag & Drop Template</p>
                    </div>
                    <div>
                        <a href="<?php echo base_url() . "index.php/user/manageTemplate/$type/13" ?>" class="btn btn-info waves waves-light" style="float:right">
                            Select
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="gal-detail thumb" style="min-height: 275px;">
                <div class="col-sm-7">
                    <img height="250" width="200" src="<?php echo base_url(); ?>template/user/images/1-3-1 column.png" alt="1:3:1 Column Template"/>
                </div>
                <div class="col-sm-5">
                    <div style="min-height: 215px">
                        1:3:1 Column Tamplate. <p class="muted text-muted">Drag & Drop Template</p>
                    </div>
                    <div>
                        <a href="<?php echo base_url() . "index.php/user/manageTemplate/$type/131" ?>" class="btn btn-info waves waves-light" style="float:right">
                            Select
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="gal-detail thumb" style="min-height: 275px;">
                <div class="col-sm-7">
                    <img height="250" width="200" src="<?php echo base_url(); ?>template/user/images/1-3-2 column.png" alt="1:3:2 Column Template"/>
                </div>
                <div class="col-sm-5">
                    <div style="min-height: 215px">
                        1:3:2 Column Tamplate. <p class="muted text-muted">Drag & Drop Template</p>
                    </div>
                    <div>
                        <a href="<?php echo base_url() . "index.php/user/manageTemplate/$type/132" ?>" class="btn btn-info waves waves-light" style="float:right">
                            Select
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="add" class="tab-pane">
        <div class="row" ng-app="myapp1" ng-controller="myctr" ng-cloak="">
            <div class="col-sm-12" style="margin-top: 2%">
                <div class='alert alert-info' ng-if='res.length == 0'>
                    No Save Template
                </div>
            </div>
            <div id="view" ng-if='res.length != 0'>            
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
                            <div class="table-responsive">
                                <div dir-paginate="x in res|filter:var |orderBy:sortType:sortReverse| itemsPerPage: pageSize" current-page= "currentPage">
                                    <div class="row col-sm-12" style="">
                                        <div class="" style="background: #e8e8e8;width:12%;max-height: 100%; max-width:100%;float: left">
                                            <div style="padding:5px">
                                                <div style="text-align: center" >
                                                    <img src="<?php echo base_url() . 'template/BasicTemplate/' . $userid . '/saveTemplate/'; ?>{{x.id}}.png?<?php echo rand(1000, 10000); ?>" alt="image" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="" style="max-height:100%;width:82%;float: left;margin-left:5%" style="">
                                            {{x.name}}<br>
                                            <b>Last Edited on</b> {{ x.creationTime | date:'MMM-dd,yyyy'}}
                                        </div>
                                        <div class="" style="width:6%;float: right" ng-if="clone == false">
                                            <a href="<?php echo base_url() . 'index.php/user/saveTemplate/sendSavedTemplate/'; ?>{{x.id}}" class="btn btn-default" style="float:right;max-height: 100%">Select</a>
                                        </div>
                                        <div class="" style="width:6%;float: right" ng-if="clone == true">
                                            <a href="<?php echo base_url() . 'index.php/user/saveTemplate/cloneSavedTemplate/'; ?>{{x.id}}" class="btn btn-default" style="float:right;max-height: 100%">Select</a>
                                        </div>
                                    </div>
                                    <div class="row col-sm-12">
                                        <hr>    
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
</div>
<script type="text/javascript">
    var app = angular.module('myapp1', ['angularUtils.directives.dirPagination', 'angularFileUpload']);
    app.controller('myctr', function($scope, $http, $upload) {
        var old = "";
        $scope.clone = <?php echo $clone; ?>;
        $scope.res = <?php echo $result; ?>;
        $scope.currentPage = 1;
        $scope.pageSize = 8;
    });</script>