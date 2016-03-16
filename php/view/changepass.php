<?php 
include("head.php");
?>
<link rel="stylesheet" href="<?php echo WEBROOT?>/css/login.css">
<body>
 <div class="container well" id="contenu">
	
				
		<form class="login" action="<?php WEBROOT ?>User/changepass" method="POST">
				<div class="form-group">
					 <label for="password">Inserez votre nouvel mot de passe :</label>
					 <input type="password" class="form-control" placeholder="****" name="password" required autofocus>
				</div>

				<div class="form-group">
					 <label for="password">Confirmer :</label>
					 <input type="password" class="form-control" placeholder="****" name="password" required autofocus>
				</div>

				<button class="btn btn-lg btn-primary btn-block" type="submit">Changer </button>
			

	    </form>

	</div>

<?php global $content ?>

</body>
</html>
