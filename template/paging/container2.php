<div ng-repeat="(k1,c) in item" 
     class="dropzone1" style="width: 50% !important;float: left;"
     >

    <div dnd-list="c">
        <div ng-if="c.length == 0" class="drop empty" style="text-align: center;padding-top: 23px">
            Drop Content Hear
        </div>
        <div ng-repeat="(k,con) in c" 
             dnd-draggable="con"
             dnd-effect-allowed="move"
             dnd-selected ="lists.selected = con"
             dnd-moved="c.splice($index,1)"
             ng-class="{selected: lists.selected === con}"
             class="container-element" style="width:100%;">
            <div  dnd-list="c" ng-include="con.type">

            </div>
        </div>
    </div>

</div>
