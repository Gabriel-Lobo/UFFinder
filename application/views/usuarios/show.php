<div class="inner-container">
    <p><?php echo $data->email; ?></p>

    <div>
        <a class="btn btn-uffinder " href="<?=base_url().'usuarios/edit';?>">Editar</a>
        <a class="btn btn-danger " href="<?=base_url().'usuarios/destroy';?>">Apagar</a>
    </div>
</div>
