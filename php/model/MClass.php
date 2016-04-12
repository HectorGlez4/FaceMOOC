<?php

require_once("Model.php");

class MClass extends Model {

    function SelectClass($idClass) {
        $this->Connect();
        $sql = "Select * From class WHERE id_class = :idClass";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":idClass", $idClass, PDO::PARAM_INT);
        return $this->Select($stmt);
    }

    function SelectClassByChapterId($idChapter) {
        $this->Connect();
        $sql = "Select * From class WHERE id_chapter = :idChapter";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":idChapter", $idChapter, PDO::PARAM_INT);
        return $this->Select($stmt);
    }

    function SelectComment1($idFormation) {
        $this->Connect();
        $sql = "SELECT * FROM comment inner join user on user.id_user=comment.id_user"
                . "     WHERE id_formation = :idFormation ORDER BY date_comment desc" ;
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":idFormation", $idFormation, PDO::PARAM_INT);

        return $this->Select($stmt);
    }

    function SelectInfoByJoin($info, $idClass) {
        $this->Connect();
        $sql = "SELECT %s FROM formation AS f, chapter AS ch, class AS cl
             WHERE cl.id_chapter = ch.id_chapter AND ch.id_formation = f.id_formation AND cl.id_class = :idClass ";
        $sql1 = sprintf($sql, $info, $idClass);
        $stmt = $this->PDO->prepare($sql1);
        $stmt->bindParam(":idClass", $idClass, PDO::PARAM_INT);
        return $this->Select($stmt);
    }

    function InsertClass($idChapter, $title, $description, $video, $docs) {
        $this->Connect();
        $sql = "INSERT INTO class (id_chapter, title, description, video, docs)
             VALUES (:idChapter, :title, :description, :video, :docs);";
        $stmt = $this->PDO->prepare($sql);
        $title = htmlspecialchars($title);
        $description = htmlspecialchars($description);
        $video = htmlspecialchars($video);
        $stmt->bindParam(":idChapter", $idChapter, PDO::PARAM_INT);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":description", $description, PDO::PARAM_STR);
        $stmt->bindParam(":video", $video, PDO::PARAM_STR);
        $stmt->bindParam(":docs", $docs, PDO::PARAM_STR);
        return $this->Insert($stmt);
    }

    function DeleteClass($idClass) {
        $this->Connect();
        $sql = "DELETE FROM class WHERE id_class = :idClass ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":idClass", $idClass, PDO::PARAM_INT);
        return $this->Delete($stmt);
    }

    function UpdateClass($title, $description, $video, $docs, $idClass) {
        $this->Connect();
        $sql = "UPDATE class SET title = :title ,
            description = :description , video = :video, docs = :docs WHERE id_class = :idClass";
        $stmt = $this->PDO->prepare($sql);
        $title = htmlspecialchars($title);
        $description = htmlspecialchars($description);
        $video = htmlspecialchars($video);
        $stmt->bindParam(":idClass", $idClass, PDO::PARAM_INT);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":description", $description, PDO::PARAM_STR);
        $stmt->bindParam(":video", $video, PDO::PARAM_STR);
        $stmt->bindParam(":docs", $docs, PDO::PARAM_STR);
        return $this->Update($stmt);
    }

    function addDoc($fichier, $idClass)
    {
        $this->Connect();
        $sql = "UPDATE class SET docs = :fichier WHERE id_class = :idClass";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":idClass", $idClass, PDO::PARAM_STR);
        $stmt->bindParam(":fichier", $fichier, PDO::PARAM_STR);
        if($this->Update($stmt))
        {
            return true;
        }
        return false;
    }

    function addVideo($link, $idClass)
    {
        $this->Connect();
        $sql = "UPDATE class SET video = :link WHERE id_class = :idClass";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":idClass", $idClass, PDO::PARAM_STR);
        $stmt->bindParam(":link", $link, PDO::PARAM_STR);
        if($this->Update($stmt))
        {
            return true;
        }
        return false;
    }

    function addDescription($desc, $idClass)
    {
        $this->Connect();
        $sql = "UPDATE class SET description = :desc WHERE id_class = :idClass";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":idClass", $idClass, PDO::PARAM_STR);
        $stmt->bindParam(":desc", $desc, PDO::PARAM_STR);
        if($this->Update($stmt))
        {
            return true;
        }
        return false;
    }

    function addTitle($title, $idClass)
    {
        $this->Connect();
        $sql = "UPDATE class SET title = :title WHERE id_class = :idClass";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(":idClass", $idClass, PDO::PARAM_STR);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        if($this->Update($stmt))
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