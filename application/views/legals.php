<?php require('application/views/template/header.php') ?>

<div class="back0 borderRed">
	<div class="conteneur">
		<h2 style="text-align:center;">{ Mentions légales }</h2>
	</div>
</div><!-- Fin du back0 -->

<div class="back1">
	<div class="conteneur">

		<?php foreach($legals as $legal): ?>
			<section class="sectionlegals">
				<h3>
					<?php echo $legal->rubrique; ?>
					<?php if($this->session->userdata('logged')): ?>
						-  <a href="<?php echo site_url('legals/edit/' . $legal->id); ?>">Editer</a>
					<?php endif; ?>
				</h3>

				<p>
					<?php echo nl2br($legal->informations); ?>
				</p>
			</section>
		<?php endforeach; ?>
		
	</div>

</div><!-- Fin du back1 -->

<?php require('application/views/template/footer.php') ?>