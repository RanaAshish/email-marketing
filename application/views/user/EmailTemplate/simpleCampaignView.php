<style type="text/css">
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
</style>

<div class="container" ng-app="myapp1" ng-cloak="" ng-controller="myctr" ng-cloak="">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Plain Text Campaign
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
                                Campaign Information
                            </h3>
                            <section>
                                <div class="panel-body col-lg-12">
                                    <div class="form-group col-lg-12">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Name of Campaign</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="txtcname" id="cname" placeholder="Enter Name of Campaign" type="text" required>
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
                            <h3>
                                Select Subscriber
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
                                                        <input class="todo-done groups getSubscriber" id="groups" value="{{x.id}}" ng-click="getSubscriber()" type="checkbox" name="groups[]">
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
                                                        <input class="todo-done count" ng-click="countSubscriber()" value="{{x.id}}"  type="checkbox" name="groups" checked="true">
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
                            <h3>
                                Compose Email
                            </h3>
                            <section>
                                <div class="col-md-12 col-lg-12">
                                    <div class="panel panel-default m-t-20">
                                        <div class="panel-body p-t-30">
                                            <form role="form">
                                                <div class="form-group col-sm-9">
                                                    <textarea placeholder="Message body" name="message" class="required wysihtml5 form-control" required style="height: 200px; display: hidden;">
                                                    </textarea>
                                                </div>
                                                <div class='col-sm-3'>
                                                    <h4>
                                                        Copy Following Content to add User Field
                                                    </h4></br>
                                                    <table class='table table-border table-stripped'>
                                                        <tr>
                                                            <th>
                                                                Field
                                                            </th>
                                                            <th>
                                                                Placeholder
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>First Name</b>
                                                            </td>
                                                            <td>
                                                                *|FName|*
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>Last Name</b>
                                                            </td>
                                                            <td>
                                                                *|LName|*
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>Email</b>
                                                            </td>
                                                            <td>
                                                                *|Email|*
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </form>
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
</div>
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
                    if (currentIndex == 1)
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
                onFinishing: function(event, currentIndex) {
                    $form_container.validate().settings.ignore = ":disabled";
                    return $form_container.valid();
                },
                onFinished: function(event, currentIndex) {
                    //var src = '<?php echo base_url() . "index.php/test/checkopen/" ?>';
                    //var mydata = '<img src='+src+'>';

                    var ob = new Array();
                    ob[0] = $(this).children().find("[name='txtcname']").val();
                    ob[1] = $(this).children().find("[name='txtfromname']").val();
                    ob[2] = $(this).children().find("[name='txtfromemail']").val();
                    ob[3] = $(this).children().find("[name='txtsubject']").val();
                    ob[4] = $(this).children().find("[name='message']").val();
                    ob[5] = $(".count:checked").map(function() {
                        return $(this).val();
                    }).get();
//                    alert(JSON.stringify(ob));
                    $.ajax({
                        url: "<?php echo base_url() . 'index.php/user/campaign/simpleCreate/' ?>",
                        type: "post",
                        data: "campaign=" + escape(JSON.stringify(ob)),
                        success: function(data)
                        {
                            // alert(data);
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
<script type="text/javascript">
    var app = angular.module('myapp1', ['angularUtils.directives.dirPagination']);
    app.controller('myctr', function($scope, $http) {
        $scope.result = "";
        $scope.cnt = 0;
        $scope.war = "No Subscriber";
        $scope.res = <?php echo $result; ?>;
        $scope.group_cnt = 0;
        $scope.countSubscriber = function()
        {

            var c = 0;
            c = $(".count:checked").length;
            $scope.cnt = c;
        }

        $scope.countGroup = function()
        {
            var c = 0;
            c = $(".getSubscriber:checked").length;
            $scope.group_cnt = c;
        }

        $scope.getSubscriber = function()
        {
            $scope.countGroup();
            var id = "";
//            $(".getSubscriber:checked").each(function () {
//                id = id + $(this).val();
//            });
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
        }

    });

    jQuery(document).ready(function()
    {
        $('.wysihtml5').wysihtml5();
    });
</script>