<?php
	require("Model.php");
	class MFormation extends Model
	{
		private $NbResults = 16;

		function SelectFormations($Page)
		{
			$offset = $NbResults * ($Page-1);
			$sql = "Select * From formation LIMIT %d, %d";
			$sql1 = sprintf($sql, $offset, $NbResults);
			return $this->Select($sql1);
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
			$sql = "INSERT INTO formation ('id_expert', 'title', 'description','image', 'required_skill', 'difficulty', 'keywords') VALUES ('%d', '%s', '%s' ,'%s' ,'%s','%s','%s');";
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
			$sql = "UPDATE expert SET id_expert = '%d', title = '%s' ,
			description = '%s', image = '%s', required_skill = '%s',
			difficulty = '%s', keywords = '%s' WHERE id_expert = %d ";
			$sql1 = sprintf($sql, $idExpert, $title, $description, $image, $req_skill, $difficulty, $keywords, $idFormation);
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