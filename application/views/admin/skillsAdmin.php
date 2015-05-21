<?php require('application/views/template/header.php'); ?>

<?php require('application/views/admin/menuAdmin.php'); ?>

<div class="back0">
		<h2 class="titlePage">{ AJOUTER UNE COMPETENCE }</h2>
</div>

<div class="back1 adminSkill">
	<?php echo form_open_multipart('admin/competences'); ?>
		<input type="text" name="titreSkill" id="titreSkill" placeholder="Compétence" /><br /><br />

		<input type="text" name="logoName" id="logoName" placeholder="Logo" /><br /><br />

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

	<?php echo form_close(); ?>
</div>



<div class="back0">
		<h2 class="titlePage">{ MODIFIER UNE COMPETENCE }</h2>
</div>

<div class="back1 adminSkill">
	<?php foreach ($categories as $categorie): ?>
		<h4><?php echo $categorie->nom_catSkill; ?></h4>
		<?php
		$competences = $this->admin_model->readSkill($categorie->id_catSkill);
		if (isset($competences))
		{ 
			?><ul>
			<?php foreach($competences as $competence): ?>
				<li><a href="<?php echo site_url('admin/competences/modif/' . $competence->id_skill); ?>"><?php echo $competence->title_skill; ?></a>
			<?php endforeach; ?>
			</ul><?php
		}
		else
		{
			?><ul>
				<li>Aucune compétence</li>
			</ul><?php
		}
		?>
	<?php endforeach; ?>
</div>

<?php if(isset($success)): ?>
	<script type="text/javascript">
		alert('Compétence ajoutée !');
	</script>
<?php endif; ?>

<?php require('application/views/template/footer.php') ?>