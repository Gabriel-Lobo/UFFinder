<div class="inner-container">
    <?php
    if ($this->session->flashdata()):
    ?>
    <div class="alert alert-warning">
        <?= $this->session->flashdata('errors'); ?>
    </div>
    <?php
    endif;
    
    echo form_open('usuarios/update', 'class="main-form"');
    ?>

    <input id="id" name="id" type="hidden" value="<?php echo $data->id; ?>" required>

    <div class="form-group text-center">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="<?php echo $data->email; ?>" required>
    </div>

    <div>
        <button type="submit" class="btn btn-uffinder btn-lg m-1">Salvar</button>
    </div>

    <?php echo form_close();?>
</div>
