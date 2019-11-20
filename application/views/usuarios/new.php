<div class="inner-container">
    <?php
    echo form_open('usuarios/create', 'class="main-form"');
    ?>

    <div class="form-group text-center">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" required>
    </div>

    <div class="form-group text-center">
        <label for="senha">Senha</label>
        <input id="senha" name="senha" type="password" required>
    </div>

    <div class="form-group text-center">
        <label for="confirmation">Confirme sua Senha</label>
        <input id="confirmation" name="confirmation" type="password" required>
    </div>

    <div>
        <button type="submit" class="btn btn-uffinder btn-lg m-1">Cadastrar</button>
    </div>

    <?php echo form_close();?>
</div>
