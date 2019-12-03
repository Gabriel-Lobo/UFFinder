<div class='inner-container'>
	<h2>Encontre sua Sala</h2>
    <?php echo form_open('salas/index', 'class="main-form" id="search-form"');?>
		<div class='autocomplete'>

			<input type='text' name='search' placeholder='Digite o nome ou o código da disciplina' minlength='3' maxlength='150'>
			<button type="submit" class='btn btn-uffinder search-button'>Pesquisar</button>

		</div>
    <?php echo form_close();?>

	<div id='classes' class='general-container'></div>

	<a class='btn btn-uffinder btn-lg' href="<?=base_url().'salas/new';?>">Cadastre uma Sala</a>
</div>
