<div class="container" ng-cloak="" ng-app="myapp1"  ng-controller="myctr" >
    <div class="panel panel-default">
        <div class="panel-heading">Group Information</div>
        <div class="panel-body">
            
            <button type="button" class="btn btn-primary waves-effect waves-light" id="add">Add &nbsp;&nbsp;<i class="fa fa-plus"></i></button>
            <br/>
            
<div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form method="post" id="addform" class="form-inline" action="<?php echo base_url()."index.php/user/manageGroup/create"; ?>">
<!--<div id="delete-modal" class="modal fade">-->
	<div  class="modal-dialog">
	<div class="modal-content p-0 b-0">
		<div class="panel panel-color panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Add New</h3> 
		</div> 
		<div class="panel-body"> 
                    <p>
                    <div class="form-group">
                       <label for="email">Group Name:</label>
                       <input type="text" class="form-control" name="txtname" required="">
                   </div>
                   <div class="form-group">
                       <label for="pwd">Description:</label>
                       <input type="text" class="form-control" name="txtdesc">
                   </div>
                    <br/>
                    <br/>
                </p>
			<div class="modal-footer"> 
                            <br/>
                            <button type="submit" class="btn btn-success btn-custom waves-effect">Save</button> 
				<button type="button" class="btn btn-info waves-effect waves-light" id="mdel" name="del" data-dismiss="modal">Cancel</button> 
			</div>
		</div>

		</div>
	</div><!-- /.modal-content -->

	</div><!-- /.modal-dialog -->
    </form>
</div>
            <br/>
            <div class="table table-responsive" id="group" ng-cloak="">
                <table class="table table-bordered table-striped" ng-if="res.length != 0">
                    <tr>
                        <td colspan="5">
                            <input type="text" class="form-control" style="width:25%;float:left;" placeholder="Search" value="India" ng-model="var">
                            <input type="number" min="1"  max="25" class="form-control" style="width:8%; float:right" placeholder="Search" ng-model="pageSize"/>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <a href="#" ng-click="sortType = 'name';
                                    sortReverse = !sortReverse">
                                Group Name
                                <span ng-show="sortType == 'name' && !sortReverse" class="fa fa-caret-down"></span>
                                <span ng-show="sortType == 'name' && sortReverse" class="fa fa-caret-up"></span>
                            </a>
                        </th>
                        <th>
                            <a href="#" ng-click="sortType = 'description';
                                    sortReverse = !sortReverse">
                                Description 
                                <span ng-show="sortType == 'description' && !sortReverse" class="fa fa-caret-down"></span>
                                <span ng-show="sortType == 'description' && sortReverse" class="fa fa-caret-up"></span>
                            </a>
                        </th>
                        <th>
                            <a href="#" ng-click="sortType = 'creationTime';
                                    sortReverse = !sortReverse">
                                Date 
                                <span ng-show="sortType == 'creationTime' && !sortReverse" class="fa fa-caret-down"></span>
                                <span ng-show="sortType == 'creationTime' && sortReverse" class="fa fa-caret-up"></span>
                            </a>
                        </th>
                        <th>Actions</th>
                    </tr>
                    <tr dir-paginate="x in res|filter:var|orderBy:sortType:sortReverse| itemsPerPage: pageSize" current-page= "currentPage">
                        <td>{{x.name}}</td>
                        <td>{{x.description}}</td>
                        <td>{{x.creationTime}}</td>
                        <td><a href="" title="Edit" class="edit" id="{{x.id}}"><span class="fa fa-pencil"></span></a>&nbsp;
                            <a class="delete" title="Delete" href="<?php echo base_url() . 'index.php/user/manageGroup/delete/'; ?>{{x.id}}"><span class="fa fa-trash-o"></span></a>&nbsp;
							<a href="" class="info" title="Subscriber" id="{{x.id}}"><span class="fa fa-user-md"></span></a>
						</td>
                    </tr>

                </table>
                <div class="alert alert-info" ng-if="res.length == 0">
                    No available Group
                </div>
                <div style="float:right">
                    <dir-pagination-controls boundary-links="true"  template-url="<?php echo base_url(); ?>/template/paging/dirPagination.tpl.html"></dir-pagination-controls>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form method="post" id="editform" class="form-inline" action="<?php echo base_url()."index.php/user/edit"; ?>">
		<div  class="modal-dialog">
			<div class="modal-content p-0 b-0">
				<div class="panel panel-color panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Edit Record</h3> 
					</div> 
					<div class="panel-body"> 
						<p>
							<div class="form-group">
							   <label for="email">Group Name:</label>
							   <input type="text" class="form-control" name="uptxtname" required="">
							</div>
							<div class="form-group">
							   <label for="pwd">Description:</label>
							   <input type="text" class="form-control" name="uptxtdesc" required="">
							</div>
							<br/>
							<br/>
						</p>
						<div class="modal-footer"> 
							<br/>
							<button type="submit" class="btn btn-success btn-custom waves-effect">Save</button> 
							<button type="button" class="btn btn-info waves-effect waves-light" id="mdel" name="del" data-dismiss="modal">Cancel</button> 
						</div>
					</div>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
    </form>
</div>

<div id="info-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; ">
	<div  class="modal-dialog">
		<div class="modal-content p-0 b-0">
			<div class="panel panel-color panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Subscriber of Group</h3> 
				</div>
				<div class="panel-body" style="max-height:500px;overflow:scroll"> 
					<p id="info-content">
					</p>
					<div class="modal-footer"> 
						<br/>
						<button type="button" class="btn btn-info waves-effect waves-light" id="mdel" name="del" data-dismiss="modal">Cancel</button> 
					</div>
				</div>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
    var app = angular.module('myapp1', ['angularUtils.directives.dirPagination']);
    app.controller('myctr', function ($scope) {
    $scope.res = <?php echo $result; ?>;
        $scope.currentPage = 1;
        $scope.pageSize = 10;
    });
    
    $(document).ready(function()
    {
        $("#add").on("click",function()
        {
            $("#add-modal").modal();
        });
        $("#group").on("click",".edit",function()
        {
            $("#edit-modal").modal();
            var id=$(this).attr("id");
            $("[name='uptxtname']").val($(this).parent().siblings("td").html());
            $("[name='uptxtdesc']").val($(this).parent().siblings("td").next().html());
            var action="<?php echo base_url(); ?>index.php/user/manageGroup/edit/"+id;
            $("#editform").attr("action",action);
            return false;
        });
		$("#group").on("click",".info",function()
        {
            var id=$(this).attr("id");
            $.ajax({
				url : "<?php echo base_url().'index.php/user/manageGroup/getSubscriber/' ?>"+id,
				success:function(str)
				{
					$("#info-content").html(str);
					$("#info-modal").modal();
				}
			});
            return false;
        });
    });
</script>