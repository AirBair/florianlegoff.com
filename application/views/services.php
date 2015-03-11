<?php require('application/views/template/header.php'); ?>

<div class="back0 borderRed" >
	<div class="conteneur services">
			<h4><?php echo $propose->titre; ?></h4>
			<p><?php echo nl2br($propose->contenu); ?></p>
	</div>
</div>

<div class="back1" >
	<div class="conteneur services">
			<h4><?php echo $but->titre; ?></h4>
			<p><?php echo nl2br($but->contenu); ?></p>
	</div>
</div>

<div class="back0" >
	<div class="conteneur services">
			<h4><?php echo $avantages->titre; ?></h4>
			<p><?php echo nl2br($avantages->contenu); ?></p>
	</div>
</div>

<div class="back1" >
	<div class="conteneur services">
			<h4><?php echo $informations->titre; ?></h4>
			<p><?php echo nl2br($informations->contenu); ?></p>
	</div>
</div>

<?php require('application/views/template/footer.php') ?>
