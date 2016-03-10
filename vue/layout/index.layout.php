<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, user-scalable=no" >
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="transparent" />

		<link href='vue/css/css.css' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="vue/css/reset.css">

		<!-- CSS reset -->
		<link rel="stylesheet" href="vue/css/style.css">

		<!-- Resource style -->
		<script src="vue/js/modernizr.js"></script><!-- Modernizr -->

		<title>Visit by Best Western</title>
	</head>

	<body>

		<header>
			<div id="gauche" style="padding: 10px;">
		 		<a class="title-link" href="#">< Retour sur l'accueil</a>
			</div>
			<div id="droite">
				<img style="width: 45px; padding: 10px;" src="vue/img/loupe.svg">
			</div>
	 	</header>

		<div class="background-image"></div>
		<div class="mask"></div>
		<!-- Début de la section des évènements de la timeline -->
		<section id="cd-timeline" class="cd-container">

			<!-- Popup d'activation Bluetooth -->
			<!-- <div class="container">
				 <div class="overlay"></div>
				 <div class="popup one">
						<h3>Aucune activité Bluetooth détectée!</h3>
						<p>Pour participer à ce programme la technologie Bluetooth de votre téléphone doit être activée.</p>
						<ul>
							 <li><button id="closePopUpOne">J'ai compris</button></li>
						</ul>
				 </div>
			</div> -->

			<!-- Popup de sélection de satisfaction -->
			<div class="container" id="popupJs">
				<div class="overlay"></div>
				<div class="popup one activity">
				 <div class="cd-timeline-img centered cd-green">
					 <img src="vue/img/coffee.svg" alt="Petit déjeuner">
				 </div>

					<h3>Activité terminée!</h3>
					<p>Avez-vous apprécié ?</p>

					<ul>
						 <li class="circl-smile"><a id="closePopUpSmile" href="#"><img src="vue/img/boy-smile.svg" alt="Satisfait"></a></li>
						 <li class="circl-sad"><a id="closePopUpSad" href="#"><img src="vue/img/boy-normal.svg" alt="Non satisfait"></a></li>
					</ul>
				</div>
			</div>

			<?php
				foreach($tableau as $key => $value):
				sscanf($value["activities"], "%4s-%2s-%2s %2s:%2s:%2s", $an, $mois, $jour, $heure, $min, $sec);
			?>
			<div class="cd-timeline-block">
				<span class="cd-date"><?php echo $heure; ?>:<?php echo $min; ?></span>
				<a href="#">
					<div class="cd-timeline-img cd-orange"> <img src="vue/img/coffee.svg" alt="<?php echo $name; ?>"> </div>
					<!-- cd-timeline-img -->
				</a>

				<div class="cd-timeline-content">
					<h2 class="center"><?php echo $value["name"]; ?></h2>
					<!-- <div class="cd-timeline-img centered cd-red">
						<img src="img/boy-normal.svg" alt="Non satisfait">
					</div> -->
				</div>
				<!-- cd-timeline-content -->
			</div>
			<!-- cd-timeline-block -->
			<?php
				endforeach;
			?>
		</section>

		<div class="push">
		</div>
		<!-- cd-timeline -->

		<footer>
			<a class="footer-button" href="#"></a>

			<div class="item-menu">
				<a href="#" class="home">Accueil</a>
				<a href="#" class="messages">Messages</a>
				<a href="#" class="conciergerie">Conciergerie</a>
				<a href="#" class="visit">Votre séjour</a>

				<a href="#" class="breakfast">Petit déjeuner</a>
				<a href="#" class="map">Carte</a>
				<a href="#" class="service">Services d'affaires</a>
				<a href="#" class="more">Plus</a>
			</div>
		</footer>

		<script src="vue/js/jquery.js"></script>
		<script src="vue/js/main.js"></script> <!-- Resource jQuery -->

	</body>
</html>
