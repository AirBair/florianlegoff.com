<?php require('application/views/template/header.php'); ?>

<div class="back0 borderRed">
	<div class="contAboutMe">
		<h3 class="titleAboutMe">A PROPOS</h3>
		<p class="imgAboutMe">
			<img src="<?php echo site_url(); ?>assets/images/picMoi.jpg" alt="Photo Florian LE GOFF" />
		</p>
		<p class="aboutMe">
			<span class="aboutName">Florian LE GOFF</span><br />
			<span class="aboutTitle">Developpeur Web</span><br /><br />
			Développeur web en freelance (auto-entrepreneur) et autodidacte de 18 ans sur Saint-Malo et Lannion.<br/>
			Je passionné d'informatique et de nouvelles technologies depuis toujours, je me suis auto-formé au développement web à travers ses différents langages.<br /><br />
			C'est ainsi que de jour en jour, j'enrichis mes connaissances tout en pratiquant ma passion pour le web.<br />
			Je porte également un point d'honneur au respect de la vie privée notamment sur internet et du bon usage de ce dernier.<br />
			<a class="btn" href="<?php echo site_url('cv'); ?>">MON CV</a>
		</p>
	</div>
</div>

<div class="back1">
	<div class="carrouselMain">
		<p class="slide" id="slide1">
			<img src="<?php echo site_url(); ?>assets/images/slider/damienaubin.jpg" alt="Projet Damien AUBIN" />
			<a href="<?php echo site_url('projets'); ?>" title="Voir le projet" class="slideTitle" >Damien Aubin - Site Web Personnel</a>
		</p>
		<p class="slide" id="slide2">
			<img src="<?php echo site_url(); ?>assets/images/slider/aloderose.jpg" alt="Projet A l'O de Rose" />
			<a href="<?php echo site_url('projets'); ?>" title="Voir le projet" class="slideTitle" >A l'O de Roses - Site Web E-commerce</a>
		</p>
		<p class="slide" id="slide3">
			<img src="<?php echo site_url(); ?>assets/images/slider/quadcopter.jpg" alt="Projet Quadcopter" />
			<a href="<?php echo site_url('projets'); ?>" title="Voir le projet" class="slideTitle" >Quadcopter Lycée maupertuis Saint Malo 2013-2014 - Projet de formation</a>
		</p>
		<p class="slide" id="slide4">
			<img src="<?php echo site_url(); ?>assets/images/slider/mathsamort.jpg" alt="Projet Maths à Mort" />
			<a href="<?php echo site_url('projets'); ?>" title="Voir le projet" class="slideTitle" >Maths à Mort - Jeu de maths en ligne, projet de formation</a>
		</p>
	</div>
</div>

<script type="text/javascript" src="<?php echo site_url(); ?>assets/javascript/carrousel.js"></script>

<div class="back0 myService">
	<h3>Je développe pour vous !</h3>
	<p class="descMyService">
		Vous êtes intéressé par la création d'un site web, mais vous n'avez pas le temps ou pas les compétences nécessaire pour le fabriquer ?<br /><br />

		Contactez moi, nous étudierons ensemble votre projet, de la phase de conception jusqu'à la réalisation et l'hébergement.<br />
		Ce sont des offres complètes que je peux vous proposer.<br /><br />
	
		<a class="btn" href="<?php echo site_url('services'); ?>">Mes Services</a> <a class="btn" href="<?php echo site_url('competences'); ?>">Mes compétences</a>
	</p>
</div>

<?php require('application/views/template/footer.php') ?>

		

	
	