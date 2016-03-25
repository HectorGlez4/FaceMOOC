<?php include("head.php");
global $content;
$token = $content['token'];
?>
<link rel="stylesheet" href="<?php echo WEBROOT?>/css/login.css">
<body>
    <div class="container well" id="contenu">

        <div id="avatar">
            <span class="glyphicon glyphicon-user"></span>
        </div>

        <form class="login" action="<?php WEBROOT ?>../controlCode/<?php echo $token ?>" method="POST">
            <div class="form-group">
                <label for="email">Récuperez votre mot de passe</label>
            </div>
            <div class="form-group">
                Inserez le code envoyé : <input type="text" id="code" class="form-control" placeholder="########" name="code"  autofocus>
            </div>

            <button class="btn btn-md btn-primary btn-block" type="submit">Envoyer</button>
            <a class='btn btn-md btn-primary btn-block' href='<?php WEBROOT ?>..'>Retour</a>
        </form>

    </div>
</body>
