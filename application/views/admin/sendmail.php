<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Email 
                        </h1>
                    </div>
                </div>
<div class="">
    <form class="form-horizontal" method="post" action="<?php echo base_url()."index.php/admin/sendEmail/send"?>">
        <div class="form-group">
            <div class="col-sm-12">
                <label class="label-control">From : </label>
                <input type="text" name="from"  id='from'  class="form-control"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <label class="label-control">Name : </label>
                <input type="text" name="name"  id='name'  class="form-control"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <lable class="label-control">To : </lable>
                <input type="text" name="to"  id='to' class="form-control"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <lable class="label-control">Subject : </lable>
                <input type="text" name="sub"  id='sub' class="form-control"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <lable class="label-control">Content : </lable>
                <textarea name="content" class="form-control" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group">
            
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary" >send</button>
            </div>
        </div>
        <?php
            echo $captcha['image'];
        ?>
    </form>
</div>
         </div>
</div>