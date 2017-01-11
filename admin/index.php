<!DOCTYPE html>
<html>
	<head>
		<title>Matonfilm</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/stylesadmin.css">
		<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css"> 
		<script src="../js/utilsadmin.js"></script>  
	</head>
	<body>
		<header>
			<h1>Administrations</h1>
		</header>
		<div class="col-md-3 menu">
			<label class="col-md-12" onclick="film();">Ajout de films</label>
			<label class="col-md-12" onclick="serie();">Ajout de séries</label>
			<label class="col-md-12" onclick="anime();">Ajout d'animes</label>
		</div>
		<div class="col-md-9 contenu">
			<div class="col-md-9 film" id="1">
				<div class="row">
					<input class="col-md-4" type="text" placeholder="Titre" />
					<input class="col-md-4" type="date"/>
				</div>
				<div class="row">
					<input class="col-md-4" type="text" placeholder="Genre" />
					<select class="col-md-4">
						<option value="youtube">Youtube</option>
					</select>
				</div>
				<div class="row">
					<textarea class="col-md-12" placeholder="Synopsys"></textarea>
				</div>
				<div class="row">
					<input type="submit" value="Envoyer la vidéo" />
				</div>
			</div>
			<div class="col-md-9 serie" id="2">
				sdff
			</div>
			<div class="col-md-9 anime" id="3">
				sdff
			</div>
		</div>
	</body>
</html>