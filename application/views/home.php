<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang='en'>
<head>
	<title>UFFinder</title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
		
	<?php include 'header.php';?>

	<div id='main_container'>
		<div id='search_container'>
			<h2>Encontre sua Sala</h2>
			<form autocomplete='off' id='search_form' action='results.php' method='post'>
  			<div class='autocomplete'>

					<input id='search_input' class='form' type='text' name='search' minlength='3' maxlength='150'>
					<input type='button' value='Pesquisar'>

				</div>
			</form>

			<div id='classes' class='general_container'></div>

			<h2>ou</h2>
			<a class='button main_btn' href='classroom.php'>Cadastre uma Sala</a>
		</div>
	</div>

	<?php include 'footer.php';?>

</body>
</html>