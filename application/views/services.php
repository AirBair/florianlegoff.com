<?php require('application/views/template/header.php'); ?>

<div class="banniereServices">
	<h3>SERVICES</h3>
</div>
<?php foreach($services as $service): ?>
	<div class="service">
		<h4>
			<?php echo $service->titre; ?>
			<?php if($this->session->userdata('logged')): ?>
				- <a href="<?php echo site_url('services/edit/' . $service->id); ?>">Editer </a>
			<?php endif; ?>		
		</h4>
		<p><?php echo nl2br($service->contenu); ?></p>
	</div>
<?php endforeach; ?>

<?php require('application/views/template/footer.php') ?>
