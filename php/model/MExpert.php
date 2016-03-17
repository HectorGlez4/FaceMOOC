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
			$sql = "INSERT INTO expert ('id_user', 'address', 'phone') VALUES ('%d', '%s', '%s');";
			$sql1 = sprintf($sql, $iduser, $address, $phone);
			//echo $sql1;
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

		


	}
	
	//$mes = new MExpert();
	//echo "\n";
	//var_dump($mes->SelectExpertsALL());