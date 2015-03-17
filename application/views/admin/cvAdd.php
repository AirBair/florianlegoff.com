<?php require('application/views/template/header.php'); ?>

<div class="back0 borderRed">

	<div class="conteneur updateCv">
		<?php echo form_open('cv/add'); ?>
			<input type="text" name="rubrique" id="rubrique" /><br /><br />

			<select name="section" id="section">
				<?php foreach($sections as $section): ?>
					<option value="<?php echo $section->titre; ?>" ><?php echo $section->titre; ?></option>
				<?php endforeach; ?>
			</select><br /><br />

			<textarea name="informations" id="informations"></textarea><br /><br />

			<input type="submit" value="Ajouter" />

		<?php echo form_close(); ?>
	</div>
</div>


<?php require('application/views/template/footer.php') ?>