<?php require('application/views/template/header.php'); ?>

<div class="back0 borderRed" >
	<div class="conteneur">
		<section class="services servicesHG" >
			<h4>Ce que je propose ?</h4>
			<p><?php echo nl2br($propose->contenu); ?></p>
		</section>

		<section class="services servicesHD">
			<h4>Dans quel but ?</h4>
			<p><?php echo nl2br($but->contenu); ?></p>
		</section>

		<section class="services servicesBG" >
			<h4>Quels sont mes avantages ?</h4>
			<p><?php echo nl2br($avantages->contenu); ?></p>
		</section>

		<section class="services servicesBD">
			<h4>Vous êtes intéressez ou vous voulez de plus amples informations ?</h4>
			<p><?php echo nl2br($informations->contenu); ?></p>
		</section>
	</div>
</div>

<?php require('application/views/template/footer.php') ?>
