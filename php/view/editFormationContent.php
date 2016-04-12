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
                <div class="ChapterClassMenu">
                </div>


                <td><a href="" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-folder-open"
                                                                                aria-hidden="true"></span> Chapter </a>
                </td>
                <td><a href="" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-file"
                                                                                 aria-hidden="true"></span> Class </a>
                </td>

            </div>
            <div class='col-md-9'>
                <form action="../updateClass" method="POST" enctype="multipart/form-data">
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
                        VIDEO
                        <input id="iclVideo" type="url" class="form-control" name="video" placeholder="http://"/>
                    </div>
            </div>
    </form>
</div>
<!--  <button type="button" class="btn btn-md btn-primary btn-block" data-toggle="modal"
                data-target="#myModal">Modifier mot de passe
        </button> -->
</form>

</div>


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

    <?php include('footer.php') ?>

</script>
<?php $idForm = $content['FormationInfo'][0]['id_formation']; ?>
<?php echo $idForm;  ?>
<?php include("addClassModal.php"); ?>   
<?php include("addChapterModal.php"); ?> 
<?php  echo "<script> var idFormation = " . $content['FormationInfo'][0]['id_formation'] . "</script>" ?>

<script>loadChapterMenu(idFormation)</script>

