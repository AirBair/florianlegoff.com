<?php require('application/views/template/header.php'); ?>

<div class="banniereSkills">
	<h3>CURICULUM VITAE</h3>
	<a class="btn" href="<?php echo site_url(); ?>assets/documents/CV%20Florian%20LE%20GOFF.pdf">Télécharger en PDF</a>
</div>

<div class="menuRed">
	<div class="conteneur">
		<p>
			<a href="#formation">FORMATION</a>
			<a href="#exppro">EXP. PRO</a>
			<a href="#skills">COMPETENCES</a>
			<a href="#langues">LANGUES</a>
			<a href="#interets">INTERETS</a>
		</p>
	</div>
</div>


<?php $inc = 1; ?>
<?php foreach($section as $section): ?>
	<div class="<?php if($inc%2 == 0){echo 'back0';}else{ echo 'back1';}?>" id="<?php echo $section->attribut; ?>">
		<div class="conteneur cv" >
			<h3><a href="#<?php echo $section->attribut; ?>"><?php echo $section->titre; ?></a></h3>

			<?php foreach($this->admin_model->get_rubriquesCv($section->titre) as $rubrique): ?>
			<div class="<?php if($inc%2 == 0){echo 'itemCV1';}else{ echo 'itemCV0';}?>">
				<h4>
					<?php echo $rubrique->rubrique; ?>
					<?php if($this->session->userdata('logged')): ?>
					- <a href="<?php echo site_url('cv/edit/' . $rubrique->id); ?>">Editer</a> 
					- <a href="<?php echo site_url('cv/delete/' . $rubrique->id); ?>" onclick="if(!confirm('On supprime, really ?')){return false;}" >Supprimer</a>
				<?php endif; ?>
				</h4>

				<p>
					<?php echo nl2br($rubrique->informations); ?>
				</p>
			</div>
			<?php endforeach; ?>

		</div>
	</div>
<?php $inc++; ?>
<?php endforeach; ?>

<?php require('application/views/template/footer.php') ?>