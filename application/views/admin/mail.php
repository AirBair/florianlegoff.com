<!DOCTYPE html>
<html>
	<head>
		<title>Mail | Administration</title>
		<link rel="stylesheet" href="<?php echo css_url('style'); ?>" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<link rel="icon" href="favicon16.ico" />
	</head>

	<body>

	<div id="tronc"> 

		<div id="conteneur"> <!-- Zone de contenu -->

			<div class="cadre"> <!-- Cadre principal contenant les informations sur chaque page -->

				<?php 
				if (isset($nomail))
				{
					?><p style="text-align:center;">Aucun mail en base de données !</p><?php
				}

				else
				{
					foreach ($mails as $mail): ?>
						<p style="text-align:center;">
							Le <?php echo $mail->date_envoi; ?> par <?php echo $mail->email; ?> alias <?php echo $mail->nom; ?><br />
							Objet : <?php echo $mail->objet; ?><br />
							<?php echo $mail->message; ?><br /><br />
						</p>
					<?php endforeach; 
				}	?>
				

			</div> <!-- Fin du cadre principal -->

			<p><?php echo url('Deconnexion', 'admin/deconnexion'); ?></p>
		</div> <!-- Fin de la zone de contenu -->

		<div class="clear"></div>

	</div> <!--Fin du tronc de page -->
	
	</body>

</html>