<div class="inner-container">
  <p><?php echo $data->email; ?></p>

  <div class="accordion" id="accordionExample">
    <?php
    $disci_cod = '';

    foreach ($salas as $sala):
      if ($sala['disci_cod'] != $disci_cod) {
        if ($disci_cod != '') {
          echo '</div></div></div>';
        }

        echo '
        <div class="card">
          <div class="card-header" id="heading-'.$sala['disci_cod'].'">
            <a class="collapsed" data-toggle="collapse" data-target="#'.$sala['disci_cod'].'">'.$sala['disci_cod'].' - '.$sala['disci_nome'].'</a>
          </div>
          
          <div id="'.$sala['disci_cod'].'" class="card-content collapse" data-parent="#accordionExample">';
      } else {
        echo '</div>';
      }

      echo '
            <div class="card-body">
              <p>Turma: '.$sala['turma_cod'].'</p>
              <p>Campus: '.$sala['campus_nome'].'</p>
              <p>Prédio: '.$sala['predio_nome'].'</p>
              <p>Sala: '.$sala['num'].'</p>';

      $disci_cod = $sala['disci_cod'];
    endforeach;
    
    if (sizeof($salas) > 0) {
      echo '</div></div></div>';
    }
    ?>
  </div>

  <div>
    <a class="btn btn-uffinder " href="<?=base_url().'usuarios/edit';?>">Editar</a>
    <a class="btn btn-danger " href="<?=base_url().'usuarios/destroy';?>">Apagar</a>
  </div>
</div>
