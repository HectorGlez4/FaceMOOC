
<?php 
include("head.php");
?>
<link rel="stylesheet" href="<?php echo WEBROOT?>/css/login.css">
<body>
 <div class="container well" id="contenu">
	
		<div id="avatar">
		<span class="glyphicon glyphicon-user"></span>
		</div>
				
		<form class="login" action="<?php WEBROOT ?>User/login" method="POST">
				<div class="form-group">
					Email: <input type="email" class="form-control" placeholder="name@name.fr" name="email" required autofocus>
				</div>

				<div class="form-group">
					Password: <input type="password" class="form-control" placeholder="*****" name="pass" required>
				</div>

				<button class="btn btn-lg btn-primary btn-block" type="submit">Start</button>

			<a href="<?php WEBROOT ?>User/inscription">Inscription</a>
				 <p class="help-block"><a href="<?php WEBROOT ?>User/recupmdp">I forgot my password</a></p>
			

	    </form>

	</div>

<?php global $content ?>

</body>
</html>
