<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Email Marketing</title>
        
        <script src="<?php echo base_url(); ?>template/admin/js/angular.min.js"></script>
        
        <link href="<?php echo base_url(); ?>template/admin/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>template/admin/css/sweetalert.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>template/admin/css/sb-admin.css" rel="stylesheet">
        <!--<link href="<?php echo base_url(); ?>template/admin/css/plugins/morris.css" rel="stylesheet">-->
        <link href="<?php echo base_url(); ?>template/admin/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <?php include_once "header.php"; ?>
                <?php include_once "left.php"; ?>
            </nav>
            <?php include_once $page . '.php'; ?>
        </div>


        <script src="<?php echo base_url(); ?>template/admin/js/plugins/morris/raphael.min.js"></script>
        <script src="<?php echo base_url(); ?>template/admin/js/dirPagination.js"></script>
        <script src="<?php echo base_url(); ?>template/admin/js/sweetalert.min.js"></script>
        <script src="<?php echo base_url(); ?>template/admin/js/jquery-1.11.0.js"></script>
        <script src="<?php echo base_url(); ?>template/admin/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>template/admin/js/script.js"></script>
        

 <!--<script src="<?php //echo base_url();  ?>template/admin/js/plugins/morris/morris.min.js"></script>-->
 <!--<script src="<?php // echo base_url();  ?>template/admin/js/plugins/morris/morris-data.js"></script>-->


    </body>
</html>