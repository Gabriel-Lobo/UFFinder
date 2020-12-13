<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang='en'>
<head>
	<title>UFFinder</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo assets_url(); ?>css/all.css">
	<link rel='stylesheet' type="text/css" href='<?php echo assets_url(); ?>css/style.css'>
</head>
<body>
	<div class='navbar'>
		<a class='logo navbar-brand' href='<?=base_url()?>'></a>
		<div>
			<?php
			if ($this->session->userdata('logged_in') && $this->session->userdata('is_admin')) {
			?>
				<a class="btn btn-uffinder" href="<?=base_url().'usuarios';?>">Painel</a>
				<a class="btn btn-uffinder" href="<?=base_url().'login/logout';?>">Logout</a>
			<?php
			} elseif ($this->session->userdata('logged_in')) {
			?>
				<a class="btn btn-uffinder" href="<?=base_url().'usuarios/show';?>">Meus Dados</a>
				<a class="btn btn-uffinder" href="<?=base_url().'login/logout';?>">Logout</a>
			<?php
			} else {
			?>
				<a class="btn btn-uffinder" href="<?=base_url().'login';?>">Entrar</a>
				<a class="btn btn-uffinder" href="<?=base_url().'usuarios/new';?>">Cadastre-se</a>
			<?php
			}
			?>
		</div>
	</div>
