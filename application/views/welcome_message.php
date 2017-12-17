<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="shortcut icon" href="images/favicon_1.ico">
		<title>Email Marketing</title>
		<link href="<?php echo base_url(); ?>template/home/css/bootstrap.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>template/home/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url(); ?>template/home/css/material-design-iconic-font.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>template/user/css/style.css" rel="stylesheet">
                <link href="<?php echo base_url(); ?>template/user/css/helper.css" rel="stylesheet" type="text/css" />  
		<style>
			body
			{
				background: #F5F5F5 none repeat scroll 0% 0%;
				margin: 0px;
			}
			.wrapper
			{
/*				height: 100%;
				overflow: hidden;
				width: 100%;
				box-sizing: border-box;
				outline: medium none !important;
*/			}
			.top-bar
			{
				background: #FFF none repeat scroll 0% 0%;
				box-shadow: 1px 0px 3px 0px rgba(0, 0, 0, 0.2);
				left: 0px;
				position: fixed;
				right: 0px;
				top: 0px;
				padding: 0px;
				z-index: 999;
			}
			.logo
			{
				color: #000 !important;
				font-size: 18px !important;
				font-weight: 700;
				line-height: 70px;
				text-transform: uppercase;
			}
			.logo i
			{
				color: #EE6E73;
				font-size: 30px !important;
				margin-right: 5px;
			}
			.menu
			{
				position: fixed;
				color:#000 !important;
				font-size: 15px;
				font-weight: 700;
				line-height: 70px;
				text-transform: uppercase;
			}
			.menu-item
			{
				float: left;
				position: relative;
				padding-left: 15px;
				padding-right: 15px;

			}
		</style>
	</head>
	<body class="widescreen">
		<div class="wrapper">
			<?php include_once 'menu.php' ?>
                    <div class="content-page" style="margin: 0px;min-height: auto">
                        <div class="content">
					<?php include_once "$page.php" ?>
				</div>
                                <div class="footer" style="text-align:right;">
					2015 <i class="fa fa-copyright"></i>Copyright
				</div>
			</div>
		</div>
	</body>
	<script src="<?php echo base_url(); ?>template/home/js/jquery-1.11.0.js"></script>
	<script src="<?php echo base_url(); ?>template/home/js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>template/home/js/bootstrap.min.js"></script>
</html>