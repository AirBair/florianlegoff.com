<?php require('application/views/template/header.php'); ?>



<div id="connexionAdmin" class="conteneur">

	<h3>ESPACE ADMINISTRATEUR</h3>

	<?php echo form_open('admin/connexion'); ?>
		<input type="password" name="password" id="password" placeholder="Mot de passe" value="<?php echo set_value('password'); ?>" autofocus /><br />

		<?php echo form_error('password', '<span class="error">', '</span>'); ?>
		<?php if ( isset($error) ):?>
		<span class="error"><?php echo $error; ?></span>
		<?php endif; ?>
	<?php echo form_close(); ?>

</div>
	
<?php require('application/views/template/footer.php') ?>