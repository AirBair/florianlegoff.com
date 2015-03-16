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
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="<?php echo site_url('cv'); ?>" >Mon CV</a><br />
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="<?php echo site_url('admin'); ?>" >Espace Admin.</a>
					</p>
				</section>
				<section class="colonneFooter">
					<h5>CONTACT</h5>
					<p>
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> contact@florianlegoff.com<br />
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> ICQ: 669187630<br />
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="idtox" class="clickToTox">ID TOX (Cliquez)</a>
					</p>
				</section>
				<section class="colonneFooter">
					<h5>PARTENAIRES</h5>
					<p>
						<a href="http://aubindamien.com" >Damien AUBIN (Infographiste 3D)</a>
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
	
	<div id="overlay">
		<div class="idTox">
			<p>
				<strong>Identifiant TOX :</strong><br />
				<textarea>CE15213CED196E1A260A3E6D117C96D13EC5B4C93490B8F86005BA38606EB3382C43B71567B9</textarea><br /><br />
				<button>Fermer</button>
			</p>
		</div>
	</div>		

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