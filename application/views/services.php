<?php require('application/views/template/header.php'); ?>

<div class="banniereServices">
	<h3>SERVICES</h3>
</div>
<?php foreach($services as $service): ?>
	<div class="service">
		<h4><?php echo $service->titre; ?></h4>
		<p><?php echo nl2br($service->contenu); ?></p>
		<?php if($this->session->userdata('logged')): ?>
			<a class="modoService" href="<?php echo site_url('services/edit/' . $service->id); ?>"><img src="<?php echo site_url(); ?>assets/images/icones/ico_edit.png" alt="Editer" /></a>
		<?php endif; ?>	
	</div>
<?php endforeach; ?>

<?php require('application/views/template/footer.php') ?>
