<?php require('application/views/template/header.php'); ?>

<?php require('application/views/admin/menuAdmin.php'); ?>

<div class="back0">
		<h2 class="titlePage">{ BOITE MAIL INTERNE }</h2>
</div>


<div class="back1">

	<?php 
	if (isset($nomail))
	{
		?><p style="text-align:center;">Aucun mail en base de données !</p><?php
	}
	else
	{
		foreach ($mails as $mail): ?>
			<p class="oneMail">
				Le <?php echo $mail->date_envoi; ?> par <?php echo $mail->email; ?> alias <?php echo $mail->nom; ?><br />
				Objet : <?php echo $mail->objet; ?><br />
				<?php echo $mail->message; ?><br /><br />
			</p>
		<?php endforeach; 
	}
	?>
			
</div>

<?php require('application/views/template/footer.php') ?>