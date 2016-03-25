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

        <form class="login" action="<?php WEBROOT ?>../newPassword/<?php echo $token ?>" method="POST">
            <div class="form-group">
                <label for="email">Récuperez votre mot de passe</label>
            </div>
            <div class="form-group">
                Nouveau mot de passe : <input type="password" id="newMdp" class="form-control" placeholder="******" name="newMdp"  autofocus>
            </div>
            <div class="form-group">
                Confirmer nouveau mot de passe : <input type="password" id="newMdpVerif" class="form-control" placeholder="******" name="newMdpVerif"  autofocus>
            </div>

            <button class="btn btn-md btn-primary btn-block" type="submit">Envoyer</button>
            <a class='btn btn-md btn-primary btn-block' href='<?php WEBROOT ?>..'>Retour</a>
        </form>

    </div>
</body>