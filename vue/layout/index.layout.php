<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, user-scalable=no" >
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="yes" />
		<link rel="icon" type="image/png" href="vue/img/logo-apple.png" />

		<link rel="apple-touch-icon" sizes="57x57" href="vue/img/icons/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="vue/img/icons/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="vue/img/icons/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="vue/img/icons/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="vue/img/icons/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="vue/img/icons/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="vue/img/icons/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="vue/img/icons/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="vue/img/icons/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="vue/img/icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="vue/img/icons/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="vue/img/icons/favicon-16x16.png">

		<link rel="manifest" href="/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="vue/img/icons/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<link href='vue/css/css.css' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="vue/css/reset.css">

		<!-- CSS reset -->
		<link rel="stylesheet" href="vue/css/style.css">

		<!-- Resource style -->
		<script src="vue/js/modernizr.js"></script><!-- Modernizr -->

		<title>eConcierge</title>
	</head>

	<body>

		<header>
			<div id="gauche" style="padding: 10px;">
		 		<a class="title-link" href="/home">&#10094; Retour sur l'accueil</a>
			</div>
			<div id="droite">
				<img class="timeline-search" src="vue/img/loupe.svg">
			</div>
	 	</header>

		<div class="background-image"></div>

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
				 <div id="modifyClass" class="cd-timeline-img centered">
					 <img id="current-activity"  alt="Activité en cours">
				 </div>

					<h3>Activité terminée!</h3>
					<p id="typeActivite"></p>
					<p>Avez-vous apprécié ?</p>

					<ul>
						 <li class="circl-smile"><a id="closePopUpSmile" href="#"><img src="vue/img/content-white.svg" alt="Satisfait"></a></li>
						 <li class="circl-sad"><a id="closePopUpSad" href="#"><img src="vue/img/pas-content-white.svg" alt="Non satisfait"></a></li>
					</ul>
				</div>
			</div>

			<?php
				foreach($tableau as $key => $value):
				sscanf($value["date_heure"], "%4s-%2s-%2s %2s:%2s:%2s", $an, $mois, $jour, $heure, $min, $sec);
				$name = $value["name"];
			?>
			<div class="cd-timeline-block">
				<span class="cd-date"><?php echo $heure; ?>:<?php echo $min; ?></span>
				<a href="#" onclick="javascript:;">
					<div class="cd-timeline-img cd-<?php
						switch($name) {
							case 'Restaurant':
								echo "red";
								break;
							case 'Piscine':
								echo "blue";
								break;
							case 'Petit Dejeuner':
								echo "orange";
								break;
							case 'Reveil':
								echo "purple";
								break;
							case 'Soutenance':
								echo "bluecyan";
								break;
							default:
								echo "orange";
								break;
						}?>"> <img src="vue/img/<?php
							switch($name) {
								case 'Restaurant':
									echo "eat";
									break;
								case 'Piscine':
									echo "swim";
									break;
								case 'Petit Dejeuner':
									echo "coffee";
									break;
								case 'Reveil':
									echo "sleep";
									break;
								case 'Soutenance':
									echo "book";
									break;
								default:
									break;
							}
						?>.svg" alt="<?php echo $value["name"]; ?>"> </div>
					<!-- cd-timeline-img -->
				</a>

				<div class="cd-timeline-content">
					<h2 class="center"><?php echo $value["name"]; ?></h2>
					<!-- <div class="cd-timeline-img centered cd-red"> -->
					<?php if($value["type"] == "sad"): ?>
						<img src="vue/img/pas-content.svg" alt="Non satisfait">
					<?php else: ?>
						<img src="vue/img/content.svg" alt="Satisfait">
					<?php endif; ?>
					<!-- </div>  -->
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
				<nav>
					<ul>
						<li><a href="home" class="home">Accueil</a></li>
						<li><a href="#" class="messages">Messages</a></li>
						<li><a href="#" class="conciergerie">Repas</a></li>
						<li><a href="#" class="visit">Votre séjour</a></li>

						<li><a href="#" class="breakfast">Petit déjeuner</a></li>
						<li><a href="#" class="map">Carte</a></li>
						<li class="active"><a href="#" class="logo-active active">Visit</a></li>
						<li><a href="#" class="more">Plus</a></li>
					</ul>
				</nav>
			</div>
		</footer>

		<script src="vue/js/jquery.js"></script>
		<script src="vue/js/main.js"></script> <!-- Resource jQuery -->

	</body>
</html>
