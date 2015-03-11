<?php require('application/views/template/header.php'); ?>

<div class="menuRed">
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
	<div class="conteneur" style="text-align:center;">
		<h2 class="titlePage">{ CURICULUM VITAE }</h2>
		<a class="btn" href="<?php echo site_url(); ?>assets/documents/CV%20Florian%20LE%20GOFF.pdf">Télécharger en PDF</a>
	</div>
</div>


<div class="back1" id="formation">
	<div class="conteneur cv" >
		<h3><a href="#">Formation</a></h3>

		<div class="itemCV open">
			<div class="cvG0">
				<h4>DUT Informatique</h4>

				<p>
					2014-2015: Entrée à l'IUT de Lannion (Université de Rennes 1) en département Informatique.<br />
					Conception, développement, maintenance d'applications informatiques.<br />
					Administration systèmes et réseaux.
				</p>
			</div>

			<div class="cvD0">
				<h4>Baccalauréat Scientique (SI & ISN)</h4>

				<p>
					2014: Baccalauréat Scientifique au Lycée Maupertuis à Saint-Malo.
					Option Sciences de l'Ingénieur, spécialité ISN (Informatique et Sciences du Numérique).
					Mention Assez Bien.
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
					Eté 2014: Auto-entrepreneur dans le développement web afin de pouvoir travailler sur des projets rémunérés en toute légalité.
				</p>
			</div>

			<div class="cvD1">
				<h4>Projet Quadcopter</h4>

				<p>
					2013-2014: Construction d'un Quadcopter réalisant des bilan thermique de bâtiments dans le cadre d'un projet lycéen.
					2eme au concours Bretagne du Rotary Club «une tête et deux mains», présentation et contact avec le milieu professionnel.
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
					Bonne connaissance du frameworks CodeIgniter<br />
					Utilisation du gestionnaire de version Git, protocole SSH avec puTTY et FTP avec FileZilla.<br/>
					Pour plus d'informations, voir la page dédié à mes <a href="<?php echo site_url('competences'); ?>">compétences dans le domaine.</a>
				</p>
			</div>

			<div class="cvG0">
				<h4>Langages Logiciels</h4>

				<p>
					Bonnes bases en C et en Java. Initié au Python.
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
					Bonne compréhension de l'anglais informatique (documentation, API, forum développeurs).
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
					Basket-ball en compétition (meneur de jeu) depuis 12 ans, pratique au niveau régional et plusieurs stages de sélections en équipe départementale.<br />
					Passion du sport et de ses challenges en général.
				</p>
			</div>

			<div class="cvD0">
				<h4>Neutralité du Net</h4>

				<p>
					Neutralité du net, enjeux politique et sociétal sur les questions de la vie privée dans l'espace numérique et physique.<br />
					Grand intérêt autour de l’open-source.
				</p>
			</div>

			<div class="cvG0" >
				<h4>Veille technologique</h4>

				<p>
					Passionés de nouvelles technologies, je réalise une veille permanente autour des nouveautés.
				</p>
			</div>

			<div class="cvD0" >
				<h4>Cinéma</h4>

				<p>
					J'aime les films cultes tel que Fight Club, Requiem For A Dream, Pulp Fiction (Ainsi que tous les autres Tarantino),Inception, Snatch et bien d'autres du même genre.
				</p>
			</div>
		</div>
	</div>
</div>

<?php require('application/views/template/footer.php') ?>