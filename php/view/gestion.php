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
                    <label>Email :</label>
                    <input type="email" class="form-control" placeholder="name@name.fr" name="email" autofocus>
                </div>
                <div class="form-group">
                    <label>Prénom :</label>
                    <input type="text" class="form-control" name="firstname" required>
                </div>
                <div class="form-group">
                    <label>Nom :</label>
                     <input type="text" class="form-control" name="lastname" required>
                </div>

                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Modifier mot de passe</button>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Confirmer</button>
            
        </div>

        <?php global $content ?>

    </body>
</html>
