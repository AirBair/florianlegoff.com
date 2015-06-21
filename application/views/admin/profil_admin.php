<?php require('application/views/template/header.php'); ?>

<div class="banniereAbout">
	<h3>A PROPOS</h3>
</div>

<div class="formUpdate conteneur">
	<?php echo form_open('profil/edit/' . $rubrique->id); ?>
		<textarea name="informations" id="informations"><?php echo $rubrique->texte; ?></textarea><br /><br />

		<input type="submit" value="Mettre à jour" />
	<?php echo form_close(); ?>
</div>


<?php require('application/views/template/footer.php') ?>