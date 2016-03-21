<?php
	require_once("Model.php");
	class MFormation extends Model
	{
		public $NbResults = 16;


		function SelectFormation($email)
		{
			
			$sql = "SELECT * FROM formation f inner join expert e on f.id_expert=e.id_expert 
			inner join user u on u.id_user=e.id_user 
			WHERE u.email= '%s'";
			$sql1 = sprintf($sql, $email);
			return ($this->Select($sql1));
		}
		function SelectFormationId($email)
		{
			try
			{
				$Data = null;
				$this->Connect();
				$sql = "SELECT id_formation FROM formation f inner join expert e on f.id_expert=e.id_expert 
				inner join user u on u.id_user=e.id_user 
				WHERE u.email= '%s' and f.title= '%s'";
				$stmt = $this->PDO->prepare($sql);
				$stmt->bindParam(":email", $email, PDO::PARAM_STR);
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
		function SelectFormationTitle($email, $title)
		{
			$sql = "SELECT COUNT(title) FROM formation f inner join expert e on f.id_expert=e.id_expert 
			inner join user u on u.id_user=e.id_user 
			WHERE u.email= '%s' AND f.title= '%s'";
			$sql1 = sprintf($sql, $email, $title);
			return ($this->Select($sql1));
		}

		function SelectFormationsPage($Page)
		{
			$offset = $this->NbResults * ($Page-1);
			$sql = "Select * From formation LIMIT %d, %d";
			$sql1 = sprintf($sql, $offset, $this->NbResults);
			return $this->Select($sql1);
		}

		function SelectFormationById($id)
		{
			$sql = "Select * From formation WHERE id_formation = %d";
			$sql1 = sprintf($sql, $id);
			return $this->Select($sql1);
		}

		function CountFormations(){
			$sql = "Select count(*) From formation";
			return $this->SelectOne($sql);
		}


		
		function SelectFormations($keywords, $Page)
		{
			$offset = $this->NbResults * ($Page-1);	
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
			$sql .= " LIMIT " . $offset .", " . $this->NbResults;
			//echo $sql;
			return ($this->Select($sql));
		}

		function InsertFormation($idExpert, $title, $description, $image, $req_skill, $difficulty, $keywords )
		{
			$this->Connect();
			$sql = "INSERT INTO formation ('id_expert', 'title', 'description','image', 'required_skill', 'difficulty', 'keywords') VALUES (%d, '%s', '%s' ,'%s' ,'%s','%s','%s');";
			$sql1 = sprintf($sql, $idExpert, $title, $description, $image,$req_skill, $difficulty, $keywords);
			//echo $sql1;
			if($this->Insert($sql1))
			{
				return true;
			}
			return false;
		}


		function DeleteFormation($idFormation)
		{
			$this->Connect();
			$sql = "DELETE FROM formation WHERE id_formation = %d ";
			$sql1 = sprintf($sql, $idFormation);
			//echo $sql1;
			if($this->Delete($sql1))
			{
				return true;
			}
			return false;
		}

		function UpdateFormation($idExpert, $title, $description, $image
								, $req_skill, $difficulty, $keywords, $idFormation)
		{
			$this->Connect();
			$sql = "UPDATE formation SET id_expert = '%d', title = '%s' ,
			description = '%s', image = '%s', required_skill = '%s',
			difficulty = '%s', keywords = '%s' WHERE id_formation = %d ";
			$sql1 = sprintf($sql, $idExpert, $title, $description, $image, $req_skill, $difficulty, $keywords, $idFormation);
			//echo $sql1;
			if($this->Update($sql1))
			{
				return true;
			}
			return false;
		}
	}
	//$mes = new MFormation();
	//echo "\n";
	//var_dump($mes->SelectFormations("test", 1));
