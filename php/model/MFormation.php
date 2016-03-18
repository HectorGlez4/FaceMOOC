<?php
	require_once("Model.php");
	class MFormation extends Model
	{
		public $NbResults = 16;

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

		
		function SelectFormations($keywords)
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
