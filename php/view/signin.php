<html>

<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="<?php WEBROOT ?>css/bootstrap.css?">
    <link rel="stylesheet" type="text/js" href="<?php WEBROOT ?>js/bootstrap.js?">
</head>

    <body>
        <form method="post" action="<?php WEBROOT ?>User/login">

            <div class="form-group">
                <label for="email">Email : </label>
                <input type="text" id="email" name="email" />
            </div>
            <div class="form-group">
                <label for="firstname">Prénom : </label>
                <input type="text" id="firstname" name="firstname" />
            </div>
            <div class="form-group">
                <label for="lastname">Nom : </label>
                <input type="text" id="lastname" name="lastname" />
            </div>
            <div class="form-group">
                <label for="password">Mot de passe : </label>
                <input type="password" id="password" name="password" />
            </div>
            <div class="form-group">
                <label for="passwordconf">Confirmez mot de passe : </label>
                <input type="password" id="passwordconf" name="passwordconf" />
            </div>
            <button type="submit" name="submit" class="btn btn-default" value="Connection">Inscription</button>
        </form>

    </body>

</html>