<?php require('application/views/template/header.php'); ?>

<div class="back0 borderRed">
	<h2 class="titlePage">{ CONNEXION ADMINISTRATEUR }</h2>
</div>

<div class="back1">
		<div id="connexionAdmin" >

			<?php echo form_open('admin/connexion'); ?>
				<input type="password" name="password" id="password" placeholder="Mot de passe" value="<?php echo set_value('password'); ?>" /><br />

				<?php echo form_error('password', '<span class="error">', '</span>'); ?>
				<?php if ( isset($error) ):?>
				<span class="error"><?php echo $error; ?></span>
				<?php endif; ?>
			<?php echo form_close(); ?>

		</div>

</div>
	
<?php require('application/views/template/footer.php') ?>