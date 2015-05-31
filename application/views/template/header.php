<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $titre; ?></title>
		<link rel="stylesheet" href="<?php echo css_url('style'); ?>" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<?php if(isset($description)): ?>
		<meta name="description" content="<?php echo $description; ?>" />
		<?php endif; ?>
		<meta name="keywords" content="florian, le goff, legoff, developpeur, web, php, html, css, mysql, jquery, javascript, freelance, auto-entrepreneur, saint-malo, lannion, saint-coulomb, bretagne, ile-et-vilaine, Côtes-d'Armor" />
		<link rel="icon" href="<?php echo site_url(); ?>assets/images/favicon16.png" />
	</head>

	<body>

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
		
		<script type="text/javascript" src="<?php echo site_url(); ?>assets/javascript/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo site_url(); ?>assets/javascript/jquery.color.min.js"></script>
	

		<header>
			<h1>Florian LE GOFF</h1>
			<h2>Développeur en Freelance en Bretagne sur Saint-Malo et Lannion.</h2>
		</header>