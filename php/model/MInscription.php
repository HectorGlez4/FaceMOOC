<?php
	require("Model.php");
	class MInscription extends Model
	{
		function SelectInscriptionsALL()
		{
			return $this->Select("Select * From inscription");
		}

		
		function SelectInscription($idUser)
		{
			$sql = "SELECT * FROM formation WHERE id_user = %d";
			$sql1 = sprintf($sql, $idUser);
			return ($this->Select($sql1));
		}

		function InsertInscription($idFormation, $idUser, $date_inscription)
		{
			$this->Connect();
			$sql = "INSERT INTO formation ('id_formation', 'id_user', 'date_inscription') VALUES ('%d', '%d', '%s');";
			$sql1 = sprintf($sql, $idFormation, $idUser, $date_inscription);
			//echo $sql1;
			if($this->Insert($sql1))
			{
				return true;
			}
			return false;
		}


		function DeleteInscription($idInscription)
		{
			$this->Connect();
			$sql = "DELETE FROM inscription WHERE id_inscription = %d ";
			$sql1 = sprintf($sql, $idInscription);
			//echo $sql1;
			if($this->Delete($sql1))
			{
				return true;
			}
			return false;
		}
	}
	
	//$mes = new MInscription();
	//echo "\n";
	//var_dump($mes->SelectFomrationsALL());
	//var_dump($mes->SelectFormation("js css json php java"));