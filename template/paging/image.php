<div class="drop">
    <div style="background-color: black;opacity: 0.5;position: absolute;width:96.5%" class="notdisplayDel" id="del">
        <div style="float: right;">
            <button type="button" ng-click="deleteWidget($event,key,k,k1)" class="del btn btn-small btn-inverse waves waves-light"><span class="fa fa-trash"></span></button>
            <button type='button' ng-click="chktype('image',$event)" class='edit btn btn-small btn-inverse waves waves-light' btn-type="info" ng-init="type = info"><span class='fa fa-pencil'></span></button>
        </div>
    </div>
    <div class="displayData"  style="padding: 15px;" dnd-nodrag ng-style="con.divcss">
        <img src="{{con.sc}}" alt='image' ng-style="con.cssstyle" class="imgPortable"/><br>
    </div>
</div>
<?php
	die();
?>