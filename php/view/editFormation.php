<?php
include("head.php");
include("header.php");
global $content;
$skill = $content['editFormation'][0]['difficulty'];
if ($skill == 'Easy') { $selected1 = 'selected'; } else { $selected1 = '';}
if ($skill == 'Normal') { $selected2 = 'selected'; } else { $selected2 = '';}
if ($skill == 'Intermediate') { $selected3 = 'selected'; } else { $selected3 = '';}
if ($skill == 'Advanced') { $selected4 = 'selected'; } else { $selected4 = '';}
?>

<script type="text/javascript" language="javascript" src="<?php echo WEBROOT?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo WEBROOT?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo WEBROOT?>js/tableformations.js"></script>

<body>


<div class="container">
    <div class="jumbotron">
        <h1>Formation Manager</h1>
    </div>
    <div class="row">


        <form  action="../updateFormation/<?php echo $content['editFormation'][0]['id_formation']?>" method="POST"  enctype="multipart/form-data">
            <h3>Modifiez cette formation</h3>

            <div class="cont">
                <div class="form-group">
                    <label for="titlef">Title :</label>
                    <input type="text" class="form-control" name="titlef" value="<?php echo $content['editFormation'][0]['title'] ?>" >
                </div>

                <div class="form-group">
                    <label for="diff">Difficulty :</label><br>
                    <select name="diff">
                        <option value="Easy" <?php echo $selected1 ?>>Easy</option>
                        <option value="Normal" <?php echo $selected2 ?>>Normal</option>
                        <option value="Intermediate" <?php echo $selected3 ?>>Intermediate</option>
                        <option value="Advanced" <?php echo $selected4 ?>>Advanced</option>
                    </select>

                </div>

                <label for="imageFormation">
                    <img id="imageFormation" class="responsive"  src="<?php echo WEBROOT.$content['editFormation'][0]['image'] ?>" alt="Image de formation" />
                </label>
                <div class="form-group">
                    <div class="input-group">
                        <input class="btn btn-md btn-primary btn-block" type="file" name="imag"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="requireskill">Required skills :</label>
                            <textarea rows="4" cols="50" class="form-control" name="requireskill" ><?php echo $content['editFormation'][0]['required_skill'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="desc">Description :</label><textarea rows="4" cols="50" class="form-control" name="description" ><?php echo $content['editFormation'][0]['description'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="keywords">Keywords :</label>
                    <input type="text" class="form-control" name="keywords" value="<?php echo $content['editFormation'][0]['keywords'] ?>">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-md btn-primary btn-block" type="submit">Save Formation</button>
                    </div>
                    <div class="col-md-6">
                        <a class='btn btn-md btn-primary btn-block' href='<?php WEBROOT ?>../../GestionFormation'>Cancel</a>

                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

</div>
</div>


</body>





<!--<script type="text/javascript" src="<?php /*echo WEBROOT*/?>ckeditor/ckeditor.js"></script>
</head><body>
<div id="alerts">
    <noscript>
        <p>
            <strong>CKEditor requires JavaScript to run</strong>. In a browser with no JavaScript support, like yours, you should still see the contents (HTML data) and you should be able to edit it normally, without a rich editor interface.
        </p>
    </noscript>
</div>
<form method="POST" action="">
    <div class="form-group">
        <label for="Titre">Titre :</label>
        <input type="text" class="form-control" name="Titre">
    </div>
    <div class="form-group">
        <label for="keywords">Keywords :</label>
        <input type="text" class="form-control" name="keywords">
    </div>
    <textarea cols="80" class="ckeditor" id="editeur" name="editeur" rows="10"></textarea>
    <input type="submit" value="envoyer" />
</form>-->