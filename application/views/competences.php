<?php require('application/views/template/header.php'); ?>
	
<div class="banniereSkills">
	<h3>COMPETENCES</h3>
</div>
<div class="skills">

	<div class="navCatSkills">
	<?php foreach ($categories as $categorie): ?>
		<p id="<?php echo $categorie->id_catSkill; ?>"><?php echo $categorie->nom_catSkill; ?></p>
	<?php endforeach; ?>
	</div>

	<div class="contentCatSkills">
		<?php foreach ($categories as $categorie):
			$competences = $this->admin_model->readSkill($categorie->id_catSkill);
			if (isset($competences)): ?>
					<section class="catSkills" id="section<?php echo $categorie->id_catSkill; ?>">
						<h3><?php echo $categorie->nom_catSkill; ?></h3>
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
							<?php if($this->session->userdata('logged') == true): ?>
								<p class="skillModo">
									<a href="<?php echo site_url('competences/edit/'.$competence->id_skill); ?>"><img src="<?php echo site_url(); ?>assets/images/icones/ico_edit.png" alt="Editer" /></a>
									<a class="delComp" href="<?php echo site_url('competences/delete/'.$competence->id_skill); ?>"><img src="<?php echo site_url(); ?>assets/images/icones/ico_delete.png" alt="Supprimer" /></a>
								</p>
							<?php endif; ?>	
						</div>
					<?php endforeach; ?>
					</section>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>

</div>

<script type="text/javascript">
	
	$(function(){
		// Suppression d'une compétence en AJAX
		$('.delComp').each(function() {
			$(this).on('click', function(){
				
				if( confirm('Confirmation de suppression ?') )
				{
					var url = $(this).attr('href');

					var comp = $(this).closest('div.itemSkill');

					$.getJSON(url, function(data){
						if(data.success)
						{
							$(comp).fadeOut();
						}
					});
				}

				return false;
			});
		});

		// Menu Contextuel des compétences
		$('.navCatSkills p').each(function(){
	      $(this).click(function(){
	         var ancre = '#section'+$(this).attr('id');
	         $('html, body').animate({  
	            scrollTop:$(ancre).offset().top - 50 
	         }, 'slow'); 
	         return false;
	      });
   });
	});
</script>

<?php require('application/views/template/footer.php') ?>
