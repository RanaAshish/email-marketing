<div ng-if="item.length == 0" class="drop empty" style="text-align: center;padding-top: 23px">
    Drop Content Hear
</div>
<div ng-repeat="(k,con) in item" 
     dnd-draggable="con"
     dnd-effect-allowed="move"
     dnd-selected ="lists.selected = con"
     dnd-moved="item.splice($index,1)"
     ng-include="con.type" style="text-decoration: none"
     class="dropzone2"
     ng-class="{selected: lists.selected === con}">

</div>
<?php
    die();
?>