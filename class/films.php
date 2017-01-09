<?php 

class films
{
	private $methodeDB;
	public function __construct()
	{
		$this->methodeDB = new db();
	}
	
	public function AfficherTousFilms($p =1)
	{
		if(is_numeric($p))
		{
			if($p <= 1)
			{
				$p = 0; $pp = 9;
			} else {$p = ($p - 1) * 9; }
		$req = $this->methodeDB->ReturnDB()->query("SELECT * FROM films LIMIT $p,9");
		}
		else { $p = 0;}
		
		while($aff=$req->fetch())
		{
			echo '<a href="?id='.$aff['id'].'&cat=films"><img class="affiche col-md-4" alt="no_img_found" src="'.$aff['affiche'].'" /></a>';
		}
	}
	
	public function CalculerNombrePagesFilms()
	{
		$req = $this->methodeDB->ReturnDB()->query("SELECT * FROM films");
		$nombre = $req->rowCount();
		
		$totalPage = $nombre / 9 + 1;
		echo '<div class="col-md-12 film_a"> <div class="row">';
		for($i = 1; $i < $totalPage; $i++)
		{
			
			echo '<a href=?search=films&p='.$i.'>'.$i.'</a>';
			
		}
		echo '</div></div>';
	}
	
	public function ChercherFilmsParID($id)
	{
		$methodesMessages = new messages();
		if(is_numeric($id))
		{
			$id = htmlentities($this->methodeDB->ReturnDB()->quote($id));
			$req = $this->methodeDB->ReturnDB()->query("SELECT * FROM films WHERE ID=$id");
			if($aff = $req->fetch())
			{
			echo '<div class="col-md-8 film">
					<div class="container"><div class="row">
						<div class="col-md-12">';
							echo '<img class="col-md-4 presentations_affiche" alt="no_img_found" src="'.$aff['affiche'].'" />';
							echo '<ul class="droite col-md-6">';
								echo '<li>Titre : '.$aff['titre'].'</li>';
								echo '<li>Date de sortie : '.$aff['date'].'</li>';
								echo '<li>Genre : '.self::ChercherGenresFilm($id).'</li>';
							echo '</ul>
						</div>';
							echo '<div class="col-md-12 bande" style="height:24px;"></div>';
							echo '<iframe class="col-md-12 video" width="1280" height="425" src="'.$aff['lien'].'" frameborder="0" allowfullscreen></iframe>';
				
							echo'<form method="post" id="form_com"> 
									<div class="container"><input type="text" class="col-md-6 input_commentaire" value="'.$_SESSION['pseudo'].'" disabled=""/>
										<textarea class="col-md-12 commentaire" name="commentaire"></textarea>
										<input class="col-md-4" type="submit" value="Envoyer le commentaire" />
									</div>
								</form>
								<div id="erreur"></div>'; 
								echo '<div class="col-md-12" id="commentaire">';
									//impossible d'envoyer un message si non inscrit, le pseudo n'est pas modifiable sauf dans une page "compte"
									$methodesMessages->AfficherCommentairesVideo($id, "films");
				
								echo '</div>';
					echo'</div>
					</div>
				</div>
			</div>';
			}
		}
	}
	
	private function ChercherGenresFilm($id)
	{
		$genre = "";
		$req = $this->methodeDB->ReturnDB()->query("SELECT genre FROM genres,films,genresFilms WHERE genres.id=id_genre AND films.id=id_film AND films.id=$id");
		while($aff=$req->fetch())
		{
			$genre = $aff['genre'].' '.$genre;
		}
		return $genre;
	}
	
	public function ChercherFilmsParGenre($genre)
	{
		$genre = htmlentities($this->methodeDB->ReturnDB()->quote($genre));
		$req = $this->methodeDB->ReturnDB()->query("SELECT * FROM vuegenrefilms WHERE genre=$genre");
		while($aff=$req->fetch())
		{
			echo "<li><a href='?id=".$aff['id']."&cat=films'>".$aff['titre']." ".$aff['date']."</a></li>";
		}
	}
	
	public function AfficherTroisDerniersAjoutsFilms()
	{
		
		$req = $this->methodeDB->ReturnDB()->query("SELECT * FROM films ORDER BY id DESC LIMIT 3");
		while($aff=$req->fetch())
		{
			echo '<a href="?id='.$aff['id'].'&cat=films"><img class="affiche col-md-4" alt="no_img_found" src="'.$aff['affiche'].'" /></a>';
		}
	}
	
	
}


?>