<?php require('application/views/template/header.php'); ?>

<div class="banniereProjets">
	<h3>PROJETS</h3>
</div>


<div class="conteneur formUpdate">

<?php
if(validation_errors() != null): ?>
	<div class="formError">
		<h4>Erreur(s) dans la validation du formulaire :</h4>
		<?php echo validation_errors(); ?>
	</div>
<?php endif;

if($this->uri->segment(2) == 'edit')
{
	echo form_open('projets/edit/' . $projet->attribut_projet); ?>
		<h3>Description</h3>
			<input type="text" name="titre" placeholder="Titre du projet" value="<?php echo $projet->titre_projet; ?>" /><br />
			<input type="text" name="sousTitre" placeholder="Sous-Titre du projet" value="<?php echo $projet->sousTitre_projet; ?>" /><br />
			<input type="text" name="logo" placeholder="Nom Logo" value="<?php echo $projet->icone_projet; ?>" /><br />
			<textarea name="description"><?php echo $projet->description_projet; ?></textarea>

			<h3>Détails</h3>
				<input type="text" name="client" placeholder="Client" value="<?php echo $projet->client_projet; ?>" /><br />
				<input type="text" name="date" placeholder="Date de réalisation" value="<?php echo $projet->date_projet; ?>" /><br />
				<textarea name="webdesign" placeholder="Web-Designer"><?php echo $projet->webdesign_projet; ?></textarea><br />
				<input type="text" name="techno" placeholder="Technologies" value="<?php echo $projet->technologies_projet; ?>" />
			
			<h3>Liens</h3>
				<textarea name="url" placeholder="URL du site"><?php echo $projet->url_projet; ?></textarea><br /><br />

			<input type="submit" value="Modifier" />
	<?php echo form_close();
}
else
{
	echo form_open('projets/add'); ?>
		<h3>Description</h3>
			<input type="text" name="titre" placeholder="Titre du projet" /><br />
			<input type="text" name="sousTitre" placeholder="Sous-Titre du projet" /><br />
			<input type="text" name="attribut" placeholder="Attribut du projet" /><br />
			<input type="text" name="logo" placeholder="Nom Logo" /><br />
			<textarea name="description" placeholder="Description du projet"></textarea>

		<h3>Détails</h3>
			<input type="text" name="client" placeholder="Client" /><br />
			<input type="text" name="date" placeholder="Date de réalisation" /><br />
			<textarea name="webdesign" placeholder="Web-Designer"></textarea><br />
			<input type="text" name="techno" placeholder="Technologies" />
		
		<h3>Liens</h3>
			<textarea name="url" placeholder="URL du site"></textarea><br />

		<h3>Positionnement</h3>
			<input type="number" name="position" placeholder="Position" required /><br />
			<select name="prev" >
				<?php foreach($projets as $projet): ?>
					<option value="<?php echo $projet->attribut_projet; ?>"><?php echo $projet->titre_projet; ?></option>
				<?php endforeach; ?>
			</select><br />
			<select name="next" >
				<?php foreach($projets as $projet): ?>
					<option value="<?php echo $projet->attribut_projet; ?>"><?php echo $projet->titre_projet; ?></option>
				<?php endforeach; ?>
			</select><br /><br />
			<input type="submit" value="Modifier" />
	<?php echo form_close();
}
?>
		
</div>

<?php require('application/views/template/footer.php') ?>