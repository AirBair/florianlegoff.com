<!DOCTYPE html>
<html lang="<?php if($this->language == 'english')echo 'en';else echo 'fr';?>">
	<head>
		<title><?=$this->lang->line('error_404')?> | Florian LE GOFF</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<link rel="icon" href="<?=site_url()?>assets/images/favicon.png" />
		<link rel="stylesheet" href="<?=css_url('bootstrap.min')?>" />
		<link rel="stylesheet" href="<?=css_url('style')?>" />
		<script type="text/javascript" src="<?=js_url('jquery.min')?>"></script>
		<script type="text/javascript" src="<?=js_url('jquery.color.min')?>"></script>
		<script type="text/javascript" src="<?=js_url('bootstrap.min')?>"></script>
	</head>
	<body class="bg_lightblack">
		<div id="error404">
			<h1 class="darkred"><?=$this->lang->line('error_404')?></h1>
			<p><?=$this->lang->line('page_not_found')?></p>
			<p><a class="btn btn-danger" href="<?=site_url()?>"><?=$this->lang->line('back_to_site')?></a></p>
		</div>
	</body>
</html>
