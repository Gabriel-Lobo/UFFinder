<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang='en'>
<head>
	<title>UFFinder</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel='stylesheet' type="text/css" href='<?php echo assets_url(); ?>css/style.css'>
</head>
<body>
	<div class='navbar'>
		<a class='logo navbar-brand' href='index.php'></a>
		<div>
			<?php
				if (!$this->session->userdata('logged_in')) {
			?>
					<a class="btn button" href="<?=base_url().'login';?>">Entrar</a>
					<a class="btn button" href="<?=base_url().'register';?>">Cadastre-se</a>
			<?php
				} else {
			?>
					<a class="btn button" href="<?=base_url().'login/logout';?>">Logout</a>
			<?php
				}
			?>
		</div>
	</div>
