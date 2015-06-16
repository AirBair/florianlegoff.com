<?php require('application/views/template/header.php'); ?>

<div class="back0 borderRed">

	<div class="conteneur updateCv">
		<?php echo form_open('services/edit/' . $rubrique->id); ?>
			<input type="text" name="rubrique" id="rubrique" value="<?php echo $rubrique->titre; ?>" /><br /><br />

			<textarea name="informations" id="informations"><?php echo $rubrique->contenu; ?></textarea><br /><br />

			<input type="submit" value="Mettre à jour" />

		<?php echo form_close(); ?>
	</div>
</div>


<?php require('application/views/template/footer.php') ?>