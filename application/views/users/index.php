<div class='container bg-white'>
    <div class='table-responsive-xl'>
        <table class='table table-bordered table-striped'>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Ações</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $user): ?>
                    <tr>
                        <td class='panel-actions'>
                            <?php echo form_open('users/edit', 'class="d-table-cell"');?>
                                <input id="id" name="id" type="hidden" value="<?php echo $user['id']; ?>" required>
                                <button type="submit" class="btn btn-success m-1"><i class="fas fa-edit"></i></button>
                            <?php echo form_close();?>

                            <?php echo form_open('users/destroy', 'class="d-table-cell"');?>
                                <input id="id" name="id" type="hidden" value="<?php echo $user['id']; ?>" required>
                                <button type="submit" class="btn btn-danger m-1"><i class="fas fa-trash-alt"></i></button>
                            <?php echo form_close();?>
                        </td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php echo $pagination ?>
</div>
