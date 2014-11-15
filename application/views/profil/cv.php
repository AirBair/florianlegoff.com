<?php require('application/views/template/header.php'); ?>

<div class="menuCV">
	<div class="conteneur">
		<p>
			<a href="#formation">FORMATION</a>
			<a href="#exppro">EXP. PRO</a>
			<a href="#skills">COMPETENCES</a>
			<a href="#langues">LANGUES</a>
			<a href="#interets">INTERETS</a>
		</p>
	</div>
</div>

<div class="back0">
	<div class="conteneur cv">
		<h2>{ CURICULUM VITAE }</h2>
		<p class="dlPdf" ><a class="btn" href="<?php echo site_url(); ?>assets/documents/CV%20Florian%20Le%20Goff.pdf">Télécharger en PDF</a></p>
	</div>
</div>


<div class="back1" id="formation">
	<div class="conteneur cv" >
		<h3><a href="#">Formation</a></h3>

		<div class="itemCV open">
			<div class="cvG0">
				<h4>DUT Informatique</h4>

				<p>
					Entrée en DUT (Diplome Universitaire Technologique) Informatique à l'IUT de Lannion.<br />
					Cursus en 2ans, qui peut se poursuivre sur une licence pro ou une école d'ingénieur.
				</p>
			</div>

			<div class="cvD0">
				<h4>Baccalauréat Scientique (SI & ISN)</h4>

				<p>
					Obtention du baccalauréat Scientifique, filière SI (Science de l'ingénieur) et spécialité ISN (Informatique et Sciences du Numérique).<br />
					Mention Assez Bien.<br />
					Lycée Maupertuis à Saint-Malo.
				</p>
			</div>
		</div>
	</div>
</div>

<div class="back0" id="exppro">
	<div class="conteneur cv" >
		<h3><a href="#">Expériences Professionelles</a></h3>

		<div class="itemCV open">
			<div class="cvG1">
				<h4>Auto-entrepreneur</h4>

				<p>
					Déclaration en tant qu'auto-entrepreneur dans le développement web afin de pouvoir travailler légalement sur divers projets payés.
				</p>
			</div>

			<div class="cvD1">
				<h4>Projet Quadcopter</h4>

				<p>
					Construction d'un quadcopter (=drone), dont l'objectif était de réaliser le bilant thermique de grand batiment.<br/>
					Participation au concours du Rotary Club "Une tête et 2 mains".<br />
					Expérience professionnel de par les contacts que j'ai eu l'occasion d'avoir ..
				</p>
			</div>
		</div>
	</div>
</div>

<div class="back1" id="skills">
	<div class="conteneur cv">

		<h3><a href="#">Compétences</a></h3>

		<div class="itemCV open">
			<div class="cvG0">
				<h4>Systèmes d'exploitations</h4>

				<p>
					Bonnes connaissances des systèmes d'exploitations Windows et Unix (Linux).
				</p>
			</div>

			<div class="cvD0">
				<h4>Langages et Outils de Développement Web</h4>

				<p>
					Maîtrise de HTML/CSS, JavaScript/AJAX (jQuery), PHP/MySQL.<br />
					Bonne connaissance du frameworks CodeIgniter et débutant sur Laravel<br />
					Utilisation du gestionnaire de version Git, protocole SSH avec puTTY et FTP avec FileZilla.<br/>
					Pour plus d'informations, voir la page dédié à mes <a href="<?php echo site_url('competences'); ?>">compétences dans le domaine.</a>
				</p>
			</div>

			<div class="cvG0">
				<h4>Langages Logiciels</h4>

				<p>
					Niveau moyen en C, débutant en C++, JAVA et Python.
				</p>
			</div>
		</div>
	</div>
</div>

<div class="back0" id="langues">
	<div class="conteneur cv">
		<h3><a href="#">Langues</a></h3>

		<div class="itemCV open">
			<div class="cvG1">
				<h4>Anglais</h4>

				<p>
					Niveau B2.<br />
				</p>
			</div>
		</div>
	</div>
</div>

<div class="back1" id="interets">
	<div class="conteneur cv">

		<h3><a href="#">Centres d'intêrets</a></h3>

		<div class="itemCV open">
			<div class="cvG0">
				<h4>Basket-Ball</h4>

				<p>
					Je pratique le basket-Ball en compétition (meneur de jeu) depuis 12 années. J'ai joué en niveau régional et fais plusieurs stages de sélections en équipe départementale.<br/>
					D'une manière générale, j'aime le sport et ses challenges en général.
				</p>
			</div>

			<div class="cvD0">
				<h4>Neutralité du Net</h4>

				<p>
					Fervant défenseur de la neutralité du net, je m'intéresse à la politique sur les questions de la vie privée dans l'espace numérique et physique.
				</p>
			</div>

			<div class="cvG0" >
				<h4>Cinéma</h4>

				<p>
					J'aime les films cultes tel que Fight Club, Requiem For A Dream, Pulp Fiction (Ainsi que tous les autres Tarantino),Inception, Snatch et bien d'autres du même genre.
				</p>
			</div>
		</div>
	</div>
</div>

<?php require('application/views/template/footer.php') ?>