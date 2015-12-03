<?php require('application/views/template/header.php'); ?>

<iframe width="100%" height="300px" frameBorder="0" src="https://umap.openstreetmap.fr/fr/map/florian-le-goff_49646?scaleControl=false&miniMap=false&scrollWheelZoom=true&zoomControl=true&allowEdit=false&moreControl=true&datalayersControl=true&onLoadPanel=undefined&captionBar=false"></iframe>

<div class="conteneur formContact">

		<div class="formError" style="display:none;">
			<h4>Erreur(s) dans la validation du formulaire :</h4>
			<div class="errors_validation"></div>
		</div>

		<div class="formSuccess" style="display:none;">
			<h4>Votre message à bien été envoyé !</h4>
			<p>Je vous répondrai au plus vite.</p>
		</div>

	<?php echo form_open('contact'); ?>
		<h3>ME CONTACTER</h3>
			<input type="text" name="nom" id="nom" placeholder="Votre nom" value="<?php echo set_value('nom'); ?>" autofocus /><br />

			<input type="text" name="mail" id="mail" placeholder="Votre e-mail" value="<?php echo set_value('mail'); ?>" /><br />

			<input type="text" name="objet" id="objet" placeholder="Objet du message" value="<?php echo set_value('objet'); ?>" /><br />

			<textarea name="message" id="message" cols="50" rows="10" placeholder="Votre message .." ><?php echo set_value('nom'); ?></textarea><br />

			<input type="submit" id="submit" value="Envoyer" />
	<?php echo form_close(); ?>

	<div class="infosContact" >
		<h3>INFOS COMPLEMENTAIRES</h3>

		<p>
			<span><img src="<?php echo site_url(); ?>assets/images/icones/ico_mail.png" alt="Icone courriel" /> <a href="mailto:contact@florianlegoff.com">contact@florianlegoff.com</a></span>
			<span><img src="<?php echo site_url(); ?>assets/images/icones/ico_key.png" alt="Icone clé" />  <a href="https://pgp.mit.edu/pks/lookup?op=get&search=0x329F5F50B1294A46" target="_blank">Clé GPG</a></span>
			<span><img src="<?php echo site_url(); ?>assets/images/icones/ico_tchat.png" alt="Icone discussion" /> <a href="myToxID">TOX</a></span>
			<span><label>Mon Identifiant</label><textarea rows="1">AF448137C1017AA436CF0833CD55BEB5F306087434A609801466835E7C163811E06796BDBB7B</textarea></span>
		</p>
	</div>
</div>

<script type="text/javascript">
	$(function(){

		// Envoi du mail en AJAX
		$('#submit').click(function() {

			var form_data = {
				nom : $('#nom').val(),
				mail : $('#mail').val(),
				objet : $('#objet').val(),
				message : $('#message').val()
			};

			$.post("<?php echo site_url('contact/send'); ?>", form_data, function(data){
				if(data == "success")
				{
					$('.formError').hide();
					$('.formSuccess').hide();
					$('.formSuccess').slideDown(100);

					// Reset des valeurs du formulaire
					$('input[type="text"]').each(function(){
						$(this).val('');
					})
					$('form textarea').val('');
				}
				else
				{
					$('.formSuccess').hide();
					$('.formError .errors_validation').replaceWith('<div class="errors_validation">'+data+'</div>');
					$('.formError').slideDown(100);
				}
			});

			return false;
		});


		$('a[href="myToxID"').click(function(){
			$('.infosContact label').fadeIn(50);
			$('.infosContact textarea').fadeIn(50);
			return false;
		});
	});
</script>

<?php require('application/views/template/footer.php') ?>
