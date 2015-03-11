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

	<div class="myServiceBack">
		<img src="<?php echo site_url(); ?>assets/images/slider/damienaubin.jpg" alt="Projet Damien AUBIN" id="slide1" />
		<img src="<?php echo site_url(); ?>assets/images/slider/aloderose.jpg" alt="Projet A l'O de Rose" id="slide2" />
		<img src="<?php echo site_url(); ?>assets/images/slider/quadcopter.jpg" alt="Projet Quadcopter" id="slide3" />
		<img src="<?php echo site_url(); ?>assets/images/slider/mathsamort.jpg" alt="Projet Maths à Mort" id="slide4" />
	</div>
</div>

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

		

	
	