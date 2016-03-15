<?php
	require("Model.php");
	class MUser extends Model
	{
		function SelectUsersALL()
		{
			return $this->Select("Select * From user");
		}

		function SelectUser($email, $password)
		{
			try
			{
				$Data = null;
				$this->Connect();
				$sql = "SELECT * FROM user WHERE email = :email AND password = :password";
				$stmt = $this->PDO->prepare($sql);
				$stmt->bindParam(":email", $email, PDO::PARAM_STR);
				$stmt->bindParam(":password", $password, PDO::PARAM_STR);
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

		function InsertUser($email, $password, $firstname, $lastname)
		{
			$this->Connect();
			$sql = "INSERT INTO user (`email`, `password`, `firstname`, `lastname`) VALUES ('%s', '%s', '%s', '%s');";
			$sql1 = sprintf($sql, $email, $password, $firstname, $lastname);
			echo $sql1;
			if($this->Insert($sql1))
			{
				return true;
			}
			return false;
		}


		function DeleteUser($idUser)
		{
			$this->Connect();
			$sql = "DELETE FROM user WHERE id_user = %d ";
			$sql1 = sprintf($sql, $idUser);
			echo $sql1;
			if($this->Insert($sql1))
			{
				return true;
			}
			return false;
		}

		function connection($login, $password){
			$this->Connect();
			$sql = "SELECT FROM user WHERE id_user = %d ";
			$sql1 = sprintf($sql, $idUser);
			if ($res){
				$_SESSION['name'] = $res['User'];
				return true;
			}else{
				return false;
			}
		}

	}
	
	//$mus = new MUser();
	//echo "\n";
	//echo $mus->DeleteUser(3);

?>