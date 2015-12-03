<?php require('application/views/template/header.php'); ?>

<div class="banniereSkills">
	<h3>CURICULUM VITAE</h3>
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
	echo form_open('cv/edit/' . $rubrique->id); ?>
		<input type="text" name="rubrique" id="rubrique" value="<?php echo $rubrique->rubrique; ?>" /><br /><br />

		<select name="section" id="section">
			<?php foreach($sections as $section): ?>
				<option value="<?php echo $section->titre; ?>" <?php if($rubrique->section == $section->titre):echo 'selected';endif; ?>><?php echo $section->titre; ?></option>
			<?php endforeach; ?>
		</select><br /><br />

		<textarea name="informations" id="informations"><?php echo $rubrique->informations; ?></textarea><br /><br />

		<input type="submit" value="Mettre à jour" />

	<?php echo form_close();
}
else
{
	echo form_open('cv/add'); ?>
		<input type="text" name="rubrique" id="rubrique" placeholder="Intitulé de la compétence" /><br /><br />

		<select name="section" id="section">
			<?php foreach($sections as $section): ?>
				<option value="<?php echo $section->titre; ?>" ><?php echo $section->titre; ?></option>
			<?php endforeach; ?>
		</select><br /><br />

		<textarea name="informations" id="informations" placeholder="Description de la compétence"></textarea><br /><br />

		<input type="submit" value="Ajouter" />
	<?php echo form_close();
}
?>
</div>

<?php require('application/views/template/footer.php') ?>
