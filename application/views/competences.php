<?php require('application/views/template/header.php'); ?>

<?php $inc = 0; ?>
<?php foreach ($categories as $categorie):

	$competences = $this->admin_model->readSkill($categorie->id_catSkill);
	if (isset($competences)): ?>
		<div class="back0 <?php if($inc == 0): ?>borderRed<?php endif; ?>">	
			<section class="conteneur">
			<h3 class="catSkills"><?php echo $categorie->nom_catSkill; ?></h3>
			<?php foreach($competences as $competence): ?>
				<div class="itemSkill">
					<p class="titleSkill" >
						<?php echo img('Skills/' . $competence->logo_skill, 'Logo ' . $competence->title_skill); ?>
						<span class="skillInfos" >
							<?php echo nl2br($competence->about_skill); ?>
						</span>	
						<span class="clear"></span>
					</p>
				</div>
			<?php endforeach; ?>
			</section>
		</div>

	<?php endif; ?>
	<?php $inc++; ?>
<?php endforeach; ?>
	
<?php require('application/views/template/footer.php') ?>
