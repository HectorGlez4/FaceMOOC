<!doctype html>
<!---->
<html lang="fr">
	<?php include("head.php")?>
    <body>


<form method="post" action="<?php WEBROOT ?>User/login">
	<div class="form-group">
	    <label for="email">Email : </label>
		<input type="text" id="email" name="email" />
  	</div>
	<div class="form-group">
		<label for="password">Mot de passe : </label>
		<input type="password" class="form-control" id="password" name="password" />
  	</div>
  	<button type="submit" name="submit" class="btn btn-default" value="Connection">Submit</button>
</form>

<a href="<?php WEBROOT ?>User/inscription">Inscription</a>

<?php global $content ?>
<?php include("footer.php")?>
 </body>
</html>
