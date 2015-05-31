	<footer>
		<nav class="main_navigation">
			<ul>
				<li id="profil">
					<a class="linkimg" href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/profil_Black.png" alt="Logo profil" onmouseover="this.src='<?php echo site_url(); ?>assets/images/logosMenu/profil_Red.png'" onmouseout="this.src='<?php echo site_url(); ?>assets/images/logosMenu/profil_Black.png'"></a>
					<a class="linkText" href="<?php echo site_url(); ?>">PROFIL</a>
				</li>
				<li id="competences">
					<a class="linkimg" href="<?php echo site_url('competences'); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/competences_Black.png" alt="Logo competences" onmouseover="this.src='<?php echo site_url(); ?>assets/images/logosMenu/competences_Red.png'" onmouseout="this.src='<?php echo site_url(); ?>assets/images/logosMenu/competences_Black.png'"></a>
					<a class="linkText" href="<?php echo site_url('competences'); ?>">COMPETENCES</a>
				</li>
				<li id="projets">
					<a class="linkimg" href="<?php echo site_url('projets'); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/projets_Black.png" alt="Logo projets" onmouseover="this.src='<?php echo site_url(); ?>assets/images/logosMenu/projets_Red.png'" onmouseout="this.src='<?php echo site_url(); ?>assets/images/logosMenu/projets_Black.png'"></a>
					<a class="linkText" href="<?php echo site_url('projets'); ?>">PROJETS</a>
				</li>
				<li id="services">
					<a class="linkimg" href="<?php echo site_url('services'); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/services_Black.png" alt="Logo services" onmouseover="this.src='<?php echo site_url(); ?>assets/images/logosMenu/services_Red.png'" onmouseout="this.src='<?php echo site_url(); ?>assets/images/logosMenu/services_Black.png'"></a>
					<a class="linkText" href="<?php echo site_url('services'); ?>">SERVICES</a>
				</li>
				<li id="contact">
					<a class="linkimg" href="<?php echo site_url('contact'); ?>"><img src="<?php echo site_url(); ?>assets/images/logosMenu/contact_Black.png" alt="Logo contact" onmouseover="this.src='<?php echo site_url(); ?>assets/images/logosMenu/contact_Red.png'" onmouseout="this.src='<?php echo site_url(); ?>assets/images/logosMenu/contact_Black.png'"></a>
					<a class="linkText" href="<?php echo site_url('contact'); ?>">CONTACT</a>
				</li>
			</ul>
		</nav>

		<p class="legals">Aucuns droits réservés - <a href="<?php echo site_url(); ?>legals">Mentions Légales</a> - Design by <a href="http://aubindamien.com" title="Damien AUBIN, Infographiste 3D">Damien AUBIN</a></p>
	</footer>

	<!--<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="http://pgp.mit.edu/pks/lookup?op=get&amp;search=0x329F5F50B1294A46">Clé GPG (Cliquez)</a><br />
	<textarea>AF448137C1017AA436CF0833CD55BEB5F306087434A609801466835E7C163811E06796BDBB7B</textarea><br /><br />-->
			

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/custom.js"></script>

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


		$('footer').mouseenter(function(){
	      $('.legals').slideDown(150);
	      $('.linkText').css('display', 'inline-block');
	   });
	   $('footer').mouseleave(function(){
	      $('.legals').slideUp(150);
	      $('.linkText').css('display', 'none');
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