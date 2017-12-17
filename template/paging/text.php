<div class="drop">
    <div style="background-color: black;opacity: 0.5;position: absolute;width:96.5%" class="notdisplayDel" id="del">
        <div style="float: right;">
            <button type="button" ng-click="deleteWidget($event, key, k,k1)" class="del btn btn-small btn-inverse waves waves-light"><span class="fa fa-trash"></span></button>
            <button type='button' ng-click="chktype('text', $event)" class='edit btn btn-small btn-inverse waves waves-light' btn-type="info" ng-init="type = info"><span class='fa fa-pencil'></span></button>
        </div>
    </div>
    <div ng-bind-html="con.data" style="padding: 15px;word-wrap: normal;" dnd-nodrag>

    </div>
</div>
<?php
	die();
?>