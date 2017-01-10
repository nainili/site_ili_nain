<!DOCTYPE html>
<html>
	<head>
		<?php session_start(); include("loader.php"); ini_set('display_errors', 1); ?>
		<title>Matonfilm</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css"> 
		<script src="./js/utils.js"></script>  
	</head>
	<body>
		<header class="col-md-12">
			<a href="./index.php"><img src="./img/logo.png" alt="logo" /></a>
		</header>
		
		<div class="container">
			<div class="col-md-12 menu navbar">
				<ul>
					<li class="col-md-3">
						<a href="./index.php">
							<img src="./img/acc.png" alt="acc" />
						</a>
					</li>
					<li class="col-md-3">
						<a href="./index.php">
							<img src="./img/films.png" alt="films" />
						</a>
					</li>
					<li class="col-md-3">
						<a href="./index.php">
							<img src="./img/series.png" alt="series" />
						</a>
					</li>
					<li class="col-md-3">
						<a href="./index.php">
							<img src="./img/animes.png" alt="animes" />
						</a>
					</li>
				</ul>
			</div>
		</div>
		
		<div class="container">			
			<div class="col-md-12 general_affichage">
				<div class="col-md-12 recherche gauche">
					<form method="" action="">
						<ul>
							<li><input class="input_search" type="text"  /> </li>
							<li><img src="./img/ok.png" class="input_button" type="submit" name="" /></li>
						</ul>
					</form>
				</div>
				<div class="col-md-12">
					<?php 
						if(isset($_GET['cat']))
							if($_GET['cat'] == "film")
							{
								$methodeF = new films();
									if(isset($_GET['p']))
										$methodeF->AfficherTousFilms($_GET['p']);
									else
										$methodeF->AfficherTousFilms();
								echo "</div>";
								echo '<div class="col-md-12 affichage_num_page">Pages : '.$methodeF->CalculerNombrePagesFilms().' </div>';
							}
							elseif($_GET['cat'] == "serie")
							{
								$methodeS = new series();
									if(isset($_GET['p']))
										$methodeS->AfficherTousSeries($_GET['p']);
									else
										$methodeS->AfficherTousSeries();
								echo "</div>";
								echo '<div class="col-md-12 affichage_num_page">Pages : '.$methodeS->CalculerNombrePagesSeries().' </div>';
							}
							else
							{
								$methodeA = new animes();
									if(isset($_GET['p']))
										$methodeA->AfficherTousAnimes($_GET['p']);
									else
										$methodeA->AfficherTousAnimes();
								echo "</div>";
								echo '<div class="col-md-12 affichage_num_page">Pages : '.$methodeA->CalculerNombrePagesAnimes().' </div>';
							}
								
					?>

				<!-- ici t'avais mis un </div> et un <div class="md 12 affichage_num_page"></div>  je l'ai bougé plus haut lignes : 63 64 - 73 74 - 83 84 -->
			</div>
		</div>
		
		<div class="container">
			<footer class="col-md-12">
					<div class="col-md-12 footer1">
						
					</div>
			</footer>
		</div>
	
	</body>
</html>