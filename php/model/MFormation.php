<?php
	require("Model.php");
	class MFormation extends Model
	{
		function SelectFomrationsALL()
		{
			return $this->Select("Select * From formation");
		}

		
		function SelectFormation($keywords)
		{
			
			$keyarray = explode(" ", $keywords);
			$Data = null;
			$sql = "SELECT * FROM formation ";
			foreach ($keyarray as $key => $value) {
				if ($key== 0)
				{
					$sql .= "WHERE keywords LIKE '%$value%'";
				}
				else
				{
					$sql .= " OR keywords LIKE '%$value%'";
				}				
			}
			//echo $sql;
			return ($this->Select($sql));
		}

		function InsertFormation($idExpert, $title, $description, $image
								, $req_skill, $difficulty, $keywords )
		{
			$this->Connect();
			$sql = "INSERT INTO expert (`id_user`, `address`, `phone`) VALUES ('%d', '%s', '%s');";
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
	
	$mes = new MFormation();
	echo "\n";
	//var_dump($mes->SelectFomrationsALL());
	var_dump($mes->SelectFormation("js css json php java"));