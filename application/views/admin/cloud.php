<?php require('application/views/template/header.php'); ?>

<?php require('application/views/admin/menuAdmin.php'); ?>

<div class="back0">
		<h2 class="titlePage">{ AJOUTER UN FICHIER AU CLOUD }</h2>
</div>

<div class="back1 cloud">

	<?php echo form_open_multipart('admin/cloud'); ?>

		<input type="file" name="fichier" placeholder="Fichier à déposer" /><br /><br />

		<input type="submit" value="Deposer" />

	<?php echo form_close(); ?>

</div>

<div class="back0">
		<h2 class="titlePage">{ MES FICHIERS }</h2>
</div>

<div class="back1 cloud">

	<?php
	$dir = './assets/documents/upload/';
	if (is_dir($dir)):
	    if ($dh = opendir($dir)):
	        while (($file = readdir($dh)) !== false)
	        {
	            if($file != '.' AND $file != '..'):
	            	?><a href="<?php echo site_url(); ?>assets/documents/upload/<?php echo $file; ?>"><?php echo $file; ?></a><?php
	        	endif;
	        }
	        closedir($dh);
	    endif;
	endif;
	?>

</div>

<?php if(isset($success)): ?>
	<script type="text/javascript">
		alert('Fichier ajouté !');
	</script>
<?php endif; ?>

<?php if(isset($error)): ?>
	<script type="text/javascript">
		alert('Erreur d\'upload !');
	</script>
<?php endif; ?>

<?php require('application/views/template/footer.php') ?>