<!DOCTYPE html>
<html lang="<?php if ($this->language == 'english') {
    echo 'en';
} else {
    echo 'fr';
}?>">
	<head>
		<title>Florian LE GOFF - <?=$freelance_developper['title_'.$this->language]?></title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<meta name="description" content="<?=$this->lang->line('website_description')?>"/>
		<link rel="icon" href="<?=site_url(); ?>assets/images/favicon.png" />
		<link rel="stylesheet" href="<?=css_url('bootstrap.min')?>" />
		<link rel="stylesheet" href="<?=css_url('animate')?>" />
		<link rel="stylesheet" href="<?=css_url('style')?>" />
		<script type="text/javascript" src="<?=js_url('jquery.min')?>"></script>
		<script type="text/javascript" src="<?=js_url('bootstrap.min')?>"></script>
	</head>

	<body class="row bg_lightblack">

		<!-- Piwik Image Tracker-->
		<img src="https://piwik.florianlegoff.com/piwik.php?idsite=1&amp;rec=1" style="border:0" alt="" />
		<!-- End Piwik -->

		<header class="bg_darkblack">
			<div class="col-md-12">
	        <nav>
				<ul>
					<li><a href="#profil"><span class="glyphicon glyphicon-user"></span></a></li>
					<li><a href="#projects"><span class="glyphicon glyphicon-briefcase"></span></a></li>
					<li><a href="#skills"><span class="glyphicon glyphicon-education"></span></a></li>
					<li><a href="#services"><span class="glyphicon glyphicon-folder-open"></span></a></li>
					<li><a href="#contact"><span class="glyphicon glyphicon-envelope"></span></a></li>
				</ul>
			</nav>
		</div>
		</header>

			<section id="profil" class="row">
				<div id="particles"></div>
				<div class="col-md-6 col-sm-12 text-center">
					<figure class="wow fadeIn"><img src="/assets/images/florian_le_goff.jpg" alt="Florian LE GOFF picture" class="img-circle" id="myPicture"></figure>

					<h1 class="wow slideInDown">FLORIAN LE GOFF</h1>
					<h3 class="wow slideInUp"><?=$freelance_developper['title_'.$this->language]?></h3>
				</div>
				<div class="col-md-6 col-sm-12">
					<p class="col-sm-10 col-sm-offset-1 text-justify wow lightSpeedIn" style="padding:30px 0px;"><?=$freelance_developper['content_'.$this->language]?></p>
					<p class="text-center">
						<br /><br />
						<a class="btn btn-danger wow bounceInUp" data-wow-delay="0.6s" href="<?=$curriculum_vitae['content_'.$this->language]?>" target="_blank"><?=$curriculum_vitae['title_'.$this->language]?></a>
						<br /><br />
					</p>
				</div>
			</section>

			<section id="projects" class="row bg_darkblack" >
				<h2 class="text-center" style="margin-bottom:80px;"><?=strtoupper($this->lang->line('projects'))?></h2>
				<?php foreach ($projects as $project): ?>
					<div class="col-sm-6 col-md-4 wow fadeInUp">
				    	<div class="thumbnail bg_darkblack" style="border:none">
				      		<div class="hover-bg">
								<a href="#project_<?=$project['label']?>" data-toggle="modal">
									<div class="hover-text">
					                	<span class="glyphicon glyphicon-plus projectMore"></span>
										<p><?=$project['subtitle_'.$this->language]?></p>
					                	<div class="clearfix"></div>
	              					</div>
									<img src="<?=base_url()?>assets/images/projects/<?=$project['label']?>/<?=$project['label']?>_300px.jpg" alt="Thumbnail <?=$project['title']?>" />
								</a>
							</div>
							<div class="caption">
				        		<h3 class="text-center"><a href="#project_<?=$project['label']?>" data-toggle="modal"><?=$project['title']?></a></h3>
				      		</div>
				    	</div>
				  	</div>

					<div class="projectModal modal fade" id="project_<?=$project['label']?>" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-content col-md-12 col-sm-12">
					    	<div class="close-modal" data-dismiss="modal"><div class="lr"><div class="rl"></div></div></div>
					      	<div class="row">
					        	<div class="col-md-10 col-md-offset-1">
					          		<div class="modal-body text-center">
										<span class="glyphicon glyphicon-remove-circle closeModal absoluteClose" data-dismiss="modal"></span>
					            		<h2><?=$project['title']?></h2>
					            		<h4><?=$project['subtitle_'.$this->language]?></h4>
										<div class="carousel">
					            			<img src="<?=base_url()?>/assets/images/projects/<?=$project['label']?>/<?=$project['label']?>_960px.jpg" alt="Screenshot <?=$project['label']?>" />
										</div>
										<div class="row">
											<div class="col-md-6">
												<h3><?=strtoupper($this->lang->line('project_description'))?></h3>
											</div>
											<div class="col-md-6">
												<h3><?=strtoupper($this->lang->line('project_information'))?></h3>
											</div>
										</div>
										<br /><br />
										<div class="row">
											<div class="col-md-6 description">
												<p><?=$project['description_'.$this->language]?></p>
											</div>
											<div class="col-md-6 details">
												<p><strong><?=$this->lang->line('project_customer')?></strong><br /><?=$project['customer']?></p>
												<p><strong><?=$this->lang->line('project_deployement')?></strong><br /><?php if ($project['date_realisation'] == '0000-00-00') {
    echo $this->lang->line('undefined');
} else {
    echo date('m-Y', strtotime($project['date_realisation']));
} ?></p>
												<p><strong><?=$this->lang->line('project_webdesign')?></strong><br /><?=$project['webdesign']?></p>
												<p><strong><?=$this->lang->line('project_technologies')?></strong><br /><?=$project['techno']?></p>
												<p><strong><?=$this->lang->line('project_website_url')?></strong><br /><?=$project['url']?></p>
											</div>
										</div>
										<div class="row text-center"><span class="glyphicon glyphicon-remove-circle closeModal" data-dismiss="modal"></span></div>
					          		</div>
					        	</div>
					    	</div>
					  	</div>
					</div>
				<?php endforeach; ?>
			</section>

			<section id="skills" class="row bg_lightblack">
				<h2 class="text-center"><?=strtoupper($this->lang->line('skills'))?></h2>
				<?php foreach ($skills_groups as $group): ?>
						<h4 class="col-sm-12 text-center wow tada"><?=$group['name_'.$this->language]?></h4>
						<div class="col-md-12">
						<?php foreach ($this->admin_model->readSkills($group['id']) as $skill): ?>
							<div class="col-sm-4 col-md-2 wow bounceIn">
						    	<div class="thumbnail bg_lightblack" style="border:none">
									<img src="<?=base_url()?>assets/images/skills/<?=$skill['icon']?>" alt="Icon <?=$skill['name_'.$this->language]?>"/>
									<div class="caption text-center">
										<h5><?=$skill['name_'.$this->language]?></h5>
										<p class="lightred">
										<?php for ($i=0 ; $i<5 ; $i++):
                                            if ($skill['mark'] > $i) {
                                                echo '<span class="glyphicon glyphicon-star"></span>';
                                            } else {
                                                echo '<span class="glyphicon glyphicon-star-empty"></span>';
                                            }
                                        endfor; ?>
										</p>
						      		</div>
						    	</div>
						  	</div>
						<?php endforeach; ?>
					</div>
				<?php endforeach; ?>
			</section>

			<section id="services" class="row bg_darkblack">
				<h2 class="text-center"><?=strtoupper($this->lang->line('services'))?></h2>
				<div class="col-md-10 col-sm-12 text-center">
					<?php foreach ($services as $service): ?>
					<div class="col-md-4 col-sm-6 service wow slideInDown">
						<i class="glyphicon glyphicon-<?=$service['icon']?>"></i>
			        	<h4><?=strtoupper($service['name_'.$this->language])?></h4>
			        	<p><?=$service['content_'.$this->language]?></p>
			      	</div>
					<?php endforeach; ?>
				</div>
			</section>

			<section id="contact" class="row bg_lightblack">
				<div class="col-md-12">
					<div class="col-md-6 col-md-offset-3 col-sm-12">
						<h2 class="text-center"><?=strtoupper($this->lang->line('contact'))?></h2>
						<aside class="wow fadeIn" data-wow-delay="0.5s">
							<p><img src="<?=base_url()?>assets/images/icons/ico_mail.png" alt="Icon mail" /><br /><br /><a href="mailto:contact@florianlegoff.com">contact@florianlegoff.com</a></p>
							<p><img src="<?=base_url()?>assets/images/icons/ico_key.png" alt="Icon key" /><br /><br /><a href="<?=$gpg_key['content_'.$this->language]?>" target="_blank"><?=$gpg_key['title_'.$this->language]?></a></p>
							<p><img src="<?=base_url()?>assets/images/icons/ico_tchat.png" alt="Icon discuss" /><br /><br /><a href="toxID" onclick="return false;" role="button" data-toggle="popover" data-content="<textarea><?=$tox_id['content_'.$this->language]?></textarea>">TOX</a></p>
						</aside>
					</div>
				</div>
				<div class="col-md-12">
					<div class="col-md-6 col-md-offset-3 col-sm-12">
						<div class="alert alert-success alert-dismissible hidden" id="contact_form_success" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong><?=$this->lang->line('success_email_send');?></strong>
						</div>

						<div class="alert alert-danger alert-dismissible hidden" id="contact_form_error" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<p><strong><?=$this->lang->line('errors_email_send');?></strong></p>
							<div class="errors_validation"></div>
						</div>

						<?=form_open('welcome/send_mail')?>
							<input type="text" name="name" id="contact_name" placeholder="<?=$this->lang->line('contact_your_name')?>" value="<?=set_value('nom')?>" /><br />

							<input type="text" name="email" id="contact_email" placeholder="<?=$this->lang->line('contact_your_email')?>" value="<?=set_value('mail')?>" /><br />

							<input type="text" name="object" id="contact_object" placeholder="<?=$this->lang->line('contact_message_object')?>" value="<?=set_value('objet')?>" /><br />

							<textarea name="message" id="contact_message" cols="50" rows="10" placeholder="<?=$this->lang->line('contact_your_message')?>"><?=set_value('nom')?></textarea><br />

							<input type="submit" value="<?=$this->lang->line('contact_send')?>" />
						<?=form_close()?>
					</div>
				</div>
			</section>

		<footer class="row bg_darkblack">
			<div>
				<p><a rel="license" href="https://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a></p>
				<p><a href="#legals" data-toggle="modal"><?=$this->lang->line('legals')?></a></p>
				<p><?=$this->lang->line('designed_with')?> <a href="https://www.aubindamien.com" title="Damien AUBIN, Infographiste 3D">Damien AUBIN</a></p>
				<p>
					<a href="<?=base_url('welcome/lang/fr')?>"><img src="<?=site_url()?>/assets/images/icons/fr_flag.svg" alt="Flag France" class="langFlag <?php if ($this->language=='french') {
                                            echo 'currentLang';
                                        }?>" /></a>
					<a href="<?=base_url('welcome/lang/en')?>"><img src="<?=site_url()?>/assets/images/icons/en_flag.svg" alt="Drapeau United Kingdom" class="langFlag <?php if ($this->language=='english') {
                                            echo 'currentLang';
                                        }?>" /></a>
				</p>
			</div>
		</footer>

		<div class="modal fade" id="legals" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
    			<div class="modal-content bg_lightblack">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span></button>
                        <h2 class="modal-title"><?=$this->lang->line('legals')?></h2>
                    </div>
    				<div class="modal-body text-justify">
						<div class="row">
							<?php foreach ($legals as $legal): ?>
								<div class="col-md-6">
									<h4><?=$legal['title_'.$this->language]?></h4>
									<p><?=$legal['content_'.$this->language]?></p>
								</div>
							<?php endforeach; ?>
						</div>
    				</div>
    			</div>
            </div>
		</div>

		<script type="text/javascript" src="<?=js_url('wow.min')?>"></script>
		<script type="text/javascript" src="<?=js_url('particles.min')?>"></script>
		<script type="text/javascript" src="<?=js_url('custom')?>"></script>
    </body>
</html>
