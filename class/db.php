<?php

class db
{
	private $login = 'kess';
	private $mdp='69KUrzf3';
	
	
	public function ReturnDB()
	{
		try
		{
			$DB=new PDO("mysql:host=localhost;dbname=mtf",$this->login,$this->mdp);
		}
		catch(Exception $e)
		{
			echo "$e->getMessage()";
		}
		return $DB;
	}
	
	public function ExecuterSQL($requete)
	{
		if(self::ReturnDB()->query($requete))
		{
			return true;
		}
		return false;
	}
	
	
		
}





?>