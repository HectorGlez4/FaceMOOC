<?php
	require_once("Model.php");
	class MClass extends Model
	{
		function SelectClass($idClass)
		{
			$sql = "Select * From class WHERE id_class = %d";
			$sql1 = sprintf($sql, $idClass);
			return $this->Select($sql1);
		}

		function SelectClassByChapterId($idChapter)
		{
			$sql = "Select * From class WHERE id_chapter = %d";
			$sql1 = sprintf($sql, $idChapter);
			return $this->Select($sql1);
		}

		function SelectInfoByJoin($info, $idClass)
		{
			$sql = "SELECT %s FROM formation AS f, chapter AS ch, class AS cl WHERE cl.id_chapter = ch.id_chapter AND ch.id_formation = f.id_formation AND cl.id_class = %d ";
			$sql1 = sprintf($sql, $info, $idClass);
			return $this->Select($sql1);
		}

		function InsertClass($idChapter, $title, $description, $video, $docs )
		{
			$this->Connect();
			$sql = "INSERT INTO class ('id_chapter', 'title', 'description', 'video', 'docs')
			 VALUES ('%d', '%s', '%s', '%s', '%s');";
			$sql1 = sprintf($sql, $idChapter, $title, $description, $video, $docs);
			//echo $sql1;
			if($this->Insert($sql1))
			{
				return true;
			}
			return false;
		}


		function DeleteClass($idClass)
		{
			$this->Connect();
			$sql = "DELETE FROM class WHERE id_class = %d ";
			$sql1 = sprintf($sql, $idChapter);
			//echo $sql1;
			if($this->Delete($sql1))
			{
				return true;
			}
			return false;
		}

		function UpdateClass( $title, $description, $video, $docs, $idClass)
		{
			$this->Connect();
			$sql = "UPDATE chapter SET title = '%s' , 
			description = '%s' , video = '%s', docs = '%s' WHERE id_class = %d ";
			$sql1 = sprintf($sql,  $title, $description, $video, $docs,  $idClass);
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