<style>
    /*For Checkbox*/
    input[type="radio"], input[type="checkbox"] {
        margin: 12px 1px 0px;
        margin-left: -18px;
        line-height: normal;
    }
    .list-group-item:first-child {
        padding: 0px;
    }
    .list-group-item:last-child {
        padding: 0px;
    }
    /*for widgets*/
    .textIcon
    {
        background-color: whitesmoke;
        width: 114px;
        height: 120px;
        padding: 1%;
        border-radius: 6px;
        border: 1px solid #D0D0D0;
        box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.18);
        float: left;
        margin:2%;
    }
    .btnicon
    {
        width: 100px;
        height: 90px;
        padding-top: 84px;
        text-align: center;
        background-image:  url("<?php echo base_url() . 'template/widget/btn.png'; ?>");
        background-repeat: no-repeat;
    }
    .imgcap
    {
        width: 100px;
        height: 90px;
        padding-top: 84px;
        text-align: center;
        background-image:  url("<?php echo base_url() . 'template/widget/imgcap.png'; ?>");
        background-repeat: no-repeat;
    }
    .text
    {
        width: 100px;
        height: 90px;
        padding-top: 84px;
        text-align: center;
        background-image:  url("<?php echo base_url() . 'template/widget/text.png'; ?>");
        background-repeat: no-repeat;
    }
    .img
    {

        width: 100px;
        height: 90px;
        padding-top: 84px;
        text-align: center;
        background-image:  url("<?php echo base_url() . 'template/widget/img.png'; ?>");
        background-repeat: no-repeat;
    }
    /*for angulerJS Editor*/

    .ta-editor {

        margin-top: 15px;
        min-height: 300px;
        max-height: 300px;
        height: auto;
        overflow: auto;
        font-family: inherit;
        font-size: 100%;
    }
    /*other*/
    .scroll
    {
        max-height: 387px;
    }
    .displayDel
    {
        display:block;
        cursor: move;
    }
    .notdisplayDel
    {
        display: none;
    }
    .drop:hover
    {
        border:1px solid black;

    }

    .nestedDemo .dropzone1 .container-element {
        float: left;
        width: 50%;
    }


    .nestedDemo .dropzone1 .dndPlaceholder {
        /*width:100%;*/
        background-color: #ddd;
        min-height: 42px;
        display: block;
        position: relative;
    }
    .nestedDemo .dndPlaceholder {
        background-color: #ddd;
        min-height: 42px;
        display: block;
        position: relative;
    }

    .nestedDemo .ctype3 .dropzone1 .container-element .drop #del {
        float: left;
        width: 32% !important;
    }

    .nestedDemo .ctype2 .dropzone1 .container-element .drop #del {
        float: left;
        width: 48% !important;
    }

    ul li
    {
        text-decoration: none;
    }
    .nestedDemo .selected .drop
    {
        border:1px solid black;
    }
    .nestedDemo .dropzone1 .selected .drop
    {
        border:1px solid black;
    }
</style>
<!--// ------------------------------------Jquery Script-------------------------------------------------------->
<script type="text/javascript">
    var str = "";
    $(function() {
        $("#sortable").on("click", ".del", function() {
            alert($(this).html());
        });
        $("#sortable").on("mouseover", ".drop", function() {
            $(this).find(".displayData").addClass("positionFixed");
            $(this).children().first().removeClass("notdisplayDel");
            $(this).children().first().addClass("displayDel");
        });
        $("#sortable").on("mouseout", ".drop", function()
        {
            $(this).children().first().addClass("notdisplayDel")
            $(this).find(".displayData").removeClass("positionFixed");
        });
    });</script>
<div class="container" ng-cloak="" ng-app="myapp" ng-controller="myctr" ng-cloak="">

    <!--// ------------------------------------Right Menu-------------------------------------------------------->
    <?php include_once 'rightmenu.php'; ?>
    <!--// ------------------------------------End of Right Menu-------------------------------------------------------->

    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">
                Create HTML Templates
            </h4>          
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div>
                        <section>
                            <!--// ------------------------------------Template Area-------------------------------------------------------->

                            <div class="col-sm-7">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Design Your Email Templets
                                    </div>

                                    <div class="panel panel-body" id="sortable">
                                        <div class="no-margn nicescroll todo-list scroll" id="screensort" style="background-color: whitesmoke">
                                            <style type="text/css">
                                                /*for template*/
                                                .drop
                                                {
                                                    background-color:whitesmoke;
                                                    margin: 5px,5px;
                                                    min-height: 60px;
                                                }
                                                .notdisplayDel
                                                {
                                                    display: none;
                                                }

                                                .imgPortable 
                                                {
                                                    max-height: 100%!important;
                                                    max-width: 100%!important;
                                                }
                                                .abtn
                                                {
                                                    border-radius: 2px;
                                                    box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.1);
                                                    font-family: "Nunito",sans-serif;
                                                    letter-spacing: 0.2px;
                                                    opacity: 0.93;
                                                    display: inline-block;
                                                    margin-bottom: 0px;
                                                    font-weight: normal;
                                                    text-align: center;
                                                    vertical-align: middle;
                                                    cursor: pointer;
                                                    background-image: none;
                                                    border: 1px solid transparent;
                                                    white-space: nowrap;
                                                    padding: 6px 12px;
                                                    font-size: 14px;
                                                    line-height: 1.42857;
                                                    -moz-user-select: none;
                                                }

                                            </style>
                                            <div ng-repeat="(key, item) in lists.list1" class="col-sm-12 nestedDemo" style="width: 100%">
                                                <div ng-if="!typeOfCapagin(item)" ng-include="ctype" dnd-list="item">

                                                </div>
                                                <div ng-if="typeOfCapagin(item) && item.length == 2" class="ctype2" ng-include="ctype2" dnd-list="item">

                                                </div>
                                                <div ng-if="typeOfCapagin(item) && item.length == 3" class="ctype3" ng-include="ctype3" dnd-list="item">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--// ------------------------------------End of Template Area-------------------------------------------------------->

                            <!--// ------------------------------------Widget Area-------------------------------------------------------->

                            <div class="col-sm-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Widgets
                                    </div>
                                    <div class="panel panel-body">
                                        <div class="textIcon" 
                                             ng-repeat="item in lists.list2"
                                             dnd-draggable="item"
                                             dnd-effect-allowed="copy"
                                             dnd-copied="item.info"
                                             >
                                            <div class="{{item.class}}">
                                                {{item.info}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="button" value="Save" class="btn btn-success col-sm-offset-10 col-sm-2" data-toggle="modal" data-target="#temp"/>
                                </div>
                            </div>
                            <!--// ------------------------------------End of Widget Area-------------------------------------------------------->
                        </section>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div id="temp" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!--<h4 class="modal-title">Modal Header</h4>-->
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?php echo base_url().'index.php/user/saveTemplate/scrensort'; ?>" id="myForm">
                        <input type="hidden" name="img_val" id="img_val" value="" />
                        <input type="hidden" name="imgname" id="imgname" value="" />
                    </form>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Template Name:</label>
                            <div class="col-sm-8">
                                <input type="text" ng-model="tmpName" class="form-control" id="tname" placeholder="Enter template name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-8">
                                <button type="button" class="btn btn-default" ng-click="saveTemplate()">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
<!--    <pre>

                                {{modelAsJson}}
    </pre>-->
</div>

<!--// -----------------------------------Anguler script-------------------------------------------------------->

<script>
    var modelJSON = "";
    var app = angular.module('myapp', ['dndLists', 'textAngular', 'angularFileUpload']);
    app.controller("myctr", function($scope, $http, $upload) {
        //Defult option to Link Buttion
        $scope.opt = "web";
        //Default thubnil Directory Data
        $scope.thumb = "";
        //
        $scope.tmpName = "";
        // Use For include Container Link
        $scope.ctype = "<?php echo base_url(); ?>template/paging/container.php";
        $scope.ctype2 = "<?php echo base_url(); ?>template/paging/container2.php";
        $scope.ctype3 = "<?php echo base_url(); ?>template/paging/container3.php";
        $scope.saveTemplate = function()
        {

            var dt = {'tmpname': $scope.tmpName, 'model': $scope.modelAsJson};
            $http({
                url: "<?php echo base_url() . 'index.php/user/saveTemplate/create' ?>",
                method: "post",
                data: dt
            }).success(function(res) {
              
                capture(res);
//                window.location = "<?php echo base_url() . 'index.php/user/manageTemplate/saveTemplate/view'; ?>"
            });
        };
        $scope.typeOfCapagin = function(item)
        {
            if (item[0] instanceof Array)
            {
                return true;
            }
            else
            {
                return false;
            }
        };
        $scope.applyStyleToDiv = function(type, value)
        {

            if ($scope.lists.selected.info == "Image" || $scope.lists.selected.info == "Button" || $scope.lists.selected.info == "Image caption")
            {
                var a = $scope.lists.selected.divcss;
                a[type] = value;
            }
        };
        $scope.applyStyle = function(type, value)
        {
            if ($scope.lists.selected.info == "Image" || $scope.lists.selected.info == "Button" || $scope.lists.selected.info == "Image caption")
            {
                var a = $scope.lists.selected.cssstyle;
                a[type] = value;
            }
        };
        //Call When Replace image link clicked
        $scope.BrowseImage = function()
        {
            $http.post("<?php echo base_url() . 'index.php/user/thubimage' ?>")
                    .success(function(dir_data)
                    {
                        $scope.thumb = dir_data;
                        $("#myModal").modal({backdrop: false});
                    });
        };
        //call when File option is selected in Buttion widget
        $scope.chooseImage = function()
        {
            $scope.opt = $(".chgimg").val();
            if ($scope.opt == "file")
            {
                $http.post("<?php echo base_url() . 'index.php/user/thubimage' ?>")
                        .success(function(str)
                        {
                            $scope.thumb = str
                            $("#myModal").modal({backdrop: false});
                        });
            }
            else
            {
                $scope.lists.selected.fileurl = "";
            }
        };
        //Call when edit widget is clicked,Open Right Menu Based on Type of Widgets
        $scope.chktype = function(str, e)
        {
            $("#wrapper").addClass("right-bar-enabled");
        };
        //Call when Save & close btn is click,Remove Right Widgets
        $scope.rmRightMenu = function()
        {
            $("#wrapper").removeClass("right-bar-enabled");
        };
        id = <?php echo $id; ?>;
        if (id == 1)
        {
            data = {
                "column0": [
                    {
                        "data": "Add Header Info",
                        "type": "<?php echo base_url(); ?>template/paging/text.php",
                        "info": "Text"
                    }
                ],
                "column1": [
                    {
                        "data": "Upload Image",
                        "type": "<?php echo base_url(); ?>template/paging/image.php",
                        "sc": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                        "thumbnil": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                        "info": "Image",
                        "cssstyle": {
                            "border-color": "black",
                            "border-style": "solid",
                            "border-width": 1},
                        "divcss": {"text-align": "center"}
                    }
                ],
                "column3": [
                    {
                        "data": "Button",
                        "info": "Button",
                        "type": "<?php echo base_url(); ?>template/paging/Button.php",
                        "class": "btnicon",
                        "cssclass": "",
                        "cssstyle": {
                            "border-color": "black",
                            "border-style": "solid",
                            "border-width": 1,
                            "font-family": "Times New Roman",
                            "color": "#ffffff",
                            "font-size": 15,
                            "background-color": "#33b86c"
                        },
                        "fileurl": "",
                        "divcss": {"text-align": "center"}
                    },
                    {
                        "data": "Add Footer Info",
                        "type": "<?php echo base_url(); ?>template/paging/text.php",
                        "info": "Text"
                    }
                ]
            };
        }
        else if (id == 12)
        {
            data = {
                "column0": [
                    {
                        "data": "Add Header Info",
                        "type": "<?php echo base_url(); ?>template/paging/text.php",
                        "info": "Text"
                    },
                    {
                        "data": "Button",
                        "info": "Button",
                        "type": "<?php echo base_url(); ?>template/paging/Button.php",
                        "class": "btnicon",
                        "cssclass": "",
                        "cssstyle": {
                            "border-color": "black",
                            "border-style": "solid",
                            "border-width": 1,
                            "font-family": "Times New Roman",
                            "color": "#ffffff",
                            "font-size": 15,
                            "background-color": "#33b86c"
                        },
                        "fileurl": "",
                        "divcss": {"text-align": "center"}
                    }
                ],
                "column1": [
                    [
                        {
                            "data": "Upload New image",
                            "info": "Image",
                            "type": "<?php echo base_url(); ?>template/paging/image.php",
                            "sc": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "thumbnil": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "class": "img",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1},
                            "divcss": {"text-align": "center"}
                        },
                        {
                            "data": "Button",
                            "info": "Button",
                            "type": "<?php echo base_url(); ?>template/paging/Button.php",
                            "class": "btnicon",
                            "cssclass": "",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1,
                                "font-family": "Times New Roman",
                                "color": "#ffffff",
                                "font-size": 15,
                                "background-color": "#33b86c"
                            },
                            "fileurl": "",
                            "divcss": {"text-align": "center"}
                        }
                    ],
                    [
                        {
                            "data": "Write Text",
                            "info": "Image caption",
                            "type": "<?php echo base_url(); ?>template/paging/imageCap.php",
                            "sc": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "class": "imgcap",
                            "thumbnil": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1
                            },
                            "divcss": {"text-align": "center"}
                        }
                    ]
                ]
            };
        }
        else if (id == 121)
        {
            data = {
                "column0": [
                    {
                        "data": "Add Header Info<br>",
                        "info": "Text",
                        "type": "<?php echo base_url(); ?>template/paging/text.php",
                        "class": "text"
                    },
                    {
                        "data": "Button",
                        "info": "Button",
                        "type": "<?php echo base_url(); ?>template/paging/Button.php",
                        "class": "btnicon",
                        "cssclass": "",
                        "cssstyle": {
                            "border-color": "black",
                            "border-style": "solid",
                            "border-width": 1,
                            "font-family": "Times New Roman",
                            "color": "#ffffff",
                            "font-size": 15,
                            "background-color": "#33b86c"
                        },
                        "fileurl": "",
                        "divcss": {"text-align": "center"}
                    }
                ],
                "column1": [
                    [
                        {
                            "data": "Image Description<br>",
                            "info": "Image caption",
                            "type": "<?php echo base_url(); ?>template/paging/imageCap.php",
                            "sc": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "class": "imgcap",
                            "thumbnil": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1
                            },
                            "divcss": {"text-align": "center"}
                        }
                    ],
                    [
                        {
                            "data": "Image Title<br>",
                            "info": "Text",
                            "type": "<?php echo base_url(); ?>template/paging/text.php",
                            "class": "text"
                        },
                        {
                            "data": "Upload New image",
                            "info": "Image",
                            "type": "<?php echo base_url(); ?>template/paging/image.php",
                            "sc": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "thumbnil": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "class": "img",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1
                            },
                            "divcss": {"text-align": "center"}
                        }
                    ]
                ],
                "column2": [
                    {
                        "data": "Add Footer Info<br>",
                        "info": "Text",
                        "type": "<?php echo base_url(); ?>template/paging/text.php",
                        "class": "text"
                    }
                ]
            };
        }
        else if (id == 13)
        {
            data = {
                "column0": [
                    {
                        "data": "Add Header Info",
                        "type": "<?php echo base_url(); ?>template/paging/text.php",
                        "info": "Text"
                    },
                    {
                        "data": "Button",
                        "info": "Button",
                        "type": "<?php echo base_url(); ?>template/paging/Button.php",
                        "class": "btnicon",
                        "cssclass": "",
                        "cssstyle": {
                            "border-color": "black",
                            "border-style": "solid",
                            "border-width": 1,
                            "font-family": "Times New Roman",
                            "color": "#ffffff",
                            "font-size": 15,
                            "background-color": "#33b86c"
                        },
                        "fileurl": "",
                        "divcss": {"text-align": "center"}
                    }
                ],
                "column1": [
                    [
                        {
                            "data": "Button",
                            "info": "Button",
                            "type": "<?php echo base_url(); ?>template/paging/Button.php",
                            "class": "btnicon",
                            "cssclass": "",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1,
                                "font-family": "Times New Roman",
                                "color": "#ffffff",
                                "font-size": 15,
                                "background-color": "#33b86c"
                            },
                            "fileurl": "",
                            "divcss": {"text-align": "center"}
                        },
                        {
                            "data": "Upload New image",
                            "info": "Image",
                            "type": "<?php echo base_url(); ?>template/paging/image.php",
                            "sc": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "thumbnil": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "class": "img",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1},
                            "divcss": {"text-align": "center"}
                        }
                    ],
                    [
                        {
                            "data": "Write Text",
                            "info": "Image caption",
                            "type": "<?php echo base_url(); ?>template/paging/imageCap.php",
                            "sc": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "class": "imgcap",
                            "thumbnil": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1},
                            "divcss": {"text-align": "center"}
                        }
                    ],
                    [
                        {
                            "data": "Write Text",
                            "info": "Text",
                            "type": "<?php echo base_url(); ?>template/paging/text.php",
                            "class": "text"
                        },
                        {
                            "data": "Upload New image",
                            "info": "Image",
                            "type": "<?php echo base_url(); ?>template/paging/image.php",
                            "sc": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "thumbnil": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "class": "img",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1},
                            "divcss": {"text-align": "center"}
                        }
                    ]
                ]
            };
        }
        else if (id == 131)
        {
            data = {
                "column0": [
                    {
                        "data": "Add Header Info<br>",
                        "info": "Text",
                        "type": "<?php echo base_url(); ?>template/paging/text.php",
                        "class": "text"
                    }
                ],
                "column1": [
                    [
                        {
                            "data": "Write Text",
                            "info": "Image caption",
                            "type": "<?php echo base_url(); ?>template/paging/imageCap.php",
                            "sc": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "class": "imgcap",
                            "thumbnil": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1},
                            "divcss": {"text-align": "center"}
                        }
                    ],
                    [
                        {
                            "data": "Write Text",
                            "info": "Text",
                            "type": "<?php echo base_url(); ?>template/paging/text.php",
                            "class": "text"
                        },
                        {
                            "data": "Button",
                            "info": "Button",
                            "type": "<?php echo base_url(); ?>template/paging/Button.php",
                            "class": "btnicon",
                            "cssclass": "",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1,
                                "font-family": "Times New Roman",
                                "color": "#ffffff",
                                "font-size": 15,
                                "background-color": "#33b86c"
                            },
                            "fileurl": "",
                            "divcss": {"text-align": "center"}
                        }
                    ],
                    [
                        {
                            "data": "Upload New image",
                            "info": "Image",
                            "type": "<?php echo base_url(); ?>template/paging/image.php",
                            "sc": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "thumbnil": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "class": "img",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1},
                            "divcss": {"text-align": "center"}
                        }
                    ]
                ],
                "column2": [
                    {
                        "data": "Button",
                        "info": "Button",
                        "type": "<?php echo base_url(); ?>template/paging/Button.php",
                        "class": "btnicon",
                        "cssclass": "",
                        "cssstyle": {
                            "border-color": "black",
                            "border-style": "solid",
                            "border-width": 1,
                            "font-family": "Times New Roman",
                            "color": "#ffffff",
                            "font-size": 15,
                            "background-color": "#33b86c"
                        },
                        "fileurl": "",
                        "divcss": {"text-align": "center"}
                    },
                    {
                        "data": "Add Footer info<br>",
                        "info": "Text",
                        "type": "<?php echo base_url(); ?>template/paging/text.php",
                        "class": "text"
                    }
                ]
            };
        }
        else if (id == 132)
        {
            data = {
                "column0": [
                    {
                        "data": "Add Header info<br>",
                        "info": "Text",
                        "type": "<?php echo base_url(); ?>template/paging/text.php",
                        "class": "text"
                    }
                ],
                "column1": [
                    [
                        {
                            "data": "Button",
                            "info": "Button",
                            "type": "<?php echo base_url(); ?>template/paging/Button.php",
                            "class": "btnicon",
                            "cssclass": "",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1,
                                "font-family": "Times New Roman",
                                "color": "#ffffff",
                                "font-size": 15,
                                "background-color": "#33b86c"
                            },
                            "fileurl": "",
                            "divcss": {"text-align": "center"}
                        }
                    ],
                    [
                        {
                            "data": "Add image info<br>",
                            "info": "Image caption",
                            "type": "<?php echo base_url(); ?>template/paging/imageCap.php",
                            "sc": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "class": "imgcap",
                            "thumbnil": "<?php echo base_url(); ?>template/user/images/empty-image.png",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1
                            },
                            "divcss": {"text-align": "center"}
                        }
                    ],
                    [
                        {
                            "data": "Button",
                            "info": "Button",
                            "type": "<?php echo base_url(); ?>template/paging/Button.php",
                            "class": "btnicon",
                            "cssclass": "",
                            "cssstyle": {
                                "border-color": "black",
                                "border-style": "solid",
                                "border-width": 1,
                                "font-family": "Times New Roman",
                                "color": "#ffffff",
                                "font-size": 15,
                                "background-color": "#33b86c"
                            },
                            "fileurl": "",
                            "divcss": {"text-align": "center"}
                        }
                    ]
                ],
                "column2": [
                    [
                        {
                            "data": "Add Footer info<br>",
                            "info": "Text",
                            "type": "<?php echo base_url(); ?>template/paging/text.php",
                            "class": "text"
                        }
                    ],
                    [
                        {
                            "data": "Add Copyright info<br>",
                            "info": "Text",
                            "type": "<?php echo base_url(); ?>template/paging/text.php",
                            "class": "text"
                        }
                    ]
                ]
            };
        }
        $scope.lists = {
            selected: null,
            list1: data,
            list2: [
                {
                    "data": "Write Text",
                    "info": "Text",
                    "type": "<?php echo base_url(); ?>template/paging/text.php",
                    "class": "text"
                },
                {
                    "data": "Upload New image",
                    "info": "Image",
                    "type": "<?php echo base_url(); ?>template/paging/image.php",
                    "sc": "<?php echo base_url() ?>template/user/images/empty-image.png",
                    "thumbnil": "<?php echo base_url() ?>template/user/images/empty-image.png",
                    "class": "img",
                    "cssstyle": {
                        "border-color": "black",
                        "border-style": "solid",
                        "border-width": 1},
                    "divcss": {"text-align": "center"}
                },
                {
                    "data": "Button",
                    "info": "Button",
                    "type": "<?php echo base_url(); ?>template/paging/Button.php",
                    "class": "btnicon",
                    "cssclass": "",
                    "cssstyle": {
                        "border-color": "black",
                        "border-style": "solid",
                        "border-width": 1,
                        "font-family": "Times New Roman",
                        "color": "#ffffff",
                        "font-size": 15,
                        "background-color": "#33b86c"
                    },
                    "fileurl": "",
                    "divcss": {"text-align": "center"}
                },
                {
                    "data": "Write Text",
                    "info": "Image caption",
                    "type": "<?php echo base_url(); ?>template/paging/imageCap.php",
                    "sc": "<?php echo base_url() ?>template/user/images/empty-image.png",
                    "class": "imgcap",
                    "thumbnil": "<?php echo base_url() ?>template/user/images/empty-image.png",
                    "cssstyle": {
                        "border-color": "black",
                        "border-style": "solid",
                        "border-width": 1
                    },
                    "divcss": {"text-align": "center"}
                }
            ]
        };
        //Call when we select image in model and base on type of widget assign link to diffrent varible. 
        $scope.selectImage = function(str)
        {

            if ($scope.lists.selected.info == "Image" || $scope.lists.selected.info == "Image caption")
            {
                $scope.lists.selected.sc = "<?php echo base_url() . 'template/BasicTemplate/' . $userid . '/img/'; ?>" + str;
                $scope.lists.selected.thumbnil = "<?php echo base_url() . 'template/BasicTemplate/' . $userid . '/thumbnil/'; ?>" + str;
                $("#myModal").modal("hide");
            }
            else
            {

                $scope.lists.selected.fileurl = "<?php echo base_url() . 'template/BasicTemplate/' . $userid . '/img/'; ?>" + str;
                $("#myModal").modal("hide");
            }

        };
        // call when upload image in model and refress data.1
       $scope.onFileSelectInModel = function($files) {
            $("#back").css("display", "block");
            $("#front").css("display", "block");
            $upload.upload({
                url: '<?php echo base_url() . 'index.php/user/UploadImage' ?>',
                file: $files
            }).success(function(response) {
                if (response == "fail")
                {
                    swal("File Formate is not Supported");
                    $("#back").css("display", "none");
                    $("#front").css("display", "none");
                }
                else
                {
                    $http.post("<?php echo base_url() . 'index.php/user/thubimage' ?>")
                            .success(function(str)
                            {
                                //alert(str);
                                $scope.thumb = str;
                                $("#back").css("display", "none");
                                $("#front").css("display", "none");
                            });
                    swal("File Successfuly uploaded...");
                }
            });
        };
        // Call when Delete Widgets. 
        $scope.deleteWidget = function(e, i, k, k1)
        {
            if (confirm("Are u sure"))
            {
                if (typeof(k1) === "undefined")
                {
                    $scope.lists.list1[i].splice(k, 1);
                    $("#wrapper").removeClass("right-bar-enabled");
                }
                else
                {
                    $scope.lists.list1[i][k1].splice(k, 1);
                    $("#wrapper").removeClass("right-bar-enabled");
                }
            }
        }
        ;
        // Get Model 
        $scope.$watch('lists.list1', function(model) {
            $scope.modelAsJson = angular.toJson(model, true);
            modelJSON = $scope.modelAsJson;
        }, true);
    });


</script>
<script type="text/javascript">
    function capture(id) {
        $("#imgname").val(id);
        $("#screensort").removeAttr("class");
        $(".drop").css("border","0 px none");
        $('#screensort').html2canvas({
            onrendered: function(canvas) {
                //Set hidden field's value to image data (base-64 string)
                $('#img_val').val(canvas.toDataURL("image/jpg"));
                //Submit the form manually
                document.getElementById("myForm").submit();

            }
        });
    }
</script>

<!--// -----------------------------------End of Anguler script-------------------------------------------------------->
