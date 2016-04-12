<?php
include("head.php");
include("header.php");
global $content;
$formationInfo = $content['formation'][0];
$chapterInfo = $content['chapter'];
$classInfo = $content['class'];
$classesInfo = $content['currentclass'][0];
$formation = $content['formation'][0]['id_formation'];
$idForm = $content['formation'][0]['id_formation'];
$idUser = $content['userInfo'][0]['id_user'];
$Comments = $content['commentInfo'];

date_default_timezone_set('Europe/Paris');
$date = date("Y-m-d H:i:s");
//var_dump($Comments);
?>
<div class='container'>
    <div class="jumbotron">
        <h1 class="text-center"><?php echo $formationInfo['title']; ?></h1>
    </div>
    <a class="btn btn-primary" href="<?php echo WEBROOT . 'Formation/view/' . $content['formation'][0]['id_formation'] ?>"><span class="glyphicon glyphicon-chevron-left"></span> Formation </a>
    <br>
    <div class='row info-panel'>
        <div class='col-md-3 server-action-menu'>
            <?php
            foreach ($chapterInfo as $chapter) {
                ?>
                <h1><?= $chapter['title'] ?></h1>
                <?php
                if ($classInfo[$chapter['id_chapter']] != null) {
                    foreach ($classInfo[$chapter['id_chapter']] as $class) {
                        echo "<a href='" . WEBROOT . "Classes/index/" . $class['id_class'] . "'><h3>" . $class['title'] . "</h3></a>";
                    }
                } else {
                    echo "";
                }
            }
            ?>
        </div>
        <div class='col-md-9'>
            <h2><?= $classesInfo['title'] ?></h2>
            <iframe width='100%' height='415' src='<?= $classesInfo['video'] ?>' frameborder='0' allowfullscreen></iframe>
            <p><?= $classesInfo['description'] ?></p>
            <?php
            if ($classesInfo['docs'] != null) {
                ?>
                <a class='btn btn-primary' href='<?= WEBROOT . "docs/" . $classesInfo['docs'] ?>' onclick='window.open(this.href); return false;'><span class='glyphicon glyphicon-download'></span> Download teacher's note </a>
                <?php
            }
            ?>
        </div>
    </div>

    <div class='row info-panel'>
        <div class='col-md-3'>
        </div>
        <div class='col-md-9'>
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <h3 class="text-center ">Commentaires</h3>
                </div>
                <form id="frmaddComment">
                    <input type="hidden" name="idFormation" value="<?= $idForm ?>">
                    <input type="hidden" name="idUser" value="<?= $idUser ?>">
                    <input type="hidden" name="date" value="<?= $date ?>">

                    <!-- <div class="modal-body">
<div class="form-group">
<label for="name" class="control-label">Nom :</label>
<input type="text" id="nam" class="form-control" name="comm" value="<?php echo $content['userInfo'][0]['firstname'] ?>">
</div> -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="mark" class="control-label">Notez le class :</label>
                            <input type="radio" name="mark" value="10" required> 10
                            <input type="radio" name="mark" value="20"> 20
                            <input type="radio" name="mark" value="30"> 30
                            <input type="radio" name="mark" value="40"> 40
                            <input type="radio" name="mark" value="50"> 50
                            <input type="radio" name="mark" value="60"> 60
                            <input type="radio" name="mark" value="70"> 70
                            <input type="radio" name="mark" value="80"> 80
                            <input type="radio" name="mark" value="90"> 90
                            <input type="radio" name="mark" value="100"> 100
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="comm" class="control-label">Ajout un commentaire:</label><br>
                            <span class="control-label"> </span>
                            <textarea rows="4" name="des" id="desc" cols="60" class="form-control" placeholder="Mes commentaires.." name="comm" required></textarea>
                        </div>
                        <button id="btnc" class="btn btn-sm btn-primary btn-block" type="submit">Ajouter</button>
                    </div>
                    <?php // echo $content['userInfo'][0]['firstname'] . ' ' . $content['userInfo'][0]['lastname'] ?>






                </form>
                <div id="comments"></div>
                <div id="flash"></div>
                <div id="display"></div>
                <script>


                    $("#frmaddComment").on("submit", function (event) {
                        //comment es lo que toma de la caja de texto
                        var comment = $('#desc').val();

                        $("#flash").show();

                        event.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: "/FaceMOOC/php/controller/Comments.php",
                            data: $(this).serialize(),
                            success: function (data) {
                                $("#comments").before($("#display"));
                                document.getElementById('desc').value = '';
                                document.getElementById('desc').focus();
                                $("#flash").hide();
                                $("#comments").append("<p>The comment text: " + comment + "</p>");//instead this line here you can call some function to read database values and display

                            },
                        });
                    });
                </script>



                <?php $idForm = $content['formation'][0]['id_formation']; ?>
                <?php echo "<script> var idFormation = " . $content['formation'][0]['id_formation'] . "</script>" ?> 














                <?php

                function date_comment($fecha) {
                    $days = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
                    $months = array(" ", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre");
                    $fechin = explode(' ', $fecha);
                    $today = explode('-', $fechin[0]);
                    $today1 = date("w", mktime(0, 0, 0, $today[1], $today[2], $today[0]));
                    $remplaza_days = array(
                        '01' => '1',
                        '02' => '2',
                        '03' => '3',
                        '04' => '4',
                        '05' => '5',
                        '06' => '6',
                        '07' => '7',
                        '08' => '8',
                        '09' => '9',
                    );
                    $date_clean = strtr($today[1], $remplaza_days);
                    $date_face = $days[$today1] . ' ' . $today[2] . ' ' . $months[$date_clean] . ' ' . $today[0] . ' (' . $fechin[1] . ') ';

                    if ($today[2] == 00) {
                        return 'Sans registre';
                    } else {
                        return $date_face;
                    }
                }

//var_dump($content['commentInfo']);
                global $content;
                if (is_array($content['commentInfo']) || is_object($content['commentInfo'])) {
                    foreach ($content['commentInfo'] as $key) {
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <ul class="comments-holder-ul">
                                    <li class="comment-holder" id="_1">
                                        <div class="user-img">
                                            <img src="<?= $key['avatar'] ?>" height="50 px" width="50 px"  class="user-img-pic">
                                        </div>
                                        <h5 class="username-field">
                                            <p style="">&nbsp;<?= $key['firstname'] ?><p>
                                        </h5>
                                        <div class="comment-text" id="comments">
                                            &nbsp;&nbsp; <?= $key["description"] ?>
                                            <br>
                                            <div style="text-align: right; font-size: 10px">
                                                <u>

                                                    <?= date_comment($key['date_comment']) ?>
                                                </u>
                                            </div>
                                        </div>
                                    </li>


                                </ul>
                            </div>
                        </div> 
                        <?php
                    }
                }
                ?>  

            </div>
        </div>
    </div>
</div>