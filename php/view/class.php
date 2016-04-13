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
    <a class="btn btn-primary"
       href="<?php echo WEBROOT . 'Formation/view/' . $content['formation'][0]['id_formation'] ?>"><span
            class="glyphicon glyphicon-chevron-left"></span> Formation </a>
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
            <iframe width='100%' height='415' src='<?= $classesInfo['video'] ?>' frameborder='0'
                    allowfullscreen></iframe>
            <p><?= $classesInfo['description'] ?></p>
            <?php
            if ($classesInfo['docs'] != null) {
                ?>
                Téléchargez le cours :
                <a class='btn btn-primary' href='<?= WEBROOT . $classesInfo['docs'] ?>'
                   onclick='window.open(this.href); return false;'><span class='glyphicon glyphicon-download'></span>
                    Download teacher's note </a>
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
                        <div class="form-group">Notez le cours sur 5 :

                            <!-- <div class="ec-stars-wrapper">  Notez le cours sur 5 :
                                <a href="#" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
                                <a href="#" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
                                <a href="#" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
                                <a href="#" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
                                <a href="#" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
                            </div>
                            <noscript>Necesitas tener habilitado javascript para poder votar</noscript> -->


                            <label class="Form-label--tick">

                                <input type="radio" value="1" id="mark" name="mark" class="Form-label-radio" required>

                                <span class="Form-label-text">1</span>

                            </label>

                            <label class="Form-label--tick">

                                <input type="radio" value="2" id="mark" name="mark" class="Form-label-radio">

                                <span class="Form-label-text">2</span>

                            </label>

                            <label class="Form-label--tick">

                                <input type="radio" value="3" id="mark" name="mark" class="Form-label-radio">

                                <span class="Form-label-text">3</span>

                            </label>
                            <label class="Form-label--tick">

                                <input type="radio" value="4" id="mark" name="mark" class="Form-label-radio">

                                <span class="Form-label-text">4</span>

                            </label>
                            <label class="Form-label--tick">

                                <input type="radio" value="5" id="mark" name="mark" class="Form-label-radio">

                                <span class="Form-label-text">5</span>

                            </label>


                        </div>
                        <br>
                        <div class="form-group">
                            <label for="comm" class="control-label">Ajout un commentaire:</label><br>
                            <span class="control-label"> </span>
                            <textarea rows="4" name="des" id="desc" cols="60" class="form-control"
                                      placeholder="Donnez votre avis..." name="comm" required></textarea>
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
                        var mark = $('#mark').val();
                        var now = new Date();
                        var date_show = now.getDate() + '-' + now.getMonth() + '-' + now.getFullYear() + ' ' + now.getHours() + ':' + +now.getMinutes() + ':' + +now.getSeconds();

                        $("#flash").show();

                        event.preventDefault();
                        $.ajax({
                            type: "POST",
                            url: "/FaceMOOC/php/controller/Comments.php",
                            dataType: "json",
                            data: $(this).serialize(),
                            success: function (data) {
                                $("#comments").before($("#display"));
                                document.getElementById('desc').value = '';
                                document.getElementById('desc').focus();
                                $("#flash").hide();
                                alert(data);
                                $("#comments").append('<div class="panel panel-default"><div class="panel-body"><ul class="comments-holder-ul"><li class="comment-holder" id="_1"><div class="user-img"><img width="50" height="50" src="/FaceMOOC/' + data[0].avatar + '" /></div><h4 class="username-field"><p class="text-info">'+data[0].firstname+' a dit ('+mark+'/5) :</p></h4><div class="comment-text" id="comments">&nbsp;&nbsp;'+comment+'<br/><div style="text-align: right; font-size: 10px"><u>' + date_show + '</u></div></div></li></ul></div><div>');//instead this line here you can call some function to read database values and display

                            },
                        });
                    });
                </script>


                <?php $idForm = $content['formation'][0]['id_formation']; ?>

                <?php echo "<script> var idFormation = " . $content['formation'][0]['id_formation'] . "</script>" ?>


                <?php

                function date_comment($fecha)
                {
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
                                            <img src="<?php echo WEBROOT . $key['avatar'] ?>" height="50 px"
                                                 width="50 px" class="user-img-pic">
                                        </div>
                                        <h4 class="username-field">
                                            <p class="text-info">&nbsp;<?= $key['firstname'] ?> a dit
                                                (<?= $key['mark'] ?>/5) :
                                            <p>

                                        </h4>
                                        <div class="comment-text" id="comments">
                                            &nbsp;&nbsp; <?= $key["description"] ?>
                                            <br/>
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

