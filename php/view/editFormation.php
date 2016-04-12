<?php
include("head.php");
include("header.php");
global $content;
$skill = $content['editFormation'][0]['difficulty'];
if ($skill == 'Easy') {
    $selected1 = 'selected';
} else {
    $selected1 = '';
}
if ($skill == 'Normal') {
    $selected2 = 'selected';
} else {
    $selected2 = '';
}
if ($skill == 'Intermediate') {
    $selected3 = 'selected';
} else {
    $selected3 = '';
}
if ($skill == 'Advanced') {
    $selected4 = 'selected';
} else {
    $selected4 = '';
}
?>


<body>


<div class="container">
    <div class="jumbotron">
        <h1>Gestion de formation</h1>
    </div>
    <div class="row">


        <form action="../modifyFormations/<?php echo $content['editFormation'][0]['id_formation'] ?>" method="POST"
              enctype="multipart/form-data">
            <h3>Modifiez cette formation</h3>

            <div class="cont">
                <div class="form-group">
                    <label for="titlef">Titre :</label>
                    <input type="text" class="form-control" name="titlef"
                           value="<?php echo $content['editFormation'][0]['title'] ?>">
                </div>

                <div class="form-group">
                    <label for="diff">Difficulté :</label><br>
                    <select name="diff">
                        <option value="Easy" <?php echo $selected1 ?>>Easy</option>
                        <option value="Normal" <?php echo $selected2 ?>>Normal</option>
                        <option value="Intermediate" <?php echo $selected3 ?>>Intermediate</option>
                        <option value="Advanced" <?php echo $selected4 ?>>Advanced</option>
                    </select>

                </div>

                <label for="imageFormation">
                    <img id="imageFormation" class="responsive"
                         src="<?php echo WEBROOT . $content['editFormation'][0]['image'] ?>" alt="Image de formation"/>
                </label>
                <div class="form-group">
                    <div class="input-group">
                        <input class="btn btn-md btn-primary btn-block" type="file" name="imag"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="requireskill">Compétences requises :</label>
                    <textarea rows="4" cols="50" class="form-control"
                              name="requireskill"><?php echo $content['editFormation'][0]['required_skill'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="desc">Description :</label><textarea rows="4" cols="50" class="form-control"
                                                                     name="description"><?php echo $content['editFormation'][0]['description'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="keywords">Mots clés :</label>
                    <input type="text" class="form-control" name="keywords"
                           value="<?php echo $content['editFormation'][0]['keywords'] ?>">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-md btn-primary btn-block" type="submit">Modifier cette formation</button>
                    </div>
                    <div class="col-md-6">
                        <a class='btn btn-md btn-primary btn-block'
                           href='<?php WEBROOT ?>../../GestionFormation'>Retour</a>

                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
</body>
<?php include('footer.php') ?>