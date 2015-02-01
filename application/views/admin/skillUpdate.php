<?php require('application/views/template/header.php'); ?>

<?php require('application/views/admin/menuAdmin.php'); ?>

<div class="back0">
		<h2 class="titlePage">{ MODIFIER UNE COMPETENCE }</h2>
</div>

<div class="back1 adminSkill">
	<?php if(isset($success)): ?>
		<p class="success">Compétence Mise à Jour !</p>
	<?php endif; ?>

	<?php echo form_open('admin/competences/modif/' . $competence->id_skill); ?>
		<input type="text" name="titreSkill" id="titreSkill" placeholder="Compétence" value="<?php echo $competence->title_skill; ?>" /><br /><br />

		<input type="text" name="logoSkill" id="logoSkill" placeholder="Logo" value="<?php echo $competence->logo_skill; ?>" /><br /><br />

		<select name="catSkill" id="catSkill">
			<?php foreach ($categories as $categorie): ?>
				<option value="<?php echo $categorie->id_catSkill; ?>"><?php echo $categorie->nom_catSkill; ?></option>
			<?php endforeach; ?>
		</select><br /><br />

		<textarea name="descriptionSkill" id="descriptionSkill" placeholder="Description"><?php echo $competence->about_skill; ?></textarea><br /><br />

		<input type="submit" value="Metre à jour" />

	<?php echo form_close(); ?>
</div>


<?php require('application/views/template/footer.php') ?>