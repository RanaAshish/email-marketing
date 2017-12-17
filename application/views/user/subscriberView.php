<html>
    <head>
        <meta charset="UTF-8">
        <title>
        </title>
    </head>
    <body ng-cloak="" ng-app="myapp1" ng-controller="myctr">
        <div class="container">
            <form class="form-horizontal" method="post" action="<?php echo base_url() . "index.php/user/subscriber/create"; ?>">
                <div class="col-sm-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Subscriber info
                            </h3>
                        </div>
                        <div class="panel-body" style="min-height: 400px">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">First Name:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="txtfname" placeholder="First Name" type="text" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Last Name:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="txtlname" placeholder="Last Name" type="text" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="txtemail" placeholder="Email" type="email" required="">
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Groups Name
                            </h3>
                        </div>
                        <div class="panel-body todoapp">
                            <div class="row">
                            </div>
                            <ul tabindex="5002" class="list-group no-margn nicescroll todo-list" style="max-height: 350px;min-height: 350px;  overflow: hidden;" id="todo-list">
                                <div class="alert alert-info" ng-if="res.length == 0">
                                    No Group available.
                                </div>
                                <li class="list-group-item" ng-repeat="x in res">
                                    <div class="checkbox checkbox-primary">
                                        <input class="todo-done" value="{{x.id}}" type="checkbox" name="groups[]">
                                        <label>
                                            {{x.name}}
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

<script type="text/javascript">
    var app = angular.module('myapp1', ['angularUtils.directives.dirPagination']);
    app.controller('myctr', function ($scope) {
        $scope.res = <?php echo $result; ?>;
    });



</script>
