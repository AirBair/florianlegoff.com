<!DOCTYPE html>
<html>
	<head>
		<title>Espace Administrateur</title>
		<link rel="stylesheet" href="<?php echo css_url('style'); ?>" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<link rel="icon" href="favicon16.ico" />
	</head>

	<body>

		<div id="blocConnexion" >

			<?php echo form_open('admin'); ?>
				<p>
				<label for="password">Mot de Passe :</label><br />
				<input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" /><br />

					<?php echo form_error('password', '<span class="error">', '</span>'); ?>
					<?php if ( isset($error) ):?>
					<span class="error"><?php echo $error; ?></span>
					<?php endif; ?><br /><br />

				<input type="submit" value="Connexion" />
			</p>
			<?php echo form_close(); ?>

		</div>

	</body>

</html>