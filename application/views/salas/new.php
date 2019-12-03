<div class="inner-container">
    <?php
    if ($this->session->flashdata()):
    ?>
    <div class="alert alert-warning">
        <?= $this->session->flashdata('errors'); ?>
    </div>
    <?php
    endif;
    
    echo form_open('salas/create', 'class="main-form"');
    ?>

    <div class="form-group text-center">
        <label for="disciplinas">Disciplina</label>
        <select class="form-control" id="disciplinas" name="disciplinas" required>
            <?php foreach ($disciplinas as $disciplina): ?>
                <option data-id="<?php echo $disciplina['id']?>"><?php echo $disciplina['cod'].' - '.$disciplina['nome']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group text-center">
        <label for="turma">Turma</label>
        <select class="form-control" id="turma" name="turma" required>
        </select>
    </div>

    <div class="form-group text-center">
        <label for="campus">Campus</label>
        <input id="campus" name="campus" type="text" required>
    </div>

    <div class="form-group text-center">
        <label for="predio">Prédio</label>
        <input id="predio" name="predio" type="text" required>
    </div>

    <div class="form-group text-center">
        <label for="sala">Sala</label>
        <input id="sala" name="sala" type="text" required>
    </div>

    <div>
        <button type="submit" class="btn btn-uffinder btn-lg m-1">Cadastrar</button>
    </div>

    <?php echo form_close();?>

    <script type="text/javascript" src='<?php echo assets_url(); ?>js/script.js'></script>

    <script type="text/javascript">
        getTurmas("<?=base_url().'turmas/index';?>");
    </script>
</div>
