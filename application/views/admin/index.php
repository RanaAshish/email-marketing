<!DOCTYPE html>
<html>

    <!-- Mirrored from moltran.coderthemes.com/dark/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Oct 2015 20:15:26 GMT -->

    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width,initial-scale=1">

        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <link rel="shortcut icon" href="assets/images/favicon_1.ico">
        <title>E-mail Marketing - Admin
        </title>

        <script src="<?php echo base_url(); ?>template/admin/js/angular.min.js"></script>
        <script src="<?php echo base_url(); ?>template/admin/js/dirPagination.js"></script>
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/adminTemplate/vendor/magnific-popup/dist/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/adminTemplate/plugins/jquery-datatables-editable/datatables.css">

        <link href="<?php echo base_url(); ?>template/admin/css/sweetalert.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>template/adminTemplate/vendor/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>template/adminTemplate/css/moltran.min.css" rel="stylesheet" type="text/css" />
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
        </script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js">
        </script>
        <![endif]-->
        <script src="<?php echo base_url(); ?>template/user/js/modernizr.min.js">
        </script>
        
    </head>
    <body class="fixed-left">
        <div id="wrapper">
            <?php
            include_once 'header.php';
            ?>
            <?php
            include_once 'left.php';
            ?>
            <div class="content-page">
                <div class="content">
                <script src="<?php echo base_url(); ?>template/adminTemplate/js/moltran.min.js"></script>
                    <?php
                    include_once $page . '.php';
                    ?>
                </div>
                <footer class="footer text-right" style="text-align: right !important">
                    2015 ©Email Marketing
                </footer>
            </div>
        </div>
        <script>var resizefunc = [];
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/vendor/magnific-popup/dist/jquery.magnific-popup.min.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/plugins/jquery-datatables-editable/jquery.dataTables.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/plugins/datatables/dataTables.bootstrap.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/vendor/moment/moment.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/js/script.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/plugins/counterup/jquery.counterup.min.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/vendor/sweetalert/dist/sweetalert.min.js">
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/adminTemplate/vendor/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<!--        <script src="<?php echo base_url(); ?>template/adminTemplate/plugins/flot-chart/jquery.flot.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/plugins/flot-chart/jquery.flot.time.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/plugins/flot-chart/jquery.flot.tooltip.min.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/plugins/flot-chart/jquery.flot.resize.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/plugins/flot-chart/jquery.flot.pie.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/plugins/flot-chart/jquery.flot.selection.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/plugins/flot-chart/jquery.flot.stack.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/plugins/flot-chart/jquery.flot.crosshair.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/pages/jquery.todo.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/pages/jquery.chat.js">
        </script>
        <script src="<?php echo base_url(); ?>template/adminTemplate/pages/jquery.dashboard.js">
        </script>-->
        <script type="text/javascript">/* ==============================================
         Counter Up
         =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
    </body>

    <!-- Mirrored from moltran.coderthemes.com/dark/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Oct 2015 20:16:52 GMT -->

</html>