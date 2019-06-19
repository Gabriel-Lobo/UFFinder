<div class="inner-container">
    <?php
    if ($this->session->flashdata()):
    ?>
    <div class="alert alert-warning">
        <?= $this->session->flashdata('errors'); ?>
    </div>
    <?php
    endif;
    
    echo form_open('rooms/create', 'class="main-form"');
    ?>

    <div class="form-group text-center">
        <label for="discipline">Disciplina</label>
        <select class="form-control" id="discipline" name="discipline" required>
            <?php foreach ($data as $discipline): ?>
                <option><?php echo $discipline['cod'].' - '.$discipline['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group text-center">
        <label for="password">Turma</label>
        <input id="password" name="password" type="password" required>
    </div>

    <div class="form-group text-center">
        <label for="confirmation">Sala</label>
        <input id="confirmation" name="confirmation" type="password" required>
    </div>

    <div>
        <button type="submit" class="btn btn-uffinder btn-lg m-1">Cadastrar</button>
    </div>

    <?php echo form_close();?>
</div>
