<?php
include("head.php");
include("header.php");
global $content;
?>
<div class='container'>
    <div class="jumbotron">
        <h1><?php echo $content['FormationInfo'][0]['title']; ?></h1>
    </div>



        <div class='row'>
            <div class='col-md-3'>
                <div class="ChapterClassMenu">
                </div>


                <td><a href="" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-folder-open"
                                                                                aria-hidden="true"></span> Chapitre </a>
                </td>
                <td><a href="" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-file"
                                                                                 aria-hidden="true"></span> Cours </a>
                </td>
            </div>
            <div class='col-md-9'>
                <form id="editFormationContent" action="<?php echo WEBROOT ?>GestionFormation/updateClass" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="iclID" id="iclID">
                    <div class="form-group">
                        <label for="title">Titre :</label>
                        <input id="iclTitle" type="text" class="form-control" name="title"/>
                    </div>
                    <div class="form-group">
                        <label for="desc">Description :</label>
                        <textarea id="iclDescription" rows="4" cols="50" class="form-control"
                                  name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="video">Vidéo :</label>
                        <input id="iclVideo" type="url" class="form-control" name="video" placeholder="http://"/>
                        <p id="infovideo">Le lien de la vidéo à copier se situe sous la vidéo "Partager"->"Intégrer" entre les apostrophes après "src", sous la forme "https://www.youtube.com/embed/oavMtUWDBTM"</p>
                    </div>
                    <div class="form-group">
                        <label for="video">Ajoutez votre cours (pdf) :</label>
                        <div class="input-group">
                            <input class="btn btn-md btn-primary btn-block" type="file" name="cours"/>
                        </div>
                    </div>
                    <button class="btn btn-md btn-primary btn-block" type="submit">Modifier ce cours</button>
            </div>
</div>
</form>
</div>


<?php include('footer.php') ?>
<script>
    $("#btnc").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/FaceMOOC/php/controller/Comments.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#chatbox").append(data + "<br/>");//instead this line here you can call some function to read database values and display
            },
        });
    });



</script>



<?php $idForm = $content['FormationInfo'][0]['id_formation']; ?>


<?php include("modals.php"); ?>




<?php  echo "<script> var idFormation = " . $content['FormationInfo'][0]['id_formation'] . "</script>" ?>
<script src="<?php echo WEBROOT?>js/formationcontent.js"></script>
<script>loadChapterMenu(idFormation)</script>

