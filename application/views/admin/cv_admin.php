<?php require('application/views/template/header.php'); ?>

<div class="banniereSkills">
	<h3>CURICULUM VITAE</h3>
</div>

<?php
if($this->uri->segment(2) == 'edit')
{
	?>
	<div class="conteneur formUpdate">
		<?php echo form_open('cv/edit/' . $rubrique->id); ?>
			<input type="text" name="rubrique" id="rubrique" value="<?php echo $rubrique->rubrique; ?>" /><br /><br />

			<select name="section" id="section">
				<?php foreach($sections as $section): ?>
					<option value="<?php echo $section->titre; ?>" <?php if($rubrique->section == $section->titre):echo 'selected';endif; ?>><?php echo $section->titre; ?></option>
				<?php endforeach; ?>
			</select><br /><br />

			<textarea name="informations" id="informations"><?php echo $rubrique->informations; ?></textarea><br /><br />

			<input type="submit" value="Metre à jour" />

		<?php echo form_close(); ?>
	</div>
	<?php
}
else
{
	?>
	<div class="conteneur formUpdate">
		<?php echo form_open('cv/add'); ?>
			<input type="text" name="rubrique" id="rubrique" placeholder="Intitulé de la compétence" /><br /><br />

			<select name="section" id="section">
				<?php foreach($sections as $section): ?>
					<option value="<?php echo $section->titre; ?>" ><?php echo $section->titre; ?></option>
				<?php endforeach; ?>
			</select><br /><br />

			<textarea name="informations" id="informations" placeholder="Description de la compétence"></textarea><br /><br />

			<input type="submit" value="Ajouter" />
		<?php echo form_close(); ?>
	</div>
	<?php
}
?>

<?php require('application/views/template/footer.php') ?>