<?php require('application/views/template/header.php'); ?>
	
<iframe width="100%" height="300px" frameBorder="0" src="http://umap.openstreetmap.fr/fr/map/florian-le-goff_49646?scaleControl=false&miniMap=false&scrollWheelZoom=true&zoomControl=true&allowEdit=false&moreControl=true&datalayersControl=true&onLoadPanel=undefined&captionBar=false"></iframe>

<?php echo validation_errors(); ?>

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