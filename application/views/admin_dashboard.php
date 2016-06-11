<!DOCTYPE html>
<html>
	<head>
		<title>Admin Zone | Florian LE GOFF</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<link rel="icon" href="<?=site_url()?>assets/images/favicon.png" />
		<link rel="stylesheet" href="<?=css_url('bootstrap.min')?>" />
		<link rel="stylesheet" href="<?=css_url('style')?>" />
		<script type="text/javascript" src="<?=js_url('jquery.min')?>"></script>
		<script type="text/javascript" src="<?=js_url('jquery.color.min')?>"></script>
		<script type="text/javascript" src="<?=js_url('bootstrap.min')?>"></script>
	</head>
	<body class="bg_lightblack">
		<div class="row" id="adminZone">
			<div class="col-md-2 bg_darkred" id="adminNav">
				<div class="row text-center">
					<figure>
						<img src="/assets/images/bannieres/avatar_carre.jpg" alt="Florian LE GOFF avatar" class="img-circle" width="30px" height="30px">
					</figure>
					<h4>FLORIAN LE GOFF</h4>
					<p>
						<a href="<?=base_url()?>"><span class="glyphicon glyphicon-home"></span></a>
						<a href="<?=base_url('admin/logout')?>"><span class="glyphicon glyphicon-log-out"></span></a>
					</p>
				</div>
				<nav class="row text-center">
					<ul>
						<li><a href="#admin_config">CONFIG</a></li>
						<li><a href="#admin_projects">PROJECTS</a></li>
						<li><a href="#admin_skills">SKILLS</a></li>
						<li><a href="#admin_services">SERVICES</a></li>
						<li><a href="#admin_mails">MAILS</a></li>
					</ul>
				</nav>
			</div>
			<div class="col-md-10" id="adminContent">

				<section id="admin_config">

				</section>

				<section id="admin_projects">

				</section>

				<section id="admin_skills">

				</section>

				<section id="admin_services">

				</section>

				<section id="admin_mails">
					<?php foreach($mails as $mail): ?>
						<div class="row">
							<p class="metaMail">
								<strong>From :</strong> <?php echo $mail->name; ?> ~ <?php echo $mail->email; ?><br /><br />
								<strong>Date :</strong> <?php echo date('d-m-Y H:i:s', strtotime($mail->sending_date)); ?><br /><br />
								<strong>Objet :</strong> <?php echo $mail->object; ?>
							</p>
							<p class="contentMail"><?php echo $mail->message; ?></p>
						</div>
					<?php endforeach; ?>
				</section>


			</div>
		</div>
	</body>
</html>
