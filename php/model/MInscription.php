<?php
	require_once("Model.php");
	class MInscription extends Model
	{
		function SelectInscriptionsALL()
		{
			return $this->Select("Select * From inscription");
		}

		
		function SelectInscription($idUser)
		{
			$this->Connect();
			$sql = "SELECT * FROM formation WHERE id_user = :idUser";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
			return ($this->Select($stmt));
		}

		function SelectInscriptionByIds($idFormation, $idUser)
		{
			$this->Connect();
			$sql = "SELECT * FROM inscription WHERE id_formation = :idFormation AND id_user = :idUser";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idFormation", $idFormation, PDO::PARAM_INT);
			$stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
			return ($this->Select($stmt));
		}

		function InsertInscription($idFormation, $idUser, $date_inscription)
		{
			$this->Connect();
			$sql = "INSERT INTO inscription (id_formation, id_user, date_inscription)
			 VALUES (:idFormation, :idUser, :date_inscription);";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idFormation", $idFormation, PDO::PARAM_INT);
			$stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
			$stmt->bindParam(":date_inscription", $date_inscription, PDO::PARAM_STR);
			return $this->Insert($stmt);
		}


		function DeleteInscription($idInscription)
		{
			$this->Connect();
			$sql = "DELETE FROM inscription WHERE id_inscription = :idInscription ";
			$sql1 = sprintf($sql, $idInscription);
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idInscription", $idInscription, PDO::PARAM_INT);
			return $this->Delete($stmt);
		}


	}
	
	//$mes = new MInscription();
	//echo "\n";
	//var_dump($mes->SelectFomrationsALL());
	//var_dump($mes->SelectFormation("js css json php java"));