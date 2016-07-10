<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login | Florian LE GOFF</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<link rel="icon" href="<?=site_url()?>assets/images/favicon.png" />
		<link rel="stylesheet" href="<?=css_url('bootstrap.min')?>" />
		<link rel="stylesheet" href="<?=css_url('style')?>" />
		<script type="text/javascript" src="<?=js_url('jquery.min')?>"></script>
		<script type="text/javascript" src="<?=js_url('jquery.color.min')?>"></script>
		<script type="text/javascript" src="<?=js_url('bootstrap.min')?>"></script>
	</head>
	<body class="bg_lightblack">
		<div id="adminLogin">
			<h1 class="darkred">ADMIN ZONE</h1>
			<?=form_open('admin/login')?>

				<input type="password" name="password" id="password" placeholder="Password" value="<?=set_value('password')?>" autofocus required />
				<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-log-in"></span></button>

				<?php if(isset($error)):?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<p><?=$error?></p>
					</div>
				<?php endif; ?>

			<?=form_close()?>
		</div>
	</body>
</html>
