<?php require('application/views/template/header.php'); ?>
	
<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openstreetmap.org/export/embed.html?bbox=-2.362060546875%2C48.47110032750183%2C-1.4556884765625%2C48.8737479930069&amp;layer=mapnik&amp;marker=48.672826384100354%2C-1.90887451171875"></iframe>

<div class="formContact">
	<?php echo form_open('contact'); ?>
			<label for="nom">Votre nom :</label>
			<input type="text" name="nom" id="nom" value="<?php echo set_value('nom'); ?>" required autofocus /><br />
			
			<label for="mail">Votre e-mail :</label>
			<input type="text" name="mail" id="mail" value="<?php echo set_value('mail'); ?>" required /><br />
			
			<label for="objet">Objet :</label>
			<input type="text" name="objet" id="objet" value="<?php echo set_value('objet'); ?>" required /><br />
			
			<textarea name="message" id="message" cols="50" rows="10" required ><?php echo set_value('nom'); ?></textarea><br />
			<input type="submit" value="Envoyer" />
	<?php echo form_close(); ?>
</div>

<?php require('application/views/template/footer.php') ?>