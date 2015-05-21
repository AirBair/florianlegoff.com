<?php require('application/views/template/header.php'); ?>

<?php require('application/views/admin/menuAdmin.php'); ?>

<div class="back0">
		<h2 class="titlePage">{ MODIFIER UNE COMPETENCE }</h2>
</div>

<div class="back1 adminSkill">
	<?php if(isset($success)): ?>
		<p class="success">Compétence Mise à Jour !</p>
	<?php endif; ?>

	<?php echo form_open_multipart('admin/competences/modif/' . $competence->id_skill); ?>
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

		<input type="submit" value="Metre à jour" />

	<?php echo form_close(); ?>
</div>


<?php require('application/views/template/footer.php') ?>