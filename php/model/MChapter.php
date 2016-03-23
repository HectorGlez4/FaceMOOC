<?php
	require_once("Model.php");
	class MChapter extends Model
	{
		function SelectChapters($idFormation)
		{
			$this->Connect();
			$sql = "Select * From chapter WHERE id_formation = :idFormation";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idFormation", $idFormation, PDO::PARAM_INT);
			return $this->Select($stmt);
		}

		function InsertChapter($idFormation, $title, $description )
		{
			$this->Connect();
			$sql = "INSERT INTO chapter (id_formation, title, description) 
			VALUES (:idFormation, :title, :description);";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idFormation", $idFormation, PDO::PARAM_INT);
			$stmt->bindParam(":title", $title, PDO::PARAM_STR);
			$stmt->bindParam(":description", $description, PDO::PARAM_STR);
			return $this->Insert($sql1);
		}


		function DeleteChapter($idChapter)
		{
			$this->Connect();
			$sql = "DELETE FROM chapter WHERE id_chapter = :idChapter ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idChapter", $idChapter, PDO::PARAM_INT);
			return $this->Delete($sql1);
		}

		function UpdateChapter( $title, $description,$idChapter)
		{
			$this->Connect();
			$sql = "UPDATE chapter SET title = :title ,
			description = :description WHERE id_chapter = :idChapter ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idChapter", $idChapter, PDO::PARAM_INT);
			$stmt->bindParam(":title", $title, PDO::PARAM_STR);
			$stmt->bindParam(":description", $description, PDO::PARAM_STR);
			return $this->Update($sql1);
		}
	}
	
	//$mes = new MFormation();
	//echo "\n";
	//var_dump($mes->SelectFomrationsALL());
	//var_dump($mes->SelectFormation("js css json php java"));