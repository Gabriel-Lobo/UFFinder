<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang='en'>
<head>
	<title>UFFinder</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel='stylesheet' type="text/css" href='<?php echo assets_url(); ?>css/style.css'>
</head>
<body>
	<div class='navbar'>
		<a class='logo navbar-brand' href='<?=base_url()?>'></a>
		<div>
			<?php
			if ($this->session->userdata('logged_in') && $this->session->userdata('is_admin')) {
			?>
				<a class="btn btn-uffinder " href="<?=base_url().'users';?>">Painel</a>
				<a class="btn btn-uffinder " href="<?=base_url().'login/logout';?>">Logout</a>
			<?php
			} elseif ($this->session->userdata('logged_in')) {
			?>
				<a class="btn btn-uffinder " href="<?=base_url().'users/show';?>">Meus Dados</a>
				<a class="btn btn-uffinder " href="<?=base_url().'login/logout';?>">Logout</a>
			<?php
			} else {
			?>
				<a class="btn btn-uffinder " href="<?=base_url().'login';?>">Entrar</a>
				<a class="btn btn-uffinder " href="<?=base_url().'users/new';?>">Cadastre-se</a>
			<?php
			}
			?>
		</div>
	</div>
