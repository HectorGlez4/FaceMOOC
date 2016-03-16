<?php
	require_once("Model.php");
	class MChapter extends Model
	{
		function SelectChapters($idFormation)
		{
			$sql = "Select * From chapter WHERE id_formation = %d";
			$sql1 = sprintf($sql, $idFormation);
			return $this->Select($sql1);
		}

		function InsertChapter($idFormation, $title, $description )
		{
			$this->Connect();
			$sql = "INSERT INTO chapter ('id_formation', 'title', 'description') VALUES ('%d', '%s', '%s');";
			$sql1 = sprintf($sql, $idFormation, $title, $description);
			//echo $sql1;
			if($this->Insert($sql1))
			{
				return true;
			}
			return false;
		}


		function DeleteChapter($idChapter)
		{
			$this->Connect();
			$sql = "DELETE FROM chapter WHERE id_chapter = %d ";
			$sql1 = sprintf($sql, $idChapter);
			//echo $sql1;
			if($this->Delete($sql1))
			{
				return true;
			}
			return false;
		}

		function UpdateChapter( $title, $description,$idChapter)
		{
			$this->Connect();
			$sql = "UPDATE chapter SET title = '%s' ,
			description = '%s'WHERE id_chapter = %d ";
			$sql1 = sprintf($sql,  $title, $description, $idChapter);
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
	//var_dump($mes->SelectFomrationsALL());
	//var_dump($mes->SelectFormation("js css json php java"));