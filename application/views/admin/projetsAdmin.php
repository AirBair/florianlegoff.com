<?php require('application/views/template/header.php'); ?>

<?php require('application/views/admin/menuAdmin.php'); ?>


<div class="back1">
		<h2 class="titlePage">{ AJOUTER UN PROJET }</h2>
</div>

<div class="back0 addProjetAdmin">
		<?php echo form_open('admin/projets/new'); ?>
				<h3>Description</h3>
				<input type="text" name="titre" placeholder="Titre du projet" /><br />
				<input type="text" name="sousTitre" placeholder="Sous-Titre du projet" /><br />
				<input type="text" name="attribut" placeholder="Attribut du projet" /><br />
				<input type="text" name="miniature" placeholder="Nom miniature" /><br />
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
			</div>
			<?php echo form_close(); ?>
</div>


<div class="back1">
		<h2 class="titlePage">{ MODIFIER LES PROJETS }</h2>
</div>

<div class="back0">
	<div class="conteneur">
		<?php foreach ($projets as $projet): ?>
			<div class="projet">
				<p>
					<a href="#<?php echo $projet->attribut_projet; ?>">
						<img src="<?php echo site_url(); ?>assets/images/projets/<?php echo $projet->miniature_projet; ?>" alt="Miniature <?php echo $projet->titre_projet; ?>" />
					</a>
					<a href="#<?php echo $projet->attribut_projet; ?>" class="viewProject">
						<img src="<?php echo site_url(); ?>assets/images/projets/voirPlus.png" alt="Icone voir +" /><br />
						Voir le Projet
					</a>
				</p>
						
				<h4><a href="#<?php echo $projet->attribut_projet; ?>"><?php echo $projet->titre_projet; ?></a></h4>
			</div>
		<?php endforeach; ?>
	</div> <!-- Fin du conteneur -->
</div> <!-- Fin du back0 -->

<?php foreach ($projets as $projet): ?>

<div class="back1 prezProjet adminProjet" id="<?php echo $projet->attribut_projet; ?>">
	<div class="conteneur">
		<div class="enTeteProjet">
			<p class="logoProjet">
				<img src="<?php echo site_url(); ?>assets/images/projets/<?php echo $projet->icone_projet; ?>" alt="Logo projet" />
			</p>
			<h2 class="titreProjet">
				<?php echo $projet->titre_projet; ?><br />
				<span class="sTitreProjet"><?php echo $projet->sousTitre_projet; ?></span>
			</h2>
			<p class="closeProjet">
				<a href="close">
					<img src="<?php echo site_url(); ?>assets/images/projets/NavigationHaut/icoClose.png" alt="Icone fermer le projet" />
				</a>
			</p>
		</div>
		<div class="corpsProjet" >
			<?php echo form_open('admin/projets/' . $projet->attribut_projet); ?>
			<div class="infosProjet" >
				<h3>Description</h3>
				<input type="text" name="titre" placeholder="Titre du projet" value="<?php echo $projet->titre_projet; ?>" /><br />
				<input type="text" name="sousTitre" placeholder="Sous-Titre du projet" value="<?php echo $projet->sousTitre_projet; ?>" /><br />
				<input type="text" name="miniature" placeholder="Nom miniature" value="<?php echo $projet->miniature_projet; ?>" /><br />
				<input type="text" name="logo" placeholder="Nom Logo" value="<?php echo $projet->icone_projet; ?>" /><br />
				<textarea name="description"><?php echo nl2br($projet->description_projet); ?></textarea>

				<h3>Détails</h3>
					<input type="text" name="client" placeholder="Client" value="<?php echo $projet->client_projet; ?>" /><br />
					<input type="text" name="date" placeholder="Date de réalisation" value="<?php echo $projet->date_projet; ?>" /><br />
					<textarea name="webdesign" placeholder="Web-Designer"><?php echo $projet->webdesign_projet; ?></textarea><br />
					<input type="text" name="techno" placeholder="Technologies" value="<?php echo $projet->technologies_projet; ?>" />
				
				<h3>Liens</h3>
					<textarea name="url" placeholder="URL du site"><?php echo $projet->url_projet; ?></textarea><br /><br />

					<input type="submit" value="Modifier" />
			</div>
			<?php echo form_close(); ?>
		</div>
		<div class="footProjet" >
			<p>
				<a href="#<?php echo $projet->prev_projet; ?>"><img class="flecheG" src="<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheGauche.png" alt="Icone fleche projet précedent" /></a>
				<?php echo $projet->position_projet; ?>/<?php echo $nbProjets; ?>
				<a href="#<?php echo $projet->next_projet; ?>"><img class="flecheD" src="<?php echo site_url(); ?>assets/images/projets/NavigationBas/icoFlecheDroite.png" alt="Icone fleche projet suivant" /></a>
			</p>
		</div>
	</div> <!-- Fin du conteneur -->
</div> <!-- Fin du back1 -->

<?php endforeach; ?>

<?php if($this->session->userdata('success') == true): ?>
	<script type="text/javascript">
		alert('Projet MàJ');
	</script>
<?php endif; ?>

<?php require('application/views/template/footer.php') ?>