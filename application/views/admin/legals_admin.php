<?php require('application/views/template/header.php'); ?>


<div class="banniereLegals">
	<h3>MENTIONS LEGALES</h3>
</div>

<?php
if($this->uri->segment(2) == 'edit')
{
	?>
	<div class="conteneur formUpdate">
		<?php echo form_open('legals/edit/' . $rubrique->id); ?>
			<input type="text" name="rubrique" id="rubrique" value="<?php echo $rubrique->rubrique; ?>" /><br /><br />

			<textarea name="informations" id="informations"><?php echo $rubrique->informations; ?></textarea><br /><br />

			<input type="submit" value="Mettre à jour" />

		<?php echo form_close(); ?>
	</div>
	<?php
}
else
{
	?>
	<div class="conteneur formUpdate">
		<?php echo form_open('legals/add'); ?>
			<input type="text" name="rubrique" id="rubrique" placeholder="Rubrique" /><br /><br />

			<textarea name="informations" id="informations" placeholder="Infos de la rubrique"></textarea><br /><br />

			<input type="submit" value="Ajouter" />

		<?php echo form_close(); ?>
	</div>
	<?php
}
?>



<?php require('application/views/template/footer.php') ?>