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

	}


?>