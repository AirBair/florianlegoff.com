<?php require('application/views/template/header.php'); ?>

<div class="banniereLegals">
	<h3>BOITE MAIL INTERNE</h3>
</div>


<div class="conteneur">

	<?php 
	if (isset($nomail))
	{
		?><p style="text-align:center;">Aucun mail en base de données !</p><?php
	}
	else
	{
		foreach ($mails as $mail): ?>
			<div class="conteneur oneMail">
				<p class="metaMail">
					<strong>De :</strong> <?php echo $mail->nom; ?> ~ <?php echo $mail->email; ?><br /><br />
					<strong>Le :</strong> <?php echo $mail->date_envoi; ?><br /><br />
					<strong>Objet :</strong> <?php echo $mail->objet; ?>
				</p>
				<p class="contentMail"><?php echo $mail->message; ?></p>
				<a class="modoMail" href="<?php echo site_url('mails/delete/'.$mail->id); ?>"><img src="<?php echo site_url(); ?>assets/images/icones/ico_delete.png" alt="Supprimer" /></a>
			</div>
		<?php endforeach; 
	}
	?>
			
</div>

<script type="text/javascript">
	
	$(function(){
		$('.modoMail').each(function() {
			$(this).on('click', function(){
				
				if( confirm('Confirmation de suppression ?') )
				{
					var url = $(this).attr('href');

					var mail = $(this).closest('div.oneMail');

					$.getJSON(url, function(data){
						if(data.success)
						{
							$(mail).fadeOut();
						}
					});
				}

				return false;
			});
		});
	});
</script>

<?php require('application/views/template/footer.php') ?>