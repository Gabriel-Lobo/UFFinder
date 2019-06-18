<div class='inner-container'>
	<h2>Encontre sua Sala</h2>
	<form autocomplete='off' id='search-form' action='results.php' method='post'>
		<div class='autocomplete'>

			<input id='search-input' type='text' name='search' placeholder='Digite o nome ou o código da disciplina' minlength='3' maxlength='150'>
			<input class='btn btn-uffinder search-button' type='button' value='Pesquisar'>

		</div>
	</form>

	<div id='classes' class='general-container'></div>

	<a class='btn btn-uffinder btn-lg' href="<?=base_url().'rooms/new';?>">Cadastre uma Sala</a>
</div>
