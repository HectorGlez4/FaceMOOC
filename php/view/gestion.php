<?php include("head.php") ?>
<?php global $content;?>
<link rel="stylesheet" href="<?php echo WEBROOT ?>/css/login.css">
<body>

<div class="container">
    <div class="jumbotron">
        <h1>Mon compte</h1>
    </div>
    <form action="<?php ROOT ?>Gestion/updateaccount" method="POST" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-6">
                <h3>Image</h3><br/>

                <label for="avatar">
                    <img id='avatar' class="responsive" src="<?php echo WEBROOT ?>img/avatar/<?php echo $_SESSION['avatar'] ?>"/>
                </label>
                <div class="form-group">
                    <div class="input-group">
                        <input class="btn btn-md btn-primary btn-block" type="file" name="avatar"/>
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
