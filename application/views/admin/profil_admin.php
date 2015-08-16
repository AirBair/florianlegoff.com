<?php require('application/views/template/header.php'); ?>

<div class="banniereAbout">
	<h3>A PROPOS</h3>
</div>

<div class="formUpdate conteneur">

	<?php
	if(validation_errors() != null): ?>
		<div class="formError">
			<h4>Erreur(s) dans la validation du formulaire :</h4>
			<?php echo validation_errors(); ?>
		</div>
	<?php endif;

	echo form_open('profil/edit/' . $rubrique->id); ?>
		<textarea name="informations" id="informations"><?php echo $rubrique->texte; ?></textarea><br /><br />

		<input type="submit" value="Mettre à jour" />
	<?php echo form_close(); ?>
</div>


<?php require('application/views/template/footer.php') ?>