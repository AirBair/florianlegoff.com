<?php require('application/views/template/header.php'); ?>

<div class="banniereSkills">
	<h3>CURICULUM VITAE</h3>
	<a class="btn" href="http://cloud.florianlegoff.com/index.php/s/EYROhGYmEN0u9ED">Télécharger en PDF</a>
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
		<div class="conteneur cvSection" id="<?php echo $section->attribut; ?>">
			<h3><a href="#<?php echo $section->attribut; ?>"><?php echo $section->titre; ?></a></h3>

			<?php foreach($this->admin_model->get_rubriquesCv($section->titre) as $rubrique): ?>
			<div class="itemCV">
				<h4><?php echo $rubrique->rubrique; ?></h4>

				<p class="contentItemCV">
					<?php echo nl2br($rubrique->informations); ?>
				</p>

				<?php if($this->session->userdata('logged')): ?>
				<p class="modoCV">
					<a href="<?php echo site_url('cv/edit/'.$rubrique->id); ?>"><img src="<?php echo site_url(); ?>assets/images/icones/ico_edit.png" alt="Editer" /></a>
					<a class="delItemCV" href="<?php echo site_url('cv/delete/'.$rubrique->id); ?>"><img src="<?php echo site_url(); ?>assets/images/icones/ico_delete.png" alt="Supprimer" /></a>
				</p>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>

		</div>
<?php $inc++; ?>
<?php endforeach; ?>

<script type="text/javascript">
	
	$(function(){
		$('.delItemCV').each(function() {
			$(this).on('click', function(){
				
				if( confirm('Confirmation de suppression ?') )
				{
					var url = $(this).attr('href');

					var item = $(this).closest('div.itemCV');

					$.getJSON(url, function(data){
						if(data.success)
						{
							$(item).fadeOut();
						}
					});
				}

				return false;
			});
		});
	});
</script>

<?php require('application/views/template/footer.php') ?>