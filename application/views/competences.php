<?php require('application/views/template/header.php'); ?>
	
<div class="banniereSkills">
	<h3>COMPETENCES</h3>
</div>
<div class="skills">

	<div class="navCatSkills">
	<?php foreach ($categories as $categorie): ?>
		<p><?php echo $categorie->nom_catSkill; ?></p>
	<?php endforeach; ?>
	</div>

	<div class="contentCatSkills">
		<?php foreach ($categories as $categorie):
			$competences = $this->admin_model->readSkill($categorie->id_catSkill);
			if (isset($competences)): ?>
					<section class="catSkills">
					<?php foreach($competences as $competence): ?>
						<div class="itemSkill">
							<p class="imgSkill">
								<?php echo img('Skills/' . $competence->logo_skill, 'Logo ' . $competence->title_skill); ?><br />
								<span class="titleSkill"><?php echo nl2br($competence->title_skill); ?></span>
							</p>
							<div class="skillInfos" >
								<span class="noteSkill">
									<?php for($i=0 ; $i<5 ; $i++):
										if($competence->note > $i)
											echo '<a class="rdExt"><span class="rdInt"></span></a>';
										else
											echo '<a class="rdExt"><span></span></a>';
									endfor; ?>
								</span>
							</div> 	
						</div>
					<?php endforeach; ?>
					</section>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>

</div>
<?php require('application/views/template/footer.php') ?>
