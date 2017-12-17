<div class="drop" style="">
<div style="background-color: black;opacity: 0.5;position: absolute;width:96.5%" class="notdisplayDel" id="del">
    <div style="float: right;">
        
        <button type="button" ng-click="deleteWidget($event,key,k,k1)" class="del btn btn-small btn-inverse waves waves-light"><span class="fa fa-trash"></span></button>
        <button type='button' ng-click="chktype('btn',$event)" class='edit btn btn-small btn-inverse waves waves-light' btn-type="info" ng-init="type = btn"><span class='fa fa-pencil'></span></button>
    </div>
</div>
    <div ng-style="con.divcss" class="displayData" style="padding: 15px;min-height: 64px" dnd-nodrag>
        <a href="{{con.fileurl}}" ng-class="con.cssclass" ng-style="con.cssstyle" class="abtn">{{con.data}}</a>
    </div>
</div>
<?php
	die();
?>