<?php include("head.php") ?>
<link rel="stylesheet" href="<?php echo WEBROOT?>/css/login.css">
<body>
    <div class="container well" id="contenu">

        <div id="avatar">
            <span class="glyphicon glyphicon-user"></span>
        </div>

        <form class="login" action="<?php WEBROOT ?>recoverPassword" method="POST">
            <div class="form-group">
                <label for="email">Récuperez votre mot de passe</label>
            </div>
            <div class="form-group">
                Inserez votre email : <input type="email" id="email" class="form-control" placeholder="name@name.fr" name="email"  autofocus>
            </div>

            <button class="btn btn-md btn-primary btn-block" type="submit">Envoyer</button>
            <a class='btn btn-md btn-primary btn-block' href='<?php WEBROOT ?>..'>Retour</a>
        </form>

    </div>
</body>
