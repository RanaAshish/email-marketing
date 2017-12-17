<style type="text/css">
    .front{
        display:none;
        position: absolute;
        top: 36%;
        left: 40%;
        width: 30%;
        height: 25%;
        padding: 16px;

        background-color: transparent;
        -moz-border-radius-topright: 2em;
        -moz-border-radius-topleft: 2em;
        -moz-border-radius-bottomright: 2em;
        -moz-border-radius-bottomleft: 2em;
        z-index:3;
    }
    .back{
        display: none;
        position: absolute;
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        background-color: black;
        opacity:0.7;
        z-index:2;
    }
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
</style>
<div class="container" ng-cloak="" ng-app="myapp1"  ng-controller="myctr" ng-cloak="">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                Templates
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href="<?php echo base_url() . 'index.php/user/manageTemplate/saveTemplate'; ?>" class="btn btn-success">Create Template</a>
        </div>
    </div>
    <div class="row">
        <hr>
    </div>
    <div class="row">
        <div class='alert alert-info' ng-if='res.length == 0'>
            No Save Template
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
                                                <img src="<?php echo base_url() . 'template/BasicTemplate/' . $userid . '/saveTemplate/'; ?>{{x.id}}.png?<?php echo rand(1000,10000); ?>" alt="image" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="" style="max-height:100%;width:82%;float: left;margin-left:5%" style="">
                                        {{x.name}}<br>
                                        <b>Last Edited on</b> {{ x.creationTime | date:'MMM-dd,yyyy'}}
                                    </div>
                                    <div class="" style="width:6%;float: right">
                                        <a href="<?php echo base_url().'index.php/user/saveTemplate/edit/'; ?>{{x.id}}" class="btn btn-default" style="float:right;max-height: 100%">Edit</a>
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

<script type="text/javascript">
    var app = angular.module('myapp1', ['angularUtils.directives.dirPagination', 'angularFileUpload']);
    app.controller('myctr', function($scope, $http, $upload) {
        var old = "";
        $scope.res = <?php echo $result; ?>;
        $scope.currentPage = 1;
        $scope.pageSize = 8;
    });</script>
