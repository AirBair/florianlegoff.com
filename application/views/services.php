<?php require('application/views/template/header.php'); ?>

<?php $inc = 0; ?>
<?php foreach($services as $service): ?>
	<div class="<?php if($inc%2 == 0){ echo 'back0'; }else{ echo 'back1'; }?> <?php if($inc==0):echo 'borderRed'; endif; ?>" >
		<div class="conteneur services">
				<h4>
					<?php echo $service->titre; ?>
					<?php if($this->session->userdata('logged')): ?>
						- <a href="<?php echo site_url('services/edit/' . $service->id); ?>">Editer </a>
					<?php endif; ?>		
				</h4>
				<p><?php echo nl2br($service->contenu); ?></p>
		</div>
	</div>
<?php $inc++; ?>
<?php endforeach; ?>

<?php require('application/views/template/footer.php') ?>
