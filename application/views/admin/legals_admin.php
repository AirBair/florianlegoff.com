<?php require('application/views/template/header.php'); ?>


<div class="banniereLegals">
	<h3>MENTIONS LEGALES</h3>
</div>

<div class="conteneur formUpdate">

<?php
if(validation_errors() != null): ?>
	<div class="formError">
		<h4>Erreur(s) dans la validation du formulaire :</h4>
		<?php echo validation_errors(); ?>
	</div>
<?php endif;

if($this->uri->segment(2) == 'edit')
{
	echo form_open('legals/edit/' . $rubrique->id); ?>
		<input type="text" name="rubrique" id="rubrique" value="<?php echo $rubrique->rubrique; ?>" /><br /><br />

		<textarea name="informations" id="informations"><?php echo $rubrique->informations; ?></textarea><br /><br />

		<input type="submit" value="Mettre à jour" />

	<?php echo form_close();
}
else
{
	echo form_open('legals/add'); ?>
		<input type="text" name="rubrique" id="rubrique" placeholder="Rubrique" /><br /><br />

		<textarea name="informations" id="informations" placeholder="Infos de la rubrique"></textarea><br /><br />

		<input type="submit" value="Ajouter" />

	<?php echo form_close();
}
?>
</div>



<?php require('application/views/template/footer.php') ?>