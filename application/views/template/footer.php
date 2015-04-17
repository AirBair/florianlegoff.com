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
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="<?php echo site_url('admin'); ?>" >Espace Admin.</a><br />
						<?php if($this->session->userdata('logged') == true): ?>
							<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="http://stats.florianlegoff.com" >Piwik</a><br />
							<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="http://cloud.florianlegoff.com" >Cloud</a>
					</p><?php endif; ?>
				</section>
				<section class="colonneFooter">
					<h5>CONTACT</h5>
					<p>
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="mailto:contact@florianlegoff.com">contact@florianlegoff.com</a><br />
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="http://pgp.mit.edu/pks/lookup?op=get&amp;search=0x329F5F50B1294A46">Clé GPG (Cliquez)</a><br />
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="idtox" class="clickToTox">ID TOX (Cliquez)</a>
					</p>
				</section>
				<section class="colonneFooter">
					<h5>PARTENAIRES</h5>
					<p>
						<img src="<?php echo site_url(); ?>assets/images/icoFooter" alt="Icones liens footer" /> <a href="http://www.aubindamien.com" >Damien AUBIN (Infographiste 3D)</a>
					</p>
				</section>
			</div>
		</div>

		<div class="foot2">
			<div class="conteneur">
				<p>Aucuns droits réservés - Copy Me - Design par <a href="http://www.aubindamien.com" >Damien AUBIN</a></p>
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
				<textarea>AF448137C1017AA436CF0833CD55BEB5F306087434A609801466835E7C163811E06796BDBB7B</textarea><br /><br />
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