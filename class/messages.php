<?php 

class messages
{
	private $methodeDB;
	public function __construct()
	{
		$this->methodeDB = new db();
	}
	
	public function AfficherCommentairesVideo($id_video, $genre_video)
	{
		$methodesUtilisateurs = new utilisateurs();
		$req = $this->methodeDB->ReturnDB()->query("SELECT * FROM commentaires WHERE id_video=$id_video AND genre_video='$genre_video' ORDER BY id DESC");
		while($aff=$req->fetch())
		{
			echo '<div class="col-md-12 auteur">'.$methodesUtilisateurs->ChercherPseudoUtilisateurParId($aff['id_user']).' '.$aff['date'].' '.$aff['heure'].'</div>';
			echo '<div class="col-md-12 message">'.$aff['message'];
				if($aff['commentaire_admin'] != null) { echo '<div class="admin container"><div class="admin_top">Administrateur : </div>'.$aff['commentaire_admin'].'</div>'; }
			echo '</div>';
		}
	}
	
	public function PosterCommentaire($message, $id_video, $genre_video)
	{
		$DB = $this->methodeDB->ReturnDB();
		$id_user = $_SESSION['id'];
		$date = date("d/m/Y");
		$heure = date("H:i:s");
		$message = htmlentities($DB->quote($message));
		$id_video = htmlentities($DB->quote($id_video));
		$genre_video = htmlentities($DB->quote($genre_video));
		if($DB->query("INSERT INTO commentaires SET id_user='$id_user', message=$message, id_video=$id_video, genre_video=$genre_video, date='$date', heure='$heure'"))
		{
			echo "Commentaire posté";
		}
		else
		{
			echo "Une erreur est survenue";
		}
	}
}