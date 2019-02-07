<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
	<meta name="keywords" content="grid, layout">

	<title>OLAS</title>

	<link href="<?php echo base_url('assets/css/core.min.css' ); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/app.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/style.min.css'); ?>" rel="stylesheet">
	
	<link href="<?php echo base_url('assetsOLAS/css/print.css'); ?>" rel="stylesheet" media="print">
	<link href="<?php echo base_url('assetsOLAS/css/custom.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assetsOLAS/css/customnat.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('assetsOLAS/css/style.css'); ?>" rel="stylesheet">

	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('assetsOLAS/img/icons/android-icon-192x192.png'); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assetsOLAS/img/icons/apple-icon-180x180.png'); ?>">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assetsOLAS/img/icons/apple-icon-152x152.png'); ?>">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('assetsOLAS/img/icons/apple-icon-144x144.png'); ?>">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assetsOLAS/img/icons/apple-icon-120x120.png'); ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assetsOLAS/img/icons/apple-icon-114x114.png'); ?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assetsOLAS/img/icons/favicon-96x96.png'); ?>">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assetsOLAS/img/icons/apple-icon-76x76.png'); ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assetsOLAS/img/icons/apple-icon-72x72.png'); ?>">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('assetsOLAS/img/icons/apple-icon-60x60.png'); ?>">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assetsOLAS/img/icons/apple-icon-57x57.png'); ?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assetsOLAS/img/icons/favicon-32x32.png'); ?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assetsOLAS/img/icons/favicon-16x16.png'); ?>">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url('assetsOLAS/img/icons/ms-icon-144x144.png'); ?>">
	<meta name="theme-color" content="#ffffff">

	<script src = "<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>	
	<script src = "<?php echo base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js'); ?>"></script>

	<script src = "<?php echo base_url('assetsOLAS/js/marc-reader.js'); ?>"></script>	
	<script src = "<?php echo base_url('assetsOLAS/js/custom.js'); ?>"></script>	
	
</head>

<body>
<div class="preloader">
	<div class="spinner-dots">
		<span class="dot1" style="background-color:#ff4e4e;"></span>
		<span class="dot2" style="background-color:#000000;"></span>
		<span class="dot3" style="background-color:#ff4e4e;"></span>
		<span class="dot4" style="background-color:#ff4e4e;"></span>	
		<h5><text style='color:#ff4e4e; font-family: Century Gothic; letter-spacing: 5px;'>O<text style='color:#000000; font-weight: bold;'>L</text>AS</text></h5>
	</div>
</div>
<?php
	if($this->session->has_userdata('isLoggedIn')){
		if($this->session->has_userdata('isLibrarian')){//librarian
			include("MenuLibrarian.php");
			include("TopBarLibrarian.php");
		}else{//patron
			include("TopBarPatron.php");
			// include("Menu.php");
		}
	}else{// not logged in
		if(strToLower(uri_string()) != 'librarian/login'){
			include("TopBar.php");
		}
	}
?>
<main class="main-container">
<?php 
	if(strToLower(uri_string()) != 'librarian/login'){
		include("Search.php");
	}
?>