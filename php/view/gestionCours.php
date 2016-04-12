<?php
include("head.php");
include("header.php");
?>

<script type="text/javascript" language="javascript" src="<?php echo WEBROOT ?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo WEBROOT ?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo WEBROOT ?>js/tableformations.js"></script>

<body>


<div class="container">
    <div class="jumbotron">
        <h1>Gestion de formation</h1>
    </div>


    <form id="form" action="<?php ROOT ?>GestionFormation/gestionfor" method="POST" enctype="multipart/form-data">
        <h3>Ajouter une nouvelle formation</h3>

        <div class="cont">
            <div class="form-group">
                <label for="titlef">Titre :</label>
                <input type="text" class="form-control" name="titlef">
            </div>

            <div class="form-group">
                <label for="diff">Difficulté :</label><br>
                <select name="diff">
                    <option value="">Choisissez une option</option>
                    <option value="Easy">Facile</option>
                    <option value="Normal">Normal</option>
                    <option value="Intermediate">Intermédiaire</option>
                    <option value="Advanced">Avancé</option>
                </select>

            </div>
            <div class="form-group">
                <label for="im">Image :</label>
                <input type="file" name="imag"/>

            </div>

            <div class="form-group">
                <label for="requireskill">Compétences requises :</label>

                <textarea rows="4" cols="50" class="form-control" name="requireskill"></textarea>
            </div>

            <div class="form-group">
                <label for="desc">Description :</label>

                <textarea rows="4" cols="50" class="form-control" name="description"></textarea>

            </div>

            <div class="form-group">
                <label for="keywords">Mots clés :</label>
                <input type="text" class="form-control" name="keywords">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-md btn-primary btn-block" type="submit">Ajouter cette formation</button>
                </div>
                <div class="col-md-6">
                    <a class='btn btn-md btn-primary btn-block' href='<?php WEBROOT ?>Home'>Retour</a>

                </div>
            </div>
        </div>
    </form>
</body>
<?php include("cours.php") ?>
