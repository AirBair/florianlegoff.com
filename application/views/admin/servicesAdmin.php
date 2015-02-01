<?php require('application/views/template/header.php'); ?>

<?php require('application/views/admin/menuAdmin.php'); ?>

<div class="back1">
		<h2 class="titlePage">{ MODIFIER LES SERVICES }</h2>
</div>

<?php foreach ($services as $service): ?>
	<div class="back0 borderRed adminService">
		<?php echo form_open('admin/services/' . $service->nom); ?>
			<input type="text" name="titre" placeholder="Titre du service" value="<?php echo $service->titre; ?>" /><br /><br />

			<textarea name="contenu"><?php echo $service->contenu; ?></textarea><br /><br />

			<input type="submit" value="Modifier" />
		<?php echo form_close(); ?>
	</div>
<?php endforeach; ?>

<?php if( $this->session->flashdata('success') == true ): ?>
	<script type="text/javascript">
		alert("MàJ des services !");
	</script>
<?php endif; ?>

<?php require('application/views/template/footer.php') ?>