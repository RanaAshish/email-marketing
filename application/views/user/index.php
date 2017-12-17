<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <link rel="shortcut icon" href="images/favicon_1.ico">
        <title>Email Marketing</title>
        <?php include_once 'headercss.php'; ?>
    </head>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <?php include_once "header.php"; ?>
            <?php include_once 'leftMenu.php';?>
            <div class="content-page">
                <div class="content">
                    <?php include_once "$page.php"; ?>
                </div>
            <?php include_once "footer.php"; ?>
            </div>
        </div>
        <?php include_once 'footerscript.php'; ?>
    </body>
</html>