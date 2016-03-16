<?php include("head.php")?>
<link rel="stylesheet" href="<?php echo WEBROOT?>/css/login.css">
    <body>
        <div class="container well" id="contenu">

            <div id="avatar">
                <span class="glyphicon glyphicon-user"></span>
            </div>

            <form class="login" action="<?php WEBROOT ?>User/login" method="POST">

                <div class="form-group">
                    <label>Modifiez vos informations de compte :</label>
                </div>
                <div class="form-group">
                    Email: <input type="email" class="form-control" placeholder="name@name.fr" name="email" autofocus>
                </div>
                <div class="form-group">
                    Prénom : <input type="text" class="form-control" name="firstname" required>
                </div>
                <div class="form-group">
                    Prénom : <input type="text" class="form-control" name="lastname" required>
                </div>

                <div class="form-group">
                    <label>Modifiez vos informations de compte :</label>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Start</button>

                <a href="<?php WEBROOT ?>User/inscription">Inscription</a>
                <p class="help-block"><a href="<?php WEBROOT ?>User/recupmdp">I forgot my password</a></p>


            </form>

        </div>

        <?php global $content ?>

    </body>
</html>
