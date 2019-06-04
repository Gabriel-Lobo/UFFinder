<div class="inner-container">
    <?php
    if ($this->session->flashdata()):
    ?>
    <div class="alert alert-warning">
        <?= $this->session->flashdata('errors'); ?>
    </div>
    <?php
    endif;
    
    echo form_open('users/create', 'class="main-form"');
    ?>

    <div class="form-group text-center">
        <label for="name">Nome</label>
        <input id="name" name="name" type="text" required>
    </div>

    <div class="form-group text-center">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" required>
    </div>

    <div class="form-group text-center">
        <label for="password">Senha</label>
        <input id="password" name="password" type="password" required>
    </div>

    <div class="form-group text-center">
        <label for="confirmation">Confirme sua Senha</label>
        <input id="confirmation" name="confirmation" type="password" required>
    </div>

    <div>
        <button type="submit" class="btn btn-uffinder btn-lg m-1">Entrar</button>
    </div>

    <?php echo form_close();?>
</div>