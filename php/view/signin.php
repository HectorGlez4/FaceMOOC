<?php include("head.php")
?>
<body>
     <div class="container well" id="contenu">

        <form method="post" action="<?php WEBROOT ?>signin">

            <div class="form-group">
                <label for="email">Email : </label>
                <input type="text" class="form-control" id="email" name="email" autofocus/>
            </div>
            <div class="form-group">
                <label for="firstname">Prénom : </label>
                <input type="text" class="form-control" id="firstname" name="firstname"/>
            </div>
            <div class="form-group">
                <label for="lastname">Nom : </label>
                <input type="text" class="form-control" id="lastname" name="lastname"/>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe : </label>
                <input type="password" class="form-control" id="password" name="password"/>
            </div>
            <div class="form-group">
                <label for="passwordconf">Confirmez mot de passe : </label>
                <input type="password" class="form-control" id="passwordconf" name="passwordconf"/>
            </div>
            <button type="submit" name="submit" class="btn btn-md btn-primary btn-block" value="Connection">Inscription</button>
        </form>
    </div>
 </body>
