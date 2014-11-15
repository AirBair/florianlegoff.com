	<footer>

		<div class="foot1">
			<div class="conteneur">
				<section class="colonneFooter">
					<h5>PLAN DU SITE</h5>
					<p>
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="<?php echo site_url('profil'); ?>" >Profil</a><br />
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="<?php echo site_url('competences'); ?>" >Compétences</a><br />
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="<?php echo site_url('projets'); ?>" >Projets</a><br />
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="<?php echo site_url('services'); ?>" >Services</a><br />
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="<?php echo site_url('contact'); ?>" >Contact</a>
					</p>
				</section>
				<section class="colonneFooter">
					<h5>INFORMATIONS</h5>
					<p>
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="<?php echo site_url('legals'); ?>" >Mentions légales</a><br />
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="<?php echo site_url('cv'); ?>" >Mon CV</a>
					</p>
				</section>
				<section class="colonneFooter">
					<h5>CONTACT</h5>
					<p>
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> contact@florianlegoff.com<br />
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> ICQ: 669187630<br />
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> ID TOX (Cliquez)
					</p>
				</section>
				<section class="colonneFooter">
					<h5>PARTENAIRES</h5>
					<p>
						<a href="http://aubindamien.com" >Damien AUBIN<br />(graphiste, modélisateur et animateur 3D)</a>
					</p>
				</section>
			</div>
		</div>

		<div class="foot2">
			<div class="conteneur">
				<p>Aucuns droits réservés - Copy Me - Design par <a href="http://aubindamien.com" >Damien AUBIN</a></p>
			</div>
		</div>

		<div class="foot3">
			<div class="conteneur">

			</div>
		</div>

	</footer>
			

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/custom.js"></script>
	<script type="text/javascript">
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
	</script>
	
	</body>

</html>