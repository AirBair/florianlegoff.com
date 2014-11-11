<?php require('application/views/template/header.php'); ?>

<div class="back0 borderRed">
	<div class="conteneur">

		<!-- PROJET A l'O de Rose -->
		<div class="projet">
			<p>
				<a href="#aloderose">
					<img src="<?php echo site_url(); ?>assets/images/projets/aloderose_min.jpg" alt="Miniature A l'o de Rose" />
				</a>
				<a href="#aloderose" class="viewProject">
					<img src="<?php echo site_url(); ?>assets/images/projets/voirPlus.png" alt="Icone voir +" /><br />
					Voir le Projet
				</a>
			</p>
					
			<h4><a href="#aloderose">A l'O de Rose</a></h4>
		</div>

		<!-- PROJET AUBIN Damien -->
		<div class="projet">
			<p>
				<a href="#damien">
					<img src="<?php echo site_url(); ?>assets/images/projets/damien_min.png" alt="Miniature quadcopter-maupertuis.fr" />
				</a>
				<a href="#damien" class="viewProject">
					<img src="<?php echo site_url(); ?>assets/images/projets/voirPlus.png" alt="Icone voir +" /><br />
					Voir le Projet
				</a>
			</p>
					
			<h4><a href="#damien">Damien AUBIN</a></h4>
		</div>

		<!-- Projet Quadcopter Maupertuis -->
		<div class="projet">
			<p>
				<a href="#quadcopter">
					<img src="<?php echo site_url(); ?>assets/images/projets/quadcopterSite_min.png" alt="Miniature quadcopter-maupertuis.fr" />
				</a>
				<a href="#quadcopter" class="viewProject">
					<img src="<?php echo site_url(); ?>assets/images/projets/voirPlus.png" alt="Icone voir +" /><br />
					Voir le Projet
				</a>
			</p>
					
			<h4><a href="#quadcopter">Quadcopter Maupertuis 2014</a></h4>
			<!--<p class="siteDescription">
				Le site de présentation et de communication d'un projet de lycéen dont je fais partie. Il recense de nombreuses informations autour de notre projet ayant pour problèmatique : "Comment réaliser plus facilement un bilan thermique ?". Nous présenatons par l'intermédiaire de ce denrier notre solution, fabrication d'un drône (quadcopter précisement).<br />
				Ce site est mon premier gros projet, développé avec le frameWorks Codeigniter. Il m'a permis d'acquérir mes premières vraies expériences dans la création web.
			</p>-->
		</div>


		<!-- Projet MathAMort -->
		<div class="projet">
			<p>
				<a href="#mathsamort">
				<img src="<?php echo site_url(); ?>assets/images/projets/isnSite_min.png" alt="Miniature maths A mort" />
				</a>
				<a href="#mathsamort" class="viewProject">
					<img src="<?php echo site_url(); ?>assets/images/projets/voirPlus.png" alt="Icone voir +" /><br />
					Voir le Projet
				</a>
			</p>
					
			<h4><a href="#mathsamort">Maths A Mort</a></h4>
		</div>

	</div> <!-- Fin du conteneur -->
</div> <!-- Fin du back0 -->

<!-- Présentation A l'O de Rose -->
<div class="back1 prezProjet" id="aloderose">
	<div class="conteneur">
		<div class="enTeteProjet">
			<p class="logoProjet">
				<img src="<?php echo site_url(); ?>assets/images/icoDeveloppeur.png" alt="Logo projet" />
			</p>
			<h2 class="titreProjet">
				A l'O de Rose<br />
				<span class="sTitreProjet">Site web E-commerce</span>
			</h2>
			<p class="closeProjet">
				<a href="close">
					<img onmouseenter="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoCloseSurvol.png')" onmouseleave="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoClose.png')" src="<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoClose.png" alt="Icone fermer le projet" />
				</a>
			</p>
		</div>
		<div class="corpsProjet" >
			<div class="diapoProjet" >
				<p>
					<img src="<?php echo site_url(); ?>assets/images/projets/ecranDiapo.png" />
				</p>
			</div>
			<div class="infosProjet" >
				<h3>Description</h3>
				<p>
					A l'O de Rose est le site e-commerce d'une petite boutique de fleurs basée à La Gouesnière (près de Saint Malo).<br />
					Le site dispose d'un espace membre pour la gestion des paniers, des commandes, etc.. Un paiement en ligne sécurisé est également disponible.
				</p>

				<h3>Détails</h3>
				<p>
					<strong>Cliente :</strong> Ludivine Jouan<br />
					<strong>Date :</strong> Décembre 2014<br />
					<strong>Webdesign :</strong> AUBIN Damien<br />
					<strong>Technologies : </strong> FrameWorks Codeigniter
				</p>
				<h3>Liens</h3>
				<p>
					<strong>Site :</strong> Pas encore disponible<br />
				</p>
			</div>
		</div>
		<div class="footProjet" >
			<p>
				<a href="#mathsamort"><img onmouseenter="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGaucheSurvol.png')" onmouseleave="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGauche.png')" src="<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGauche.png" alt="Icone fleche projet précedent" /></a>
				1/4
				<a href="#damien"><img onmouseenter="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroiteSurvol.png')" onmouseleave="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroite.png')" src="<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroite.png" alt="Icone fleche projet suivant" /></a>
			</p>
		</div>
	</div> <!-- Fin du conteneur -->
</div> <!-- Fin du back1 -->

<!-- Présentation aubindamien.com -->
<div class="back1 prezProjet" id="damien">
	<div class="conteneur">
		<div class="enTeteProjet">
			<p class="logoProjet">
				<img src="<?php echo site_url(); ?>assets/images/projets/damien/logoDam.png" alt="Logo projet" />
			</p>
			<h2 class="titreProjet">
				AUBIN Damien<br />
				<span class="sTitreProjet">Site web personnel</span>
			</h2>
			<p class="closeProjet">
				<a href="close">
					<img onmouseenter="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoCloseSurvol.png')" onmouseleave="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoClose.png')" src="<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoClose.png" alt="Icone fermer le projet" />
				</a>
			</p>
		</div>
		<div class="corpsProjet" >
			<div class="diapoProjet" >
				<p>
					<img src="<?php echo site_url(); ?>assets/images/projets/ecranDiapo.png" />
				</p>
			</div>
			<div class="infosProjet" >
				<h3>Description</h3>
				<p>
					Réalisation du site web de mon ami graphiste, modélisateur & animateur 3D.<br/>
					Il y présente ses différents projets à travers un site qu'il a imaginé selon ses besoins. Je lui ai apporté les solutions techniques pour le mettre en oeuvre.
				</p>

				<h3>Détails</h3>
				<p>
					<strong>Client :</strong> Damien AUBIN<br />
					<strong>Date :</strong> Pas encore fixe<br />
					<strong>Webdesign :</strong> AUBIN Damien<br />
					<strong>Technologies : </strong> FrameWorks Codeigniter
				</p>
				<h3>Liens</h3>
				<p>
					<strong>Site :</strong> <a href="http://aubindamien.com" target="_blank" >http://aubindamien.com</a><br />
				</p>
			</div>
		</div>
		<div class="footProjet" >
			<p>
				<a href="#aloderose"><img onmouseenter="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGaucheSurvol.png')" onmouseleave="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGauche.png')" src="<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGauche.png" alt="Icone fleche projet précedent" /></a>
				2/4
				<a href="#quadcopter"><img onmouseenter="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroiteSurvol.png')" onmouseleave="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroite.png')" src="<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroite.png" alt="Icone fleche projet suivant" /></a>
			</p>
		</div>
	</div> <!-- Fin du conteneur -->
</div> <!-- Fin du back1 -->

<!-- Présentation de quadcopter maupertuis -->
<div class="back1 prezProjet" id="quadcopter">
	<div class="conteneur">
		<div class="enTeteProjet">
			<p class="logoProjet">
				<img src="<?php echo site_url(); ?>assets/images/icoDeveloppeur.png" alt="Logo projet" />
			</p>
			<h2 class="titreProjet">
				Quadcopter Maupertuis<br />
				<span class="sTitreProjet">Projet de groupe</span>
			</h2>
			<p class="closeProjet">
				<a href="close">
					<img onmouseenter="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoCloseSurvol.png')" onmouseleave="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoClose.png')" src="<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoClose.png" alt="Icone fermer le projet" />
				</a>
			</p>
		</div>
		<div class="corpsProjet" >
			<div class="diapoProjet" >
				<p>
					<img src="<?php echo site_url(); ?>assets/images/projets/ecranDiapo.png" />
				</p>
			</div>
			<div class="infosProjet" >
				<h3>Description</h3>
				<p>
					Dans le cadre de mon projet de terminale, j'ai développé ce site pour permettre aux membres de mon groupe de communiquer ensemble ainsi qu'avec les personnes intéressées par le projet.
				</p>

				<h3>Détails</h3>
				<p>
					<strong>Client :</strong> Projet personnel de groupe<br />
					<strong>Date :</strong> Janvier - Avril 2014<br />
					<strong>Webdesign :</strong> MT<br />
					<strong>Technologies : </strong> FrameWorks Codeigniter
				</p>
				<h3>Liens</h3>
				<p>
					<strong>Site :</strong> <a href="http://quadcopter-maupertuis.fr" target="_blank" >http://quadcopter-maupertuis.fr</a><br />
				</p>
			</div>
		</div>
		<div class="footProjet" >
			<p>
				<a href="#damien"><img onmouseenter="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGaucheSurvol.png')" onmouseleave="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGauche.png')" src="<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGauche.png" alt="Icone fleche projet précedent" /></a>
				3/4
				<a href="#mathsamort"><img onmouseenter="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroiteSurvol.png')" onmouseleave="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroite.png')" src="<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroite.png" alt="Icone fleche projet suivant" /></a>
			</p>
		</div>
	</div> <!-- Fin du conteneur -->
</div> <!-- Fin du back1 -->

<!-- Présentation de maths à mort -->
<div class="back1 prezProjet" id="mathsamort">
	<div class="conteneur">
		<div class="enTeteProjet">
			<p class="logoProjet">
				<img src="<?php echo site_url(); ?>assets/images/projets/mathsamort/logoMAM.png" alt="Logo projet" />
			</p>
			<h2 class="titreProjet">
				Maths A Mort<br />
				<span class="sTitreProjet">Projet de groupe</span>
			</h2>
			<p class="closeProjet">
				<a href="close">
					<img onmouseenter="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoCloseSurvol.png')" onmouseleave="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoClose.png')" src="<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoClose.png" alt="Icone fermer le projet" />
				</a>
			</p>
		</div>
		<div class="corpsProjet" >
			<div class="diapoProjet" >
				<p>
					<img src="<?php echo site_url(); ?>assets/images/projets/ecranDiapo.png" />
				</p>
			</div>
			<div class="infosProjet" >
				<h3>Description</h3>
				<p>
					Dans le cadre d'un autre projet de terminale (Informatique et Sciences du Numérique), j'ai développé un site de jeu de mathématiques sous forme de quizz où le but est de répondre le plus rapidement possible pour obtenir un maximum de points.<br />
					C'est un projet dont le potentiel d'amélioration est encore grand.
				</p>

				<h3>Détails</h3>
				<p>
					<strong>Client :</strong> Projet personnel de groupe<br />
					<strong>Date :</strong> Avril - Mai 2014<br />
					<strong>Webdesign :</strong> AUBIN Damien<br />
					<strong>Technologies : </strong> FrameWorks Codeigniter
				</p>
				<h3>Liens</h3>
				<p>
					<strong>Site :</strong> <a href="http://maths-a-mort.florianlegoff.com" target="_blank" >http://maths-a-mort.florianlegoff.com</a><br />
				</p>
			</div>
		</div>
		<div class="footProjet" >
			<p>
				<a href="#quadcopter"><img onmouseenter="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGaucheSurvol.png')" onmouseleave="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGauche.png')" src="<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGauche.png" alt="Icone fleche projet précedent" /></a>
				4/4
				<a href="#aloderose"><img onmouseenter="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroiteSurvol.png')" onmouseleave="$(this).attr('src', '<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroite.png')" src="<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroite.png" alt="Icone fleche projet suivant" /></a>
			</p>
		</div>
	</div> <!-- Fin du conteneur -->
</div> <!-- Fin du back1 -->

<?php require('application/views/template/footer.php') ?>
