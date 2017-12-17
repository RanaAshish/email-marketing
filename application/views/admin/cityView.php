<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">City
            </h4>
        </div>
    </div>
    <div class="panel" ng-cloak="" ng-app="myapp1" ng-controller="myctr">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="m-b-30">
                        <button id="addToTable" class="btn btn-primary waves-effect waves-light">Add 
                            <i class="fa fa-plus">
                            </i>
                        </button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped mytable" id="datatable-editable" ng-init="record = <?php echo htmlspecialchars($records); ?>">
                <thead>
                    <tr>
                        <th style="width: 30%">
                            City Name
                        </th>
                        <th style="width: 30%">
                            Country Name
                        </th>
                        <th style="width: 30%">
                            State Name
                        </th>
                        <th>Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="gradeX" ng-repeat="row in record" id="{{row.id}}">
                        <td>
                            {{row.name}}
                        </td>
                        <td>
                            {{row.cname}}
                        </td>
                        <td>
                            {{row.sname}}
                        </td>
                        <td class="actions">
                            <a href="#" class="hidden on-editing save-row">
                                <i class="fa fa-save">
                                </i>
                            </a> 
                            <a href="#" class="hidden on-editing cancel-row">
                                <i class="fa fa-times">
                                </i>
                            </a> 
                            <a href="#" class="on-default edit-row">
                                <i class="fa fa-pencil">
                                </i>
                            </a> 
                            <a href="#" class="on-default remove-row">
                                <i class="fa fa-trash-o">
                                </i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div id="dialog" class="modal-block mfp-hide">
        <section class="panel panel-info panel-color">
            <header class="panel-heading">
                <h2 class="panel-title">Are you sure?
                </h2>
            </header>
            <div class="panel-body">
                <div class="modal-wrapper">
                    <div class="modal-text">
                        <p>Are you sure that you want to delete this row?
                        </p>
                    </div>
                </div>
                <div class="row m-t-20">
                    <div class="col-md-12 text-right">
                        <button id="dialogConfirm" class="btn btn-primary waves-effect waves-light">Confirm
                        </button> 
                        <button id="dialogCancel" class="btn btn-default waves-effect">Cancel
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script src="<?php echo base_url(); ?>template/adminTemplate/pages/datatables.editable.init_city.js">
</script>
<script type="text/javascript">
    var app = angular.module('myapp1', []);
    app.controller('myctr', function($scope)
    {
        $scope.record = <?php echo $records; ?>;
    });
    $('document').ready(function()
    {
        $(".mytable").on("change", "[name='country']", function() {
            var cid = $(this).val();
            $.ajax
                    ({
                        type: "post",
                        url: "../getState/" + cid,
                        success: function(str)
                        {
                            $("[name='state']").html('<select class="form-control input-block" name="state">' + str + '</select>');
                        }
                    });
        });
    });

</script>