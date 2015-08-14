<?php require('application/views/template/header.php'); ?>

<div class="banniereProjets">
	<h3>PROJETS</h3>
</div>
<div class="grilleProjets conteneur">
	<?php foreach ($projets as $projet): ?>
		<div class="projet">
			<p>
				<a href="#<?php echo $projet->attribut_projet; ?>">
				<img src="<?php echo site_url(); ?>assets/images/projets/<?php echo $projet->attribut_projet; ?>/<?php echo $projet->attribut_projet; ?>_300px.jpg" alt="Miniature <?php echo $projet->titre_projet; ?>" />
				</a>
				<a href="#<?php echo $projet->attribut_projet; ?>" class="viewProject">
					<img src="<?php echo site_url(); ?>assets/images/icones/ico_seeProject.png" alt="Icone voir +" /><br />
					Voir le Projet
				</a>
			</p>
					
			<h4><a href="#<?php echo $projet->attribut_projet; ?>"><?php echo $projet->titre_projet; ?></a></h4>
			
		</div>
	<?php endforeach; ?>
</div> <!-- Fin du conteneur -->

<?php foreach ($projets as $projet): ?>

<div class="prezProjet" id="<?php echo $projet->attribut_projet; ?>">

	<?php if($this->session->userdata('logged')): ?>
		<p class="modoProjet">
			<a href="<?php echo site_url('projets/edit/'.$projet->attribut_projet); ?>"><img src="<?php echo site_url(); ?>assets/images/icones/ico_edit.png" alt="Editer" /></a>
			<a href="<?php echo site_url('projets/delete/'.$projet->attribut_projet); ?>" onclick="return confirm('Confirmation de suppresion ?'); "><img src="<?php echo site_url(); ?>assets/images/icones/ico_delete.png" alt="Supprimer" /></a>
		</p>
	<?php endif; ?>

	<div class="enTeteProjet">
		<h2 class="titreProjet">
			<?php echo $projet->titre_projet; ?><br />
			<span class="sTitreProjet"><?php echo $projet->sousTitre_projet; ?></span>
		</h2>
		<!--<p>
			<a href="#<?php echo $projet->prev_projet; ?>"><img class="flecheG" src="<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGauche.png" alt="Icone fleche projet précedent" /></a>
			<?php echo $projet->position_projet; ?>/<?php echo $nbProjets; ?>
			<a href="#<?php echo $projet->next_projet; ?>"><img class="flecheD" src="<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroite.png" alt="Icone fleche projet suivant" /></a>
		</p>-->
		<div class="diapoProjet" >
			<p>
				<img src="<?php echo site_url(); ?>assets/images/projets/<?php echo $projet->attribut_projet; ?>/<?php echo $projet->attribut_projet; ?>_1300px.jpg" alt="Fenetre comportant les screens du site" />
			</p>
		</div>
	</div> <!-- Fin de l'entête -->

	<div class="corpsProjet" >
		<div class="descriptionProjet" >
			<h3>DESCRIPTION</h3>
			<p>
				<?php echo nl2br($projet->description_projet); ?>
			</p>
		</div>
		<div class="detailsProjet">
			<h3>DETAILS</h3>
			<p>
				<span>
					<strong>Cliente</strong>
					<?php echo $projet->client_projet; ?>
				</span>
				<span>
					<strong>Date</strong>
					<?php echo $projet->date_projet; ?></span>
				<span>
					<strong>Webdesign</strong>
					<?php echo $projet->webdesign_projet; ?></span>
				<span>
					<strong>Technologies</strong> 
					<?php echo $projet->technologies_projet; ?>
				</span>
			</p>
		</div>
	</div> <!-- Fin du corps -->
			
	<div class="footProjet" >
		<h3>Liens</h3>
		<p>
			<?php echo $projet->url_projet; ?><br />
		</p>
	</div><!-- Fin du footer -->
</div> <!-- Fin du back1 -->

<?php endforeach; ?>

<script type="text/javascript">
	$(function(){

		$('.prezProjet .closeProjet .redClose').each(function(){
			$(this).hide();
		});

		$('.prezProjet .closeProjet a').each(function(){

			$(this).mouseenter(function(){
         		$(this).find('.blackClose').fadeOut(100);
         		$(this).find('.redClose').fadeIn(100);
         	});

         	$(this).mouseleave(function(){
         		$('.prezProjet .closeProjet a .blackClose').fadeIn(100);
         		$('.prezProjet .closeProjet a .redClose').fadeOut(100);
         	});
		});
</script>

<?php require('application/views/template/footer.php') ?>
