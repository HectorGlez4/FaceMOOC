<?php
	require_once("Model.php");
	class MFormation extends Model
	{
		public $NbResults = 16;
		function SelectFormation($email)
		{
			$this->Connect();
			$sql = "SELECT * FROM formation f inner join expert e on f.id_expert=e.id_expert 
			inner join user u on u.id_user=e.id_user 
			WHERE u.email= :email";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			return ($this->Select($stmt));
		}

		function SelectFormationTitle($email, $title)
		{
			$this->Connect();
			$sql = "SELECT COUNT(title) FROM formation f inner join expert e on f.id_expert=e.id_expert 
			inner join user u on u.id_user=e.id_user 
			WHERE u.email= :email AND f.title= :title";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":title", $title, PDO::PARAM_STR);
			return ($this->Select($stmt));
		}

		function SelectFormationTitleExceptId($id, $title)
		{
			$this->Connect();
			$sql = "SELECT COUNT(title) FROM formation
			WHERE id_formation != :id AND title = :title";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->bindParam(":title", $title, PDO::PARAM_STR);
			return ($this->Select($stmt));
		}

		function SelectFormationIdByTitle($email, $title)
		{
			$this->Connect();
			$sql = "SELECT id_formation FROM formation f inner join expert e on f.id_expert=e.id_expert
			inner join user u on u.id_user=e.id_user
			WHERE u.email= :email AND f.title= :title";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":email", $email, PDO::PARAM_STR);
			$stmt->bindParam(":title", $title, PDO::PARAM_STR);
			return ($this->Select($stmt));
		}

		function SelectFormationsPage($Page)
		{
			$this->Connect();
			$offset = $this->NbResults * ($Page-1);
			$sql = "Select * From formation LIMIT :offset, :nbResults";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
			$stmt->bindParam(":nbResults", $this->NbResults, PDO::PARAM_INT);
			return ($this->Select($stmt));
		}

		function SelectFormationsAbonnementPage($idEmail, $Page)
		{
			$this->Connect();
			$offset = $this->NbResults * ($Page-1);
			$sql = "SELECT f.* FROM formation AS f JOIN inscription AS i ON f.id_formation = i.id_formation JOIN user AS u ON u.id_user = i.id_user WHERE u.email = :idEmail LIMIT :offset, :nbResults";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
			$stmt->bindParam(":nbResults", $this->NbResults, PDO::PARAM_INT);
			$stmt->bindParam(":idEmail", $idEmail, PDO::PARAM_STR);
			return ($this->Select($stmt));
		}

		function SelectFormationById($id)
		{
			$this->Connect();
			$sql = "Select * From formation WHERE id_formation = :id";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			return ($this->Select($stmt));
		}

		function CountFormations(){
			$sql = "Select count(*) From formation";
			return $this->SelectOne($sql);
		}

		function CountFormationsAbonnements($keywords, $idEmail){
			$this->Connect();
			$keyarray = explode(" ", $keywords);
			$sql = "SELECT count(f.id_formation) FROM formation AS f JOIN inscription AS i ON f.id_formation = i.id_formation JOIN user AS u ON u.id_user = i.id_user WHERE u.email = '" . $idEmail . "'"; //:idEmail";
			foreach ($keyarray as $key => $value) {
				$sql .= " OR keywords LIKE '%$value%'";
			}
			//$stmt = $this->PDO->prepare($sql);
			//$stmt->bindParam(":idEmail", $idEmail, PDO::PARAM_STR);
			//$stmt->execute();
			//return ($stmt->fetch());
			//return $sql;
			//return $this->($sql);
			return $this->SelectOne($sql);
		}
		
		function SelectFormationsByKeywords($keywords, $Page)
		{
			$this->Connect();
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
			$stmt = $this->PDO->prepare($sql);
			return ($this->Select($stmt));
		}


		function SelectIdFormationByClass($idClass)
		{
			$this->Connect();
			$sql = "SELECT c.id_formation FROM comment as c INNER JOIN formation as f
			on c.id_formation=f.id_formation INNER JOIN chapter as ch on 
			ch.id_formation=f.id_formation INNER JOIN class as cl 
			on ch.id_chapter=cl.id_chapter WHERE id_class =:idClass";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idClass", $idClass, PDO::PARAM_INT);
			return $this->Select($stmt);
		}

		function InsertFormation($idExpert, $title, $description, $image, $req_skill, $difficulty, $keywords)
		{
			$this->Connect();
			$sql = "INSERT INTO formation (id_expert, title, description, image, required_skill, difficulty, keywords)
											 VALUES (:idExpert, :title, :description ,:image ,:req_skill,:difficulty,:keywords);";
			$stmt = $this->PDO->prepare($sql);
			$title = htmlspecialchars($title);
			$description = htmlspecialchars($description);
			$req_skill = htmlspecialchars($req_skill);
			$difficulty = htmlspecialchars($difficulty);
			$keywords = htmlspecialchars($keywords);
			$stmt->bindParam(":idExpert", $idExpert, PDO::PARAM_INT);
			$stmt->bindParam(":title", $title, PDO::PARAM_STR);
			$stmt->bindParam(":description", $description, PDO::PARAM_STR);
			$stmt->bindParam(":image", $image, PDO::PARAM_STR);
			$stmt->bindParam(":req_skill", $req_skill, PDO::PARAM_STR);
			$stmt->bindParam(":difficulty", $difficulty, PDO::PARAM_STR);
			$stmt->bindParam(":keywords", $keywords, PDO::PARAM_STR);
			return $this->Insert($stmt);
		}


		function DeleteFormation($idFormation)
		{
			$this->Connect();
			$sql = "DELETE FROM formation WHERE id_formation = :idFormation ";
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idFormation", $idFormation, PDO::PARAM_INT);
			return $this->Delete($stmt);
		}

		function SelectInscriptionByKeywords($keywords, $Page, $idUser)
		{
			$this->Connect();
			$offset = $this->NbResults * ($Page-1);
			$keyarray = explode(" ", $keywords);
			$Data = null;
			$sql = "SELECT f.* FROM formation AS f JOIN inscription AS i ON f.id_formation = i.id_formation JOIN user AS u ON u.id_user = i.id_user WHERE u.email = :idUser";
			foreach ($keyarray as $key => $value) {
				$sql .= " OR keywords LIKE '%$value%'";
			}
			$sql .= " LIMIT " . $offset .", " . $this->NbResults;
			$stmt = $this->PDO->prepare($sql);
			$stmt->bindParam(":idUser", $idUser, PDO::PARAM_STR);
			//return $stmt->debugDumpParams();
			return ($this->Select($stmt));
		}

		function UpdateFormation($idExpert, $title, $description, $image
								, $req_skill, $difficulty, $keywords, $idFormation)
		{
			$this->Connect();
			$sql = "UPDATE formation SET id_expert = :idExpert, title = :title ,
			description = :description, image = :image, required_skill = :req_skill,
			difficulty = :difficulty, keywords = :keywords WHERE id_formation = :idFormation";
			$stmt = $this->PDO->prepare($sql);
			$title = htmlspecialchars($title);
			$description = htmlspecialchars($description);
			$req_skill = htmlspecialchars($req_skill);
			$difficulty = htmlspecialchars($difficulty);
			$keywords = htmlspecialchars($keywords);
			$stmt->bindParam(":idExpert", $idExpert, PDO::PARAM_INT);
			$stmt->bindParam(":title", $title, PDO::PARAM_STR);
			$stmt->bindParam(":description", $description, PDO::PARAM_STR);
			$stmt->bindParam(":difficulty", $difficulty, PDO::PARAM_STR);
			$stmt->bindParam(":image", $image, PDO::PARAM_STR);
			$stmt->bindParam(":req_skill", $req_skill, PDO::PARAM_STR);
			$stmt->bindParam(":keywords", $keywords, PDO::PARAM_STR);
			$stmt->bindParam(":idFormation", $idFormation, PDO::PARAM_INT);
			return $this->Update($stmt);
		}
	}

	//$mes = new MFormation();
	//echo "\n";
	//var_dump($mes->SelectFormations("test", 1));
