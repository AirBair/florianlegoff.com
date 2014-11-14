<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $titre; ?></title>
		<link rel="stylesheet" href="<?php echo css_url('style'); ?>" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<meta name="description" content="Développeur Web en freelance." />
		<meta name="keywords" content="florian, le goff, legoff, developpeur, web, php, html, css, mysql, jquery, javascript, freelance, auto-entrepreneur" />
		<link rel="icon" href="favicon16.png" />
		<?php if(isset($map)):
			echo $map['js'];
		endif; ?>
	</head>

<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//stats.florianlegoff.com/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//stats.florianlegoff.com/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

	<body>

		<header>
			<div class="conteneur">
				<div class="entete">
						<p class="icoDev"><a href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>assets/images/icoDeveloppeur.png" alt="Icone développeur" /></a></p>
						<h1><a href="<?php echo site_url(); ?>">Florian LE GOFF</a></h1>
						<h2>Développeur Web</h2>
						<p class="clear"></p>
				</div>
				<nav class="main_navigation">
					<ul>
						<li id="profil">
							<a class="linktext" href="<?php echo site_url(); ?>">PROFIL</a>
							<a class="linkimg" href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/profil.png" alt="Logo profil" /></a>
						</li>
						<li id="competences">
							<a class="linktext" href="<?php echo site_url('competences'); ?>">COMPETENCES</a>
							<a class="linkimg" href="<?php echo site_url('competences'); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/competences.png" alt="Logo competences" /></a>
						</li>
						<li id="projets">
							<a class="linktext" href="<?php echo site_url('projets'); ?>">PROJETS</a>
							<a class="linkimg" href="<?php echo site_url('projets'); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/projets.png" alt="Logo projets" /></a>
						</li>
						<li id="services">
							<a class="linktext" href="<?php echo site_url('services'); ?>">SERVICES</a>
							<a class="linkimg" href="<?php echo site_url('services'); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/services.png" alt="Logo services" /></a>
						</li>
						<li id="contact">
							<a class="linktext" href="<?php echo site_url('contact'); ?>">CONTACT</a>
							<a class="linkimg" href="<?php echo site_url('contact'); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/contact.png" alt="Logo contact" /></a>
						</li>
					</ul>
				</nav>
				<div class="underNav">
					<p class="infoNav"><img src="<?php echo site_url(); ?>assets/images/logosMenu/flecheMenu.png" alt="Fleche" id="profilArrow" /><br /><br /><span id="profilNav">PROFIL</span></p>
					<p class="infoNav"><img src="<?php echo site_url(); ?>assets/images/logosMenu/flecheMenu.png" alt="Fleche" id="competencesArrow" /><br /><br /><span id="competencesNav">COMPETENCES</span></p>
					<p class="infoNav"><img src="<?php echo site_url(); ?>assets/images/logosMenu/flecheMenu.png" alt="Fleche" id="projetsArrow" /><br /><br /><span id="projetsNav">PROJETS</span></p>
					<p class="infoNav"><img src="<?php echo site_url(); ?>assets/images/logosMenu/flecheMenu.png" alt="Fleche" id="servicesArrow" /><br /><br /><span id="servicesNav">SERVICES</span></p>
					<p class="infoNav"><img src="<?php echo site_url(); ?>assets/images/logosMenu/flecheMenu.png" alt="Fleche" id="contactArrow" /><br /><br /><span id="contactNav">CONTACT</span></p>
				</div>
			</div>
		</header>