<?php
	require_once("Model.php");
	class MComment extends Model
	{
		function SelectComment($idFormation)
		{
			$sql = "SELECT * FROM comment WHERE id_formation = %d";
			$sql1 = sprintf($sql, $idFormation);
			return $this->Select($sql1);
		}

		function InsertComment($idFormation, $idUser, $mark
								$description, $date_comment)
		{
			$this->Connect();
			$sql = "INSERT INTO expert ('id_formation', 'id_user', 'mark', 'description', 'date_comment') 
							VALUES (%d, %d ,%d, '%s' '%s');";
			$sql1 = sprintf($sql, $idFormation, $idUser, $mark, $description, $date_comment);
			//echo $sql1;
			if($this->Insert($sql1))
			{
				return true;
			}
			return false;
		}


		function DeleteComment($idComment)
		{
			$this->Connect();
			$sql = "DELETE FROM comment WHERE id_comment = %d ";
			$sql1 = sprintf($sql, $idComment);
			//echo $sql1;
			if($this->Delete($sql1))
			{
				return true;
			}
			return false;
		}

		function UpdateComment($mark, $description, $date_comment, $idComment)
		{
			$this->Connect();
			$sql = "UPDATE comment SET mark = %d, description = '%s', $date_comment = '%s'
						 WHERE id_comment = %d ";
			$sql1 = sprintf($sql, $mark, $description,$date_comment $idComment);
			//echo $sql1;
			if($this->Update($sql1))
			{
				return true;
			}
			return false;
		}

		


	}
	
	//$mes = new MExpert();
	//echo "\n";
	//var_dump($mes->SelectExpertsALL());