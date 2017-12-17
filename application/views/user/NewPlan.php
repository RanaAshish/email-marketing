<?php
    $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
    $paypal_id = "ashish-rana@yahoo.com";
?>
<div class="container" ng-cloak="" ng-app="myapp1" ng-cloak=""  ng-controller="myctr">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title">
                Your Suitable Plan is listed below
            </h3>
        </div>
    </div>
    <div  id="viewform" class="col-sm-12">
        <div class="row"></div>
        <div class="panel panel-default">
            <div class="panel-heading" style="height: 50px">
                <div class="panel-title">
                    <input type="text" class="form-control" style="width:25%;float:left;" placeholder="Search" value="India" ng-model="var">
                    <input type="number" min="1"  max="25" class="form-control" style="width:8%; float:right" placeholder="Search" ng-model="pageSize"/>
                </div>
            </div>
            <div class="panel-body">
                <!-- <form method="post" action="<?php echo base_url() ?>index.php/user/UserPlan/activateNew/"> -->
                <form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
                    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
                    <input type="hidden" name="cmd" value="_xclick">
                    <input type="hidden" name="item_name" value="PHPGang Payment">
                    <!-- <input type="hidden" name="item_number" value="1"> -->
                    <!-- <input type="hidden" name="credits" value="510"> -->
                    <!-- <input type="hidden" name="userid" value="1"> -->
                    <input type="hidden" name="amount" value="10">
                    <!-- <input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg"> -->
                    <input type="hidden" name="no_shipping" value="1">
                    <input type="hidden" name="currency_code" value="USD">
                    <!-- <input type="hidden" name="handling" value="0"> -->
                    <input type="hidden" name="cancel_return" value="<?php base_url().'index.php/user/UserPlan/NewPlan/' ?>">
                    <input type="hidden" name="return" value="<?php base_url().'index.php/user/UserPlan/' ?>">
                    <!-- <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"> -->
                    <!-- <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"> -->
                    <!-- </form> -->
                    <div class="table table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>
                                </th>
                                <th>
                                    <a href="#" ng-click="sortType = 'name';
                                                sortReverse = !sortReverse">
                                        Plan Name 
                                        <span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-down"></span>
                                        <span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-up"></span>
                                    </a>
                                </th>
                                <th>
                                    <a href="#" ng-click="sortType = 'maximum_subscriber';
                                                sortReverse = !sortReverse">
                                        No of Subscriber 
                                        <span ng-show="sortType == 'maximum_subscriber' && !sortReverse" class="fa fa-caret-down"></span>
                                        <span ng-show="sortType == 'maximum_subscriber' && sortReverse" class="fa fa-caret-up"></span>
                                    </a>
                                </th>
                                <th>
                                    <a href="#" ng-click="sortType = 'maximum_mail';
                                                sortReverse = !sortReverse">
                                        No of Email 
                                        <span ng-show="sortType == 'maximum_mail' && !sortReverse" class="fa fa-caret-down"></span>
                                        <span ng-show="sortType == 'maximum_mail' && sortReverse" class="fa fa-caret-up"></span>
                                    </a>
                                </th>
                                </th>
                                <th>
                                    <a href="#" ng-click="sortType = 'duration';
                                        sortReverse = !sortReverse">
                                        Duration 
                                        <span ng-show="sortType == 'duration' && !sortReverse" class="fa fa-caret-down"></span>
                                        <span ng-show="sortType == 'duration' && sortReverse" class="fa fa-caret-up"></span>
                                    </a>
                                </th>
                                <th>
                                    <a href="#" ng-click="sortType = 'price';
                                        sortReverse = !sortReverse">
                                        Price
                                        <span ng-show="sortType == 'price' && !sortReverse" class="fa fa-caret-down"></span>
                                        <span ng-show="sortType == 'price' && sortReverse" class="fa fa-caret-up"></span>
                                    </a>
                                </th>
                            </tr>
                            <tr id="{{x.id}}" dir-paginate="x in res|filter:var|orderBy:sortType:sortReverse| itemsPerPage: pageSize" current-page= "currentPage">
                                <td style="padding:0px" >
                                    <input class="form-control" style="margin:0px" value="{{x.name}}" type="radio" required="required" name="plan">
                                </td>
                                <td>{{x.name}}</td>
                                <td>{{x.maximum_subscriber}}</td>
                                <td>{{x.maximum_mail}}</td>
                                <td>{{x.duration}}</td>
                                <td>{{x.price}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success" style="float:right">Activte Plan With PayPal</button>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
                <div style="float:right">
                    <dir-pagination-controls boundary-links="true"  template-url="<?php echo base_url(); ?>/template/paging/dirPagination.tpl.html"></dir-pagination-controls>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var app = angular.module('myapp1', ['angularUtils.directives.dirPagination']);
    app.controller('myctr', function($scope) {
        $scope.res = <?php echo $result; ?>;
        $scope.currentPage = 1;
        $scope.pageSize = 5;
    });
</script>
<script type="text/javascript">
    $('document').ready(function(){
        $('[name="frmPayPal1"]').submit(function(){
            var ctr = $('[name="plan"]:checked');
            var rtn = "<?php echo base_url().'index.php/user/UserPlan/activateNew/' ?>"+ctr.parent().parent().attr('id');
            $("[name='item_name']").val(ctr.parent().next().html());
            $("[name='amount']").val(ctr.parent().parent().children().last().html());
            $("[name='return']").val(rtn);
        });
    });
</script>