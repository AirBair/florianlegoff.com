	<footer>
		<p class="legals">Aucuns droits réservés - <a href="<?php echo site_url(); ?>legals">Mentions Légales</a> - Design by <a href="http://aubindamien.com" title="Damien AUBIN, Infographiste 3D">Damien AUBIN</a></p>
		<div class="arborescence">
			<p><a href="#siteMap" title="Voir le Plan du site"><img src="<?php echo site_url(); ?>assets/images/icones/flecheMenu.png" alt="Voir le plan du site" id="imgSiteMap"/></a></p>
			<div class="siteMap">
				<section class="colonneFooter">
					<h5>PLAN DU SITE</h5>
					<p>
						<a href="<?php echo site_url('profil'); ?>" >Profil</a><br />
						<a href="<?php echo site_url('competences'); ?>" >Compétences</a><br />
						<a href="<?php echo site_url('projets'); ?>" >Projets</a><br />
						<a href="<?php echo site_url('services'); ?>" >Services</a><br />
						<a href="<?php echo site_url('contact'); ?>" >Contact</a>
					</p>
				</section>
				<section class="colonneFooter">
					<h5>INFORMATIONS</h5>
					<p>
						<a href="<?php echo site_url('legals'); ?>" >Mentions légales</a><br />
						<a href="<?php echo site_url('cv'); ?>" >Mon CV</a><br />
						<a href="<?php echo site_url('admin'); ?>" >Espace Admin</a><br />
						<?php if($this->session->userdata('logged')): ?>
						<a href="http://stats.florianlegoff.com">Piwik</a>
						<?php endif; ?>
					</p>
				</section>
				<section class="colonneFooter">
					<h5>CONTACT</h5>
					<p>
						<a href="mailto:contact@florianlegoff.com">contact@florianlegoff.com</a><br />
						<a href="http://pgp.mit.edu/pks/lookup?op=get&amp;search=0x329F5F50B1294A46">Clé GPG (Cliquez)</a><br />
						<a href="idtox" class="clickToTox">ID TOX (Cliquez)</a>
					</p>
				</section>
				<section class="colonneFooter">
					<h5>PARTENAIRES</h5>
					<p>
						<a href="http://www.aubindamien.com" >Damien AUBIN (Infographiste 3D)</a>
					</p>
				</section>
			</div>
		</div>
		<nav class="main_navigation">
			<ul>
				<li id="profil">
					<a class="linkText" href="<?php echo site_url(); ?>">PROFIL</a>
					<a class="linkimg" href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/profil_Black.png" alt="Logo profil" onmouseover="this.src='<?php echo site_url(); ?>assets/images/logosMenu/profil_Red.png'" onmouseout="this.src='<?php echo site_url(); ?>assets/images/logosMenu/profil_Black.png'"></a>
				</li>
				<li id="competences">
					<a class="linkText" href="<?php echo site_url('competences'); ?>">COMPETENCES</a>
					<a class="linkimg" href="<?php echo site_url('competences'); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/competences_Black.png" alt="Logo competences" onmouseover="this.src='<?php echo site_url(); ?>assets/images/logosMenu/competences_Red.png'" onmouseout="this.src='<?php echo site_url(); ?>assets/images/logosMenu/competences_Black.png'"></a>
				</li>
				<li id="projets">
					<a class="linkText" href="<?php echo site_url('projets'); ?>">PROJETS</a>
					<a class="linkimg" href="<?php echo site_url('projets'); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/projets_Black.png" alt="Logo projets" onmouseover="this.src='<?php echo site_url(); ?>assets/images/logosMenu/projets_Red.png'" onmouseout="this.src='<?php echo site_url(); ?>assets/images/logosMenu/projets_Black.png'"></a>
				</li>
				<li id="services">
					<a class="linkText" href="<?php echo site_url('services'); ?>">SERVICES</a>
					<a class="linkimg" href="<?php echo site_url('services'); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/services_Black.png" alt="Logo services" onmouseover="this.src='<?php echo site_url(); ?>assets/images/logosMenu/services_Red.png'" onmouseout="this.src='<?php echo site_url(); ?>assets/images/logosMenu/services_Black.png'"></a>
				</li>
				<li id="contact">
					<a class="linkText" href="<?php echo site_url('contact'); ?>">CONTACT</a>
					<a class="linkimg" href="<?php echo site_url('contact'); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/contact_Black.png" alt="Logo contact" onmouseover="this.src='<?php echo site_url(); ?>assets/images/logosMenu/contact_Red.png'" onmouseout="this.src='<?php echo site_url(); ?>assets/images/logosMenu/contact_Black.png'"></a>
				</li>
			</ul>
		</nav>

	</footer>

	<!--<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="http://pgp.mit.edu/pks/lookup?op=get&amp;search=0x329F5F50B1294A46">Clé GPG (Cliquez)</a><br />
	<textarea>AF448137C1017AA436CF0833CD55BEB5F306087434A609801466835E7C163811E06796BDBB7B</textarea><br /><br />-->
			

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/custom.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/jquery.rotate.js"></script>

	<script type="text/javascript">
	$(function(){

		// Préchargement des icones rouges du menu
		var imgprofil = new Image();
		var imgcompetences = new Image();
		var imgprojets = new Image();
		var imgservices = new Image();
		var imgcontact = new Image();
		imgprofil.src='<?php echo site_url(); ?>assets/images/logosMenu/profil_Red.png';
		imgcompetences.src='<?php echo site_url(); ?>assets/images/logosMenu/competences_Red.png';
		imgprojets.src='<?php echo site_url(); ?>assets/images/logosMenu/projets_Red.png';
		imgservices.src='<?php echo site_url(); ?>assets/images/logosMenu/services_Red.png';
		imgcontact.src='<?php echo site_url(); ?>assets/images/logosMenu/contact_Red.png';


		// Menu déroulant
		$('footer').mouseenter(function(){
	      $('.legals').slideDown(150);
	      $('.arborescence').slideDown(150);
	      $('footer nav').css('height', '150px');
	      $('.linkText').css('display', 'inline-block');
	   	});

	   	$('footer').mouseleave(function(){
	      $('.legals').slideUp(150);
	      $('.arborescence').slideUp(150);
	      $('footer nav').css('height', '85px');
	      $('.linkText').css('display', 'none');
	   	});

	   	// Arborescence déroulante
		$('a[href="#siteMap"]').click(function(){

			if ($('div.siteMap').hasClass('open'))
			{
				$('div.siteMap').slideUp(150);
				$('div.siteMap').toggleClass('open');
				$('#imgSiteMap').css('rotate',0);
			}
			else
			{
				$('div.siteMap').slideDown(100);
				$('div.siteMap').toggleClass('open');
				$('#imgSiteMap').css('rotate',180);
			}
			return false;
		});

	 }); // Fin du jQuery
	</script>

	<!--<script type="text/javascript">
	$(function(){
		<?php if($this->uri->segment(1) == null || $this->uri->segment(1) == 'cv')
		{
			?> var page = 'profil'; <?php
		}
		else
		{
			?> var page = '<?php echo $this->uri->segment(1); ?>'; <?php
		} ?>
			
			menuDynamique(page);
		});
	</script>-->
	
	</body>

</html>