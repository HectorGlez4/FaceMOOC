<?php
	require_once("Model.php");
	class MExpert extends Model
	{
		function SelectExpertsALL()
		{
			$this->Connect();
			$sql = "Select * From expert";
			$stmt = $this->PDO->prepare($sql);
			return $this->Select($stmt);
		}

		function InsertExpert($idUser, $address, $phone)
		{
			$this->Connect();
			$sql = "INSERT INTO expert (id_user, address, phone)
			VALUES (:idUser, :address, :phone);";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
			$stmt->bindParam(":address", $address, PDO::PARAM_STR);
			$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
			return $this->Insert($stmt);
		}


		function DeleteExpert($idExpert)
		{
			$this->Connect();
			$sql = "DELETE FROM expert WHERE id_expert = :idExpert ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idExpert", $idExpert, PDO::PARAM_INT);
			return $this->Delete($stmt);
		}

		function UpdateExpert($address, $phone, $idExpert)
		{
			$this->Connect();
			$sql = "UPDATE expert SET address = :address, phone = :phone WHERE id_expert = :idExpert ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":address", $address, PDO::PARAM_STR);
			$stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
			$stmt->bindParam(":idExpert", $idExpert, PDO::PARAM_INT);
			return $this->Update($stmt);
		}

		function SelectExpertId($idUser)
		{
			$this->Connect();
			$sql = "SELECT id_expert FROM expert WHERE id_user = :id_user ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":id_user", $idUser, PDO::PARAM_INT);
			return $this->Select($stmt);
		}

		function SelectExpertIdByEmail($email) {
			$this->Connect();
			$sql = "SELECT id_expert FROM expert JOIN user ON expert.id_user = user.id_user WHERE email = :email ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_INT);
			return $this->Select($stmt);
		}
	}
	
	//$mes = new MExpert();
	//echo "\n";
	//var_dump($mes->SelectExpertsALL());