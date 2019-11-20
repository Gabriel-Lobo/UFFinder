<?php
if ($this->session->flashdata()):
?>
<div class="alert alert-warning">
    <?php
    foreach ($this->session->flashdata() as $flashdata) {
        print_r($flashdata);
    };
    ?>
</div>
<?php
endif;
?>

<div id='main-container'>
    <?php
	if(isset($view) && $view)
		$this->load->view($view);
	?>
</div>
