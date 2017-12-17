
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

    .nestedDemo .dropzone1 .container-element .drop #del {
        float: left;
        width: 32% !important;
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
            <h4 class="pull-left page-title">Send Email
            </h4>          
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form id="wizard-validation-form" action="#">
                        <div>
                            <h3>
                                Create Template
                            </h3>
                            <section>
                                <!--// ------------------------------------Template Area-------------------------------------------------------->

                                <div class="col-sm-7">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Design Your Email Templets
                                        </div>

                                        <div class="panel panel-body" id="sortable" >
                                            <div class="no-margn nicescroll todo-list scroll" style="background-color: whitesmoke">
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
                                                        max-height: 100%;
                                                        max-width: 100%;
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

                                                    <div ng-if="key == 'column0' || key == 'column2'" ng-include="ctype" dnd-list="item">

                                                    </div>
                                                    <div ng-if="key == 'column1'" ng-include="ctype3" dnd-list="item">

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
                                </div>
                                <!--// ------------------------------------End of Widget Area-------------------------------------------------------->
                            </section>
                            <h3>
                                Campaign Name
                            </h3>
                            <section>
                                <div class="panel-body col-lg-12" style="min-height: 400px">
                                    <div class="form-group col-lg-12">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Name of Campaign</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="txtcname" id="cname" placeholder="Enter Name of Campaign" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="inputPassword3" class="col-sm-2 control-label">From Name</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="txtfromname" placeholder="Enter Name from which Mail has to be sent" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="inputPassword4" class="col-sm-2 control-label">From Email</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="txtfromemail" placeholder="Enter Email address from which Mail has to be sent" type="email" required="">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="inputPassword4" class="col-sm-2 control-label">Subject of Email</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="txtsubject" placeholder="Enter Subject of this campaign" type="text" required="">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h3>Select Subscriber
                            </h3>
                            <section>
                                <div class="col-lg-5">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                Groups Name
                                            </h3>
                                        </div>
                                        <div class="panel-body ">
                                            <div class="row">
                                            </div>
                                            <ul tabindex="5002" class="list-group no-margn nicescroll todo-list" style="max-height: 350px;min-height: 350px;  overflow: hidden;" id="todo-list">
                                                <li class="list-group-item" ng-repeat="x in res" ng-if="res.length != 0">
                                                    <div class="checkbox checkbox-primary">
                                                        <input class="todo-done getSubscriber" value="{{x.id}}" ng-click="getSubscriber()" type="checkbox" name="groups[]">
                                                        <label>
                                                            {{x.name}}
                                                        </label>
                                                    </div>
                                                </li>
                                                <div class="alert alert-info" ng-if="res.length == 0">
                                                    No Group available.
                                                </div>    
                                            </ul>

                                        </div>
                                        <div class="panel-footer">
                                            {{res.length}} Out of {{ group_cnt}} Selected.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                Subscriber
                                            </h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                            </div>
                                            <ul tabindex="5002" class="list-group no-margn nicescroll todo-list" style="max-height: 350px;min-height: 350px;  overflow: hidden;" id="todo-list">
                                                <div ng-if="result.length == 0" class="alert alert-info">
                                                    No Subscriber available
                                                </div>
                                                <li class="list-group-item" ng-repeat="x in result" style="padding: 0px">
                                                    <div class="checkbox checkbox-primary">
                                                        <input class="todo-done count" ng-click="countSubscriber()" value="{{x.id}}"  type="checkbox" name="groups[]" checked="true">
                                                        <label>
                                                            {{x.email}} - {{x.fname}} {{x.lname}}
                                                        </label>
                                                    </div>

                                                </li>

                                            </ul>
                                        </div>
                                        <div class="panel-footer">
                                            {{result.length}} Out of {{cnt}} Selected.
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </form>
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
        // Use For include Container Link
        $scope.ctype = "<?php echo base_url(); ?>template/paging/container.php";
        $scope.ctype2 = "<?php echo base_url(); ?>template/paging/container2.php";
        $scope.ctype3 = "<?php echo base_url(); ?>template/paging/container3.php";

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

        $scope.lists = {
            selected: null,
            list1: {
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
            },
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
        //Subscriber Json Data
        $scope.result = "";
        //Count no of seleted Subscriber
        $scope.cnt = 0;
        //Group JSON Data
        $scope.res = <?php echo $result; ?>;
        //Count  no of selected Group
        $scope.group_cnt = 0;
        // Call when Subscriber checkbox is seletct or unselect.
        $scope.countSubscriber = function()
        {

            var c = 0;
            c = $(".count:checked").length;
            $scope.cnt = c;
        };
        // Call when getSubscriber function is call
        $scope.countGroup = function()
        {
            var c = 0;
            c = $(".getSubscriber:checked").length;
            $scope.group_cnt = c;
        };
        // Call when group checkbox is seletct or unselect
        $scope.getSubscriber = function()
        {
            $scope.countGroup();
            var id = "";
            var arr = $(".getSubscriber:checked").map(function() {
                return $(this).val();
            }).get();
            id = JSON.stringify(arr);
            $http.post("<?php echo base_url() . 'index.php/user/subscriber/getSubscriber/' ?>" + encodeURIComponent(id)).success(function(str)
            {
                $scope.result = str;
            }).then(function()
            {
                $scope.cnt = $scope.result.length;
            });
        };
        // Get Model 
        $scope.$watch('lists.list1', function(model) {
            $scope.modelAsJson = angular.toJson(model, true);
            modelJSON = $scope.modelAsJson;
        }, true);
    });

</script>
<!--// -----------------------------------End of Anguler script-------------------------------------------------------->
<script type="text/javascript">
    !function($) {
        "use strict";
        var FormWizard = function() {
        };

        //creates form with validation
        FormWizard.prototype.createValidatorForm = function($form_container) {
            $form_container.validate({
                errorPlacement: function errorPlacement(error, element) {
                    element.after(error);
                },
            });
            $form_container.children("div").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                onStepChanging: function(event, currentIndex, newIndex) {
                    $form_container.validate().settings.ignore = ":disabled,:hidden";
                    return $form_container.valid();
                },
                onFinishing: function(event, currentIndex) {
                    if (currentIndex == 2)
                    {
                        var arr = "";
                        arr = $(".count:checked").map(function() {
                            return $(this).val();
                        }).get();
                        if (arr == "")
                        {
                            swal("Please select at list one subscriber");

                        }
                        else
                        {
                            $form_container.validate().settings.ignore = ":disabled,:hidden";
                            return $form_container.valid();
                        }

                    }
                    else
                    {
                        $form_container.validate().settings.ignore = ":disabled,:hidden";
                        return $form_container.valid();
                    }
                },
                onFinished: function(event, currentIndex) {
                    $("#del").remove();
                    $(".empty").remove();
                    var ob = new Array();
                    ob[0] = $(this).children().find("[name='txtcname']").val();
                    ob[1] = $(this).children().find("[name='txtfromname']").val();
                    ob[2] = $(this).children().find("[name='txtfromemail']").val();
                    ob[3] = $(this).children().find("[name='txtsubject']").val();
                    ob[4] = $("#sortable").html();
                    ob[5] = $(".count:checked").map(function() {
                        return $(this).val();
                    }).get();
                    ob[6] = modelJSON;
                    $.ajax({
                        url: "<?php echo base_url() . 'index.php/user/campaign/htmlmail' ?>",
                        type: "post",
                        data: "campaign=" + escape(JSON.stringify(ob)),
                        success: function(data)
                        {
                            if (data == "1")
                            {
                                swal("Your Campaign is Send Successfully\n");
                                window.location = "<?php echo base_url() . 'index.php/user/campaign/' ?>";
                            }
                            else
                            {
                                swal("You can't send mail, you are exceeding the plan limit for maximum subscriber");
                            }
                        }

                    });
                }
            });

            return $form_container;
        },
                //creates vertical form

                FormWizard.prototype.init = function() {
                    this.createValidatorForm($("#wizard-validation-form"));
                },
                $.FormWizard = new FormWizard, $.FormWizard.Constructor = FormWizard
    }(window.jQuery),
//initializing 
            function($) {
                "use strict";
                $.FormWizard.init()
            }(window.jQuery);
</script>