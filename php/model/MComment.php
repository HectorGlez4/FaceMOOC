<?php
	require_once("Model.php");
	class MComment extends Model
	{
		function SelectComment($idFormation)
		{
			$sql = "SELECT * FROM comment WHERE id_formation = :idFormation";
			$stmt = $this->PDO->prepare($sql);
			return $this->Select($stmt);
		}

		function InsertComment($idFormation, $idUser, $mark,$description, $date_comment)
		{
			$this->Connect();
			$sql = "INSERT INTO expert (id_formation, id_user, mark, description, date_comment)
							VALUES (:idFormation, :idUser ,:mark, :description , :date_comment);";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idFormation", $idFormation, PDO::PARAM_INT);
			$stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
			$stmt->bindParam(":mark", $mark, PDO::PARAM_STR);
			$stmt->bindParam(":description", $description, PDO::PARAM_INT);
			$stmt->bindParam(":date_comment", $date_comment, PDO::PARAM_STR);
			return $this->Insert($stmt);
		}


		function DeleteComment($idComment)
		{
			$this->Connect();
			$sql = "DELETE FROM comment WHERE id_comment = :idComment ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idComment", $idComment, PDO::PARAM_INT);
			return $this->Delete($stmt);
		}

		function UpdateComment($mark, $description, $date_comment, $idComment)
		{
			$this->Connect();
			$sql = "UPDATE comment SET mark = :mark, description = :description, $date_comment = :date_comment
						 WHERE id_comment = idComment ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idComment", $idComment, PDO::PARAM_INT);
			$stmt->bindParam(":mark", $mark, PDO::PARAM_STR);
			$stmt->bindParam(":description", $description, PDO::PARAM_STR);
			$stmt->bindParam(":date_comment", $date_comment, PDO::PARAM_STR);
			return$this->Update($stmt);
		}

		


	}
	
	//$mes = new MExpert();
	//echo "\n";
	//var_dump($mes->SelectExpertsALL());