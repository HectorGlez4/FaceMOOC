<?php
	include_once("Connection.php");

	class Model
	{
		private $PDO;

		public function Connect()
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

		public  function Close_Connection()
		{
			$this->PDO=NULL;
		}
	}