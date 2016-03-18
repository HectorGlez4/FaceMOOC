<?php
	include_once("Connection.php");

	class Model
	{
		public $PDO;

		public function Connect()
		{
			if($this->PDO == null)
			{
				try
				{
					$StringConnection=new Connection();
					$this->PDO=new PDO("mysql:host=".$StringConnection->Server.";dbname=".$StringConnection->BD.";charset=utf8", $StringConnection->User, $StringConnection->Password);
				}
				catch(PDOException $e)
				{
					echo $e->getMessage();
				}
			}
		}

		public  function Close_Connection()
		{
			$this->PDO=NULL;
		}

		function Select($SQL)
		{
			try
			{
				$this->Connect();
				$resultSet = $this->PDO->query($SQL);
				while($Row =$resultSet->fetch(PDO::FETCH_ASSOC)) 
				{
           			$Data[]=$Row;
				}
				return $Data;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			{
				$this->Close_Connection();
			}
		}

		function SelectOne($SQL)
		{
			try
			{
				$this->Connect();
				$resultSet = $this->PDO->query($SQL);
				$Data = $resultSet->fetch();
				return $Data;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			{
				$this->Close_Connection();
			}
		}

		public function Insert($SQL)
		{
			try
			{
				$success = $this->PDO->exec($SQL);
				return $success;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}

		public function Delete($SQL)
		{
			try
			{
				$success = $this->PDO->exec($SQL);
				return $success;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}

		public function Update($SQL)
		{
			try
			{
				$success = $this->PDO->exec($SQL);
				return $success;
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
		}			
	}
?>