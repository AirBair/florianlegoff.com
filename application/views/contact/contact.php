<?php require('application/views/template/header.php'); ?>
	


	<div class="borderRed" >
		<section class="map" id="map_canvas">
		</section>
	</div>


	<div class="back1">
		<div class="conteneur">
			<div class="formContact">
				<?php echo form_open('contact'); ?>
						<label for="nom">Votre nom :</label>
						<input type="text" name="nom" id="nom" value="<?php echo set_value('nom'); ?>" required autofocus /><br />
						
						<label for="mail">Votre e-mail :</label>
						<input type="text" name="mail" id="mail" value="<?php echo set_value('mail'); ?>" required /><br />
						
						<label for="objet">Objet :</label>
						<input type="text" name="objet" id="objet" value="<?php echo set_value('objet'); ?>" required /><br />
						
						<textarea name="message" id="message" cols="50" rows="10" required ><?php echo set_value('nom'); ?></textarea><br />
						<input type="submit" value="Envoyer" />
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>

	 <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
	<script>
		window.onload = function() {
			initialize();
		}
		function initialize() {
		var map = new OpenLayers.Map("map_canvas");
		map.addLayer(new OpenLayers.Layer.OSM());
		var lonLatSC = new OpenLayers.LonLat(-1.9099408, 48.6732632).transform(
		new OpenLayers.Projection("EPSG:4326"),
		map.getProjectionObject()
		);
		var lonLatLa = new OpenLayers.LonLat(-3.4607045160029, 48.728804628937).transform(
		new OpenLayers.Projection("EPSG:4326"),
		map.getProjectionObject()
		);
		var zoom = 9;
		var markers = new OpenLayers.Layer.Markers("Markers");
		map.addLayer(markers);
		markers.addMarker(new OpenLayers.Marker(lonLatSC));
		markers.addMarker(new OpenLayers.Marker(lonLatLa));
		map.setCenter (lonLatSC, zoom);
		}
		</script> 

<?php require('application/views/template/footer.php') ?>