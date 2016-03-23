<?php
include("head.php");
include("header.php");
global $content;
?>
<div class='container'>
    <div class="jumbotron">
        <h1><?php echo $content['FormationInfo'][0]['title']; ?></h1>
    </div>

   
    <form action="<?php ROOT ?>Gestion/" method="POST" enctype="multipart/form-data">
 <div class='row'>
        <div class='col-md-3'>


<!--            <td>
                <a href=" <?php /*WEBROOT . 'GestionFormation/editFormationsChapter/' . $content["FormationInfo"][0]['id_formation'] */?> "><span
                        class="glyphicon glyphicon-plus" aria-hidden="true"></span>Chapter </a></td>
            <td>
                <a href=" <?php /*WEBROOT . 'GestionFormation/editFormations/' . $content["FormationInfo"][0]['id_formation'] */?> "><span
                        class="glyphicon glyphicon-plus" aria-hidden="true"></span> Class</a></td>-->
            <?php //var_dump($content['ChapterInfo']);
            foreach ($content['ChapterInfo'] as $chapter) {
                echo "<h3>".$chapter['title']."</h3>";
            }
            ?>

            <td><a href="" data-toggle="modal"data-target="#myModal"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> Chapter </a></td>
            <td><a href="" data-toggle="modal"data-target="#myModal2"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Class </a></td>

        </div>
        <div class='col-md-9'>
            <form action="../updateClass" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title :</label>
                    <input type="text" class="form-control" name="title"/>
                </div>
                <div class="form-group">
                    <label for="desc">Description :</label><textarea rows="4" cols="50" class="form-control" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="video">Video :</label>
                    VIDEO
                    <input type="url" class="form-control" name="video" placeholder="http://"/>
                </div>
                <label for="videoClass">
                    Cours :
                </label>
                COURS
                <div class="form-group">
                    <div class="input-group">
                        <input type="file" name="cours"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-md btn-primary btn-block" type="submit">Save Class</button>
                    </div>
                    <div class="col-md-6">
                        <a class='btn btn-md btn-primary btn-block' href='<?php WEBROOT ?>../../GestionFormation'>Cancel</a>
                    </div>
                </div>
            </form>
        </div>
        <!--  <button type="button" class="btn btn-md btn-primary btn-block" data-toggle="modal"
                        data-target="#myModal">Modifier mot de passe
                </button> -->
       </form>
    </div>
<?php include("addChapter.php") ?> 
<?php include("addClass.php") ?> 
</div>