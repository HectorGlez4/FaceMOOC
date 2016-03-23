<?php
	require_once("Model.php");
	class MExpert extends Model
	{
		function SelectExpertsALL()
		{
			return $this->Select("Select * From expert");
		}

		/*
		function SelectExpert($param)
		{
			

		}*/

		function InsertExpert($iduser, $address, $phone)
		{
			$this->Connect();
			$sql = "INSERT INTO expert (id_user, address, phone) VALUES (%d, '%s', '%s');";
			$sql1 = sprintf($sql, $iduser, $address, $phone);
			echo $sql1;
			if($this->Insert($sql1))
			{
				return true;
			}
			return false;
		}


		function DeleteExpert($idExpert)
		{
			$this->Connect();
			$sql = "DELETE FROM expert WHERE id_expert = %d ";
			$sql1 = sprintf($sql, $idExpert);
			//echo $sql1;
			if($this->Delete($sql1))
			{
				return true;
			}
			return false;
		}

		function UpdateExpert($address, $phone, $idExpert)
		{
			$this->Connect();
			$sql = "UPDATE expert SET address = '%s', phone = '%s' WHERE id_expert = %d ";
			$sql1 = sprintf($sql, $address, $phone, $idExpert);
			//echo $sql1;
			if($this->Update($sql1))
			{
				return true;
			}
			return false;
		}

		function SelectExpertId($idUser)
		{
			try
			{
				$Data = null;
				$this->Connect();
				$sql = "SELECT id_expert FROM expert WHERE id_user = :id_user ";
				$stmt = $this->PDO->prepare($sql);
				$stmt->bindParam(":id_user", $idUser, PDO::PARAM_STR);
				$stmt->execute();
				while($Row =$stmt->fetch(PDO::FETCH_ASSOC))
				{
					$Data[]=$Row;
				}
				return  $Data;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			finally
			{
				$this->Close_Connection();
			}

		}

		


	}
	
	//$mes = new MExpert();
	//echo "\n";
	//var_dump($mes->SelectExpertsALL());