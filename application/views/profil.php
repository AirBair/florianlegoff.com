<?php require('application/views/template/header.php'); ?>

<div class="banniereAbout">
	<h3>A PROPOS</h3>
</div>
<div class="contAboutMe">
	<div class="conteneur">
		<p class="titleAboutMe">
			<span class="aboutName">FLORIAN LE GOFF</span><br />
			<span class="aboutTitle">Developpeur Web en Freelance</span><br /><br />
			<a class="btn" href="<?php echo site_url('cv'); ?>">MON CV</a>
		</p>
		<p class="aboutMe">
			<?php echo nl2br($profil->texte); ?>
		</p>
		<?php if($this->session->userdata('logged')): ?>
			<a class="modoProfil" href="<?php echo site_url('profil/edit/' . $profil->id); ?>"><img src="<?php echo site_url(); ?>assets/images/icones/ico_edit.png" alt="Editer" /></a>
		<?php endif; ?>	
	</div>
</div>

<div class="back1">
	<div class="carrouselMain">
		<p class="slide" id="slide1">
			<img src="<?php echo site_url(); ?>assets/images/projets/damien/damien_1300px.jpg" alt="Projet Damien AUBIN" />
			<a href="<?php echo site_url('projets'); ?>" title="Voir le projet" class="slideTitle" >Damien Aubin - Site Web Personnel</a>
		</p>
		<p class="slide" id="slide2">
			<img src="<?php echo site_url(); ?>assets/images/projets/aloderoses/aloderoses_1300px.jpg" alt="Projet A l'O de Rose" />
			<a href="<?php echo site_url('projets'); ?>" title="Voir le projet" class="slideTitle" >A l'O de Roses - Site Web E-commerce</a>
		</p>
		<p class="slide" id="slide3">
			<img src="<?php echo site_url(); ?>assets/images/projets/quadcopter/quadcopter_1300px.jpg" alt="Projet Quadcopter" />
			<a href="<?php echo site_url('projets'); ?>" title="Voir le projet" class="slideTitle" >Quadcopter Lycée maupertuis Saint Malo 2013-2014 - Projet de formation</a>
		</p>
		<p class="slide" id="slide4">
			<img src="<?php echo site_url(); ?>assets/images/projets/mathsamort/mathsamort_1300px.jpg" alt="Projet Maths à Mort" />
			<a href="<?php echo site_url('projets'); ?>" title="Voir le projet" class="slideTitle" >Maths à Mort - Jeu de maths en ligne, projet de formation</a>
		</p>
	</div>
</div>

<script type="text/javascript" src="<?php echo site_url(); ?>assets/javascript/carrousel.js"></script>

<div class="back0 myService">
	<h3>JE DEVELOPPE POUR VOUS !</h3>
	<p class="descMyService">
		<?php echo nl2br($service->texte); ?>
	</p>
	<p class="myServiceBtn">
		<a class="btn" href="<?php echo site_url('services'); ?>">Mes Services</a> <a class="btn" href="<?php echo site_url('competences'); ?>">Mes compétences</a>
	</p>

	<?php if($this->session->userdata('logged')): ?>
		<a class="modoProfil" href="<?php echo site_url('profil/edit/' . $service->id); ?>"><img src="<?php echo site_url(); ?>assets/images/icones/ico_edit.png" alt="Editer" /></a>
	<?php endif; ?>	
</div>

<?php require('application/views/template/footer.php') ?>

		

	
	