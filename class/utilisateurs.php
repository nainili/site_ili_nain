<?php 

class utilisateurs
{
	private $methodeDB;
	public function __construct()
	{
		$this->methodeDB = new db();
	}
	
	public function ChercherPseudoUtilisateurParId($id)
	{
		$req = $this->methodeDB->ReturnDB()->query("SELECT pseudo FROM comptes WHERE id=$id");
		if($aff = $req->fetch())
		{
			return $aff['pseudo'];
		}
			return "N/A";
	}
}
	
?>