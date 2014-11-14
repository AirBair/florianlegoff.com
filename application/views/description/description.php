<!DOCTYPE html>
<html xmlns="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" xml:lang="fr" lang="fr">
	<head>
		<title>Florian LE GOFF</title>
		<link rel="stylesheet" href="<?php echo css_url('style'); ?>" />
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
		<link rel="icon" href="favicon16.ico" />
	</head>

	<body>

	<div id="tronc"> 

	<!-- Menu général -->
	<?php require('application/views/include/navigation.php'); ?>
	<!-- Fin du menu -->

		<div id="conteneur"> <!-- Zone de contenu -->

			<div class="cadre"> <!-- Cadre principal contenant les informations sur chaque page -->

				<p class="profil"><img src="<?php echo img_url('profil.png'); ?>" alt="Profil" /></p>

				<h1>FLORIAN LE GOFF</h1>
				<p class="subtitle">Développeur Web</p>

				<p class="mini_prez">"Passionné d'informatique et de nouvelles technologies depuis toujours, je me suis auto-formé au développement web à travers ses différents langages.<br />
					C'est ainsi que de jour en jour j'enrichi mes connaissances tout en pratiquant ma passion pour le web.<br />
					J'aime réaliser des sites sobres et fonctionnels, créer différentes applications utiles au propriétaire du site ainsi qu'à ses visiteurs."</p>

			</div> <!-- Fin du cadre principal -->


			<div class="secondaire"><!-- Début du cadre secondaire --><div class="secondaireGauche">
					<h3>A Propos</h3>
					<p>Auto-didacte de 18 ans, aimant l'informatique, le basket-ball, le cinéma, la musique.<br />
						Actuellement en Terminale Scientifique dominante Science de l'ingénieur et spécialité Informatique et sciences du Numérique au Lycée Maupertuis Saint-Malo.
					</p>
				</div><!-- Fin du bloc secondaire gauche --><div class="secondaireDroit" >
					<h3>Je developpe pour vous !</h3>

					<p>Vous êtes intéressé par la création d'un site web, mais vous n'avez pas le temps ou pas les compétences nécessaires le fabriquer ?<br /><br />
						Contactez moi et nous étudierons ensemble votre projet, de la conception du site à l'hébergement, concrètement ce sont des offres complètes que je peux vous proposer.</p>
				</div> <!-- Fin du bloc secondaire droit -->

			</div> <!-- Fin du cadre secondaire -->


			<?php require('application/views/include/footer.php') ?>

		</div> <!-- Fin de la zone de contenu -->

	</div> <!--Fin du tronc de page -->
	
	<script>
		var page = document.getElementById('description');
		page.style.backgroundColor = 'rgba(0,0,0,0.3)';
	</script>
	</body>

</html>