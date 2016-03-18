<?php include("head.php") ?>
<?php global $content;
var_dump($content['userGestion'][0]); ?>
<link rel="stylesheet" href="<?php echo WEBROOT ?>/css/login.css">
<body>


<div class="container">
    <div class="jumbotron">
        <h1>Mon compte</h1>
    </div>
            <form  action="<?php ROOT ?>Gestion/updateaccount" method="POST">

                <div class="row">
                    <div class="col-md-6">
                        <h3>Image</h3><br/>

                        <div class="image-upload">
                            <label for="student_avatar">
                                <img class="responsive" src="<?php echo WEBROOT ?>/img/avatar.png"/>
                            </label>
                            <div class="file-field input-field">
                                <div class="file-path-wrapper">
                                    <input id="student_avatar" type="file" name="avatar"/>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <h3>Information Personnelle</h3>

                <div class="form-group">
                    <label>Modifiez vos informations de compte :</label>
                </div>
                <div class="form-group">
                    <label>Email :</label>
                    <input type="email" class="form-control" placeholder="name@name.fr" name="email"
                           value="<?php echo $content['userGestion'][0]['email'] ?>" autofocus>
                </div>
                <div class="form-group">
                    <label>Prénom :</label>
                    <input type="text" class="form-control" name="firstname"
                           value="<?php echo $content['userGestion'][0]['firstname'] ?>">
                </div>
                <div class="form-group">
                    <label>Nom :</label>
                    <input type="text" class="form-control" name="lastname"
                           value="<?php echo $content['userGestion'][0]['lastname'] ?>">
                </div>


                <button type="button" class="btn btn-md btn-primary btn-block" data-toggle="modal"
                        data-target="#myModal">Modifier mot de passe
                </button>

                <button class="btn btn-md btn-primary btn-block" type="submit">Confirmer</button>

        </div>
        </form>
    </div>
    <?php include("changepass.php") ?>
</div>

<?php global $content ?>

</body>
</html>
