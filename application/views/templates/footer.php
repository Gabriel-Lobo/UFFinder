	<div id='footer'>
		<div id='footer-logo'>
		</div>
	</div>
	<script type="text/javascript">
    var CFG = {
        url: '<?php echo $this->config->item('base_url');?>',
        token: '<?php echo $this->security->get_csrf_hash();?>'
    };
	</script>
</body>
</html>
