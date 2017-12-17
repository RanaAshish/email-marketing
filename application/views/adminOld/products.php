<div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i><a href="#" onclick="showadd()"> Add</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-anchor"></i><a href="#" onclick="showview()" > View</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div  id="viewform"  class="table table-responsive">
                    <div>
                        <label class="label-control">Select Category :</label>
                        <select name="category" id="cat" class="form-control">
                            <option value="">select</option>
                            <?php
                                foreach($category->result() as $val)
                                {
                                    echo "<option value=$val->id>$val->name</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <table class="table table-bordered table-striped" id="product">
                        <tr>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Category</td>
                            <td colspan="2">Operation</td>
                        </tr>
                        <?php
                            foreach ($products->result() as $val) 
                            {
                                echo "<tr>";
                                    echo "<td>$val->pname</td>";
                                    echo "<td>$val->price</td>";
                                    echo "<td>$val->qty</td>";
                                    echo "<td>";
                                    echo $val->name;
                                    echo "</td>";
                                    
                                
                        ?>   
                        <td colspan=2><a href=''  class="edit" abc='<?php echo $val->id ?>' ><i class="fa fa-paperclip"></i></a>&nbsp&nbsp<a href="<?php echo base_url()."index.php/admin/manage_product/delete/".$val->id;?>"  onclick="return confirm('Are u sure?');"><i class="fa fa-trash-o"></i></a></td>
                        
                        <?php
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </div>
                <!-- /.row -->
            <!-- Add Form-->
                <div id="addform" style="display:none;visibility:hidden">
                        <form id='f1' method="post" class="form-horizontal" action="<?php
                                    echo base_url().'index.php/admin/manage_product/insert/';
                                ?>">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="label-control">ProductName : </label>
                                <input type="text" name="pname"  id='pname'  class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <lable class="label-control">Price:</lable>
                                <input type="text" name="price"  id='price' class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <lable class="label-control">Quantity:</lable>
                                <input type="text" name="qty"  id='qty' class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <lable class="label-control">Select  Category:</lable>
                                <select name="pcat" class="form-control">
                                    <?php
                                       foreach ($category->result() as $val) 
                                       {
                                           echo "<option value=$val->id>$val->name</option>";
                                       }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-success" >Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Of Add Form-->
            <!-- /.container-fluid -->
            <!-- Edit from -->
<!--                <div class="modal fade" id="model">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                Edit Page
                            </div>
                            <div class="modal-body">
                                <form method="post" class="form-horizontal" id="edit" action="<?php                                                                                     
                                                echo base_url().'index.php/admin/manage_login/update/';
                                           ?>">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="label-control">FirstName : </label>
                                            <input type="text" name="fname" id="ftxt"  class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <lable class="label-control">LastName:</lable>
                                            <input type="text" name="lname"  id="ltxt" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <lable class="label-control">Email:</lable>
                                            <input type="text" name="email"  id="etxt" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <lable class="label-control">City:</lable>
                                            <input type="text" name="city"  id="ctxt" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-4">
                                            <input type="submit" value="Save" class="btn btn-success" />
                                        </div>
                                    </div>
                                            
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" name="close" class="btn btn-default">close</button>
                            </div>
                        </div>
                    </div>
                </div>-->
            <!-- End -->

        </div>
        <script type="text/javascript">
            function showadd()
            {
                document.getElementById('viewform').style.visibility="hidden";
                document.getElementById('viewform').style.display="none";
                document.getElementById('addform').style.visibility="visible";
                document.getElementById('addform').style.display="block";
            }

            function showview()
            {
                document.getElementById('viewform').style.visibility="visible";
                document.getElementById('viewform').style.display="block";
                document.getElementById('addform').style.visibility="hidden";
                document.getElementById('addform').style.display="none";
            }
        </script>
         <script src="<?php echo base_url(); ?>template/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>template/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $('document').ready(function()
            {
                $("#pname").val("");
                $("#price").val("");
                $("#qty").val("");
                var action="<?php echo base_url(); ?>index.php/admin/manage_product/insert/";
                $("#f1").attr("action",action);
                $(".edit").click(function()
                {
                    var id=$(this).attr("abc");
                    
                    $.ajax(
                    {
                        type : "post",
                        url : "<?php echo base_url(); ?>index.php/admin/manage_product/getrecord/"+id,

                        success : function(str)
                        {
                            var arr=str.split(",");
                            $('#addform').css({"visibility":"visible","display":"block"});
                            $('#viewform').css({"visibility":"hidden","display":"none"});
                            $("#pname").val(arr[1]);
                            $("#price").val(arr[2]);
                            $("#qty").val(arr[3]);
                            $("option[value="+arr[4]+"]").attr("selected",true);
                            var ac="<?php echo base_url(); ?>index.php/admin/manage_product/update/"+id;
                            $("#f1").attr("action",ac);

                        }
                    });
                    return false;
                });
                
                $("#cat").change(function()
                {
                    var id=$(this).val();
                    $.ajax(
                    {
                       url : "<?php echo base_url(); ?>index.php/admin/manage_product/getproductbycategory/"+id,
                       type : "post",
                       success : function(str)
                       {
                           alert(str);
                       }
                       
                    });
                });
            });
        </script>


