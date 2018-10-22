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
	<link href="<?php echo base_url('assetsOLAS/css/custom.css'); ?>" rel="stylesheet">

	<script src = "<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>	
	<script src = "<?php echo base_url('assetsOLAS/js/marc-reader.js'); ?>"></script>

	<script src = "<?php echo base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
	
</head>

<body>

<?php
	if($this->session->has_userdata('isLoggedIn')){
		if($this->session->has_userdata('isLibrarian')){
			include("MenuLibrarian.php");
		}else{
			include("Menu.php");
		}
	}
	if(strToLower(uri_string()) != 'librarian/login'){
		include("TopBarpatron.php");
	}
?>
<main class="main-container">