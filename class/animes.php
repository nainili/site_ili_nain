<?php 
ini_set('display_errors', 1);
class animes
{
	private $methodeDB;
	public function __construct()
	{
		$this->methodeDB = new db();
	}
	
	public function AfficherTousAnimes($p =1)
	{
		if(is_numeric($p))
		{
			if($p <= 1)
			{
				$p = 0; $pp = 9;
			} else {$p = ($p - 1) * 9; }
		$req = $this->methodeDB->ReturnDB()->query("SELECT * FROM animes LIMIT $p,9");
		}
		else { $p = 0;}
		
		while($aff=$req->fetch())
		{
			echo '<a href="?id='.$aff['id'].'&cat=animes"><img class="affiche col-md-4" alt="no_img_found" src="'.$aff['affiche'].'" /></a>';
		}
	}
	
	public function CalculerNombrePagesAnimes()
	{
		$req = $this->methodeDB->ReturnDB()->query("SELECT * FROM animes");
		$nombre = $req->rowCount();
		
		$totalPage = $nombre / 9 + 1;
		echo '<div class="col-md-12 film_a"> <div class="row">';
		for($i = 1; $i < $totalPage; $i++)
		{
			
			echo '<a href=?search=animes&p='.$i.'>'.$i.'</a>';
			
		}
		echo '</div></div>';
	}
	
	public function ChercherAnimesParID($id)
	{
		if(is_numeric($id))
		{
			$id = htmlentities($this->methodeDB->ReturnDB()->quote($id));
			$req = $this->methodeDB->ReturnDB()->query("SELECT * FROM animes WHERE ID=$id");
			if($aff = $req->fetch())
			{
				echo '<div class="col-md-8 film"><div class="container"><div class="row"><div class="col-md-12">';
				echo '<img class="col-md-4 presentations_affiche" alt="no_img_found" src="'.$aff['affiche'].'" />';
				echo '<ul class="droite col-md-6">';
				echo '<li>Titre : '.$aff['titre'].'</li>';
				echo '<li>Date de sortie : '.$aff['date'].'</li>';
				echo '<li>Genre : '.self::ChercherGenresAnime($id).'</li>';
				echo '</ul></div>';
				echo '</div><div class="col-md-12 bande">Episode : '.$aff['episode'].'</div>';
				echo '<iframe class="col-md-12 video" width="1280" height="425" src="'.$aff['lien'].'" frameborder="0" allowfullscreen></iframe>';
				echo '<div class="col-md-12 input_next"><form method="post"><input type="hidden" name="titre" value="'.$aff['titre'].'"><input type="hidden" name="numero" value="'.$aff['episode'].'"><input type="submit" name="suivant" value="suivant" /></form></div>';
				
				
				echo'<input type="text" class="col-md-6 input_commentaire" value="pseudodugars" disabled=""/>
				<textarea class="col-md-12 commentaire"></textarea>
				<input class="col-md-4" type="submit" value="Envoyer le commentaire" /></div>'; 
				// impossible d'envoyer un message si non inscrit, le pseudo n'est pas modifiable sauf dans une page "compte"
				echo'
						<div class="aff_commentaire col-md-12"> 
				<div class="col-md-12 auteur">$afficher_pseudo $heure/date</div>
				<div class="col-md-12 message">ici on affiche les messages</div>
				
				<div class="col-md-12 auteur">$afficher_pseudo $heure/date</div>
				<div class="col-md-12 message">ici on affiche les messages</div>
				
				<div class="col-md-12 auteur">$afficher_pseudo $heure/date</div>
				<div class="col-md-12 message">ici on affiche les messages</div>
				
				<div class="col-md-12 auteur">$afficher_pseudo $heure/date</div>
				<div class="col-md-12 message">ici on affiche les messages</div>
				
				</div></div>';
				echo'</div>	</div></div>';
				
			}
		}
	}
	
	private function ChercherGenresAnime($id)
	{
		$genre = "";
		$req = $this->methodeDB->ReturnDB()->query("SELECT genre FROM genres,animes,genresSeries WHERE genres.id=id_genre AND animes.id=id_film AND animes.id=$id");
		while($aff=$req->fetch())
		{
			$genre = $aff['genre'].' '.$genre;
		}
		return $genre;
	}
	
	public function ChercherAnimeSuivant($titre, $numero)
	{
		$numero +=1;
		$titre = htmlentities($this->methodeDB->ReturnDB()->quote($titre));
		$numero = htmlentities($this->methodeDB->ReturnDB()->quote($numero));
		
		$req = $this->methodeDB->ReturnDB()->query("SELECT id FROM animes WHERE titre=$titre AND episode=$numero");
		if($aff=$req->fetch())
		{
			//echo "test";
			header('Location: ?id='.$aff['id'].'&cat=animes');
		}
	}
}


?>