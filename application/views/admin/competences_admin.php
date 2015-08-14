<?php require('application/views/template/header.php'); ?>

<div class="banniereSkills">
	<h3>COMPETENCES</h3>
</div>

<div class="formUpdate conteneur">

<?php
if($this->uri->segment(2) == 'edit')
{
	echo form_open_multipart('competences/edit/' . $competence->id_skill); ?>
		<input type="text" name="titreSkill" id="titreSkill" placeholder="Compétence" value="<?php echo $competence->title_skill; ?>" /><br /><br />

		<input type="text" name="logoName" id="logoName" placeholder="Logo" value="<?php echo $competence->logo_skill; ?>" /><br /><br />

		<label for="logoSkill">Remplacer l'image :</label><br/>
		<input type="file" name="logoSkill" id="logoSkill" /><br /><br />

		<select name="catSkill" id="catSkill">
			<?php foreach ($categories as $categorie): ?>
				<option value="<?php echo $categorie->id_catSkill; ?>" <?php if($competence->cat_skill == $categorie->id_catSkill):echo 'selected';endif; ?>><?php echo $categorie->nom_catSkill; ?></option>
			<?php endforeach; ?>
		</select><br /><br />

		<label for="note1">1</label><input type="radio" name="note" id="note1" value="1" <?php if($competence->note == 1): echo 'checked';endif;?>/>
		<label for="note2"> - 2</label><input type="radio" name="note" id="note2" value="2" <?php if($competence->note == 2): echo 'checked';endif;?>/>
		<label for="note3"> - 3</label><input type="radio" name="note" id="note3" value="3" <?php if($competence->note == 3): echo 'checked';endif;?>/>
		<label for="note4"> - 4</label><input type="radio" name="note" id="note4" value="4" <?php if($competence->note == 4): echo 'checked';endif;?>/>
		<label for="note5"> - 5</label><input type="radio" name="note" id="note5" value="5" <?php if($competence->note == 5): echo 'checked';endif;?>/><br /><br />


		<textarea name="descriptionSkill" id="descriptionSkill" placeholder="Description"><?php echo $competence->about_skill; ?></textarea><br /><br />

		<input type="submit" value="Mettre à jour" />

	<?php echo form_close();
}
else
{
	echo form_open_multipart('competences/add'); ?>
		<input type="text" name="titreSkill" id="titreSkill" placeholder="Compétence" /><br /><br />

		<input type="text" name="logoName" id="logoName" placeholder="Logo" /><br /><br />

		<label for="logoSkill">Logo :</label><br/>
		<input type="file" name="logoSkill" id="logoSkill" /><br /><br />

		<select name="catSkill" id="catSkill">
			<?php foreach ($categories as $categorie): ?>
				<option value="<?php echo $categorie->id_catSkill; ?>"><?php echo $categorie->nom_catSkill; ?></option>
			<?php endforeach; ?>
		</select><br /><br />

		<label for="note1">1</label><input type="radio" name="note" id="note1" value="1" />
		<label for="note2"> - 2</label><input type="radio" name="note" id="note2" value="2" />
		<label for="note3"> - 3</label><input type="radio" name="note" id="note3" value="3" />
		<label for="note4"> - 4</label><input type="radio" name="note" id="note4" value="4" />
		<label for="note5"> - 5</label><input type="radio" name="note" id="note5" value="5" /><br /><br />


		<textarea name="descriptionSkill" id="descriptionSkill" placeholder="Description"></textarea><br /><br />

		<input type="submit" value="Ajouter" />

	<?php echo form_close();
}
?>

	


</div>


<?php require('application/views/template/footer.php') ?>