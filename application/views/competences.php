<?php require('application/views/template/header.php'); ?>

<div class="banniereSkills">
	<h3>COMPETENCES</h3>
</div>
<div class="skills">

	<p class="openNavCatSkills"><img src="<?php echo site_url(); ?>assets/images/icones/flecheMenu_droit.png" alt="Flèche déroulante" /></p>

	<div class="navCatSkills">
		<p id="sideBar"><img src="<?php echo site_url(); ?>assets/images/icones/flecheMenu_gauche.png" alt="Flèche déroulante" /></p>
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

		/**** Menu Déroulant ****/

		// Effet au survol
		$('.openNavCatSkills').mouseenter(function(){
			$(this).animate({paddingLeft: "20px"},70);
		});

		$('.openNavCatSkills').mouseleave(function(){
			$(this).animate({paddingLeft: "0px"},70);
		});

		// Ouverture au clic
		$('.openNavCatSkills').click(function(){
			$(this).hide();
			$('div.navCatSkills').slideDown(100);
		});

		// Fermeture au clic
   		$('p#sideBar').click(function(){
			$('div.navCatSkills').slideUp(150);
			$('.openNavCatSkills').show();
		});

		// Suivi du menu dans la page
		function navComp(){
			var cible = $('.banniereSkills').innerHeight() - $(window).scrollTop();
     		if (cible <= 0)
     		{
				$('.navCatSkills').css('top', '0px');
        		$('.openNavCatSkills').css('top', '0px')
									  .css('padding-top', (window.innerHeight-$('footer').innerHeight())/2);
         	}
         	else
         	{
         		$('.navCatSkills').css('top', cible+'px');
         		$('.openNavCatSkills').css('top', cible+'px')
									  .css('padding-top', (window.innerHeight-cible-$('footer').innerHeight())/2);
         	}
		}

		// Initialisation du menu
		navComp();
		// Mise à jour du menu lors du scroll
		$(window).scroll(function() {
			navComp();
   		});

		// Scroll à la section demandée
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
