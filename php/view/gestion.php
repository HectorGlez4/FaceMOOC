<?php include("head.php")?>
<link rel="stylesheet" href="<?php echo WEBROOT?>/css/login.css">
    <body>
        

<div class="container">
  <div class="jumbotron">
    <h1>Mon compte</h1>
  </div>
    <div class="row">
        <div class="col-md-4">
        <h3>Image</h3><br>
        <img class="responsive" src="<?php echo WEBROOT?>/img/avatar.png"></img>
        </div>
    <div class="col-md-8">
        <h3>Information Personnelle</h3>
      
        <form class="manageac" action="<?php ROOT ?>updateaccount" method="POST">

                    <div class="form-group">
                    <label>Modifiez vos informations de compte :</label>
                    </div>
                        <div class="form-group">
                    <label>Email :</label>
                    <input type="email" class="form-control" placeholder="name@name.fr" name="email" autofocus>
                        </div>
                    <div class="form-group">
                    <label>Prénom :</label>
                    <input type="text" class="form-control" name="firstname">
                     </div>
                    <div class="form-group">
                    <label>Nom :</label>
                     <input type="text" class="form-control" name="lastname">
                     </div>
                   
                       
                    <button type="button" class="btn btn-md btn-primary btn-block" data-toggle="modal" data-target="#myModal">Modifier mot de passe</button>
                       
                    <button class="btn btn-md btn-primary btn-block" type="submit">Confirmer</button>
                    
                    </div>
</form>


    </div>
    <?php include("changepass.php")?>
  </div>
  </div>






        <?php global $content ?>

    </body>
</html>
