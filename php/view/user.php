<!doctype html>
<!---->
<html lang="fr">
	<?php include("head.php")?>
    <body>

<form method="post" action="./index.php">
	<div class="form-group">
	    <label for="pseudo" >Pseudo : </label>
		<input type="text" class="form-control" id="pseudo" name="pseudo" />
  	</div>
	<div class="form-group">
		<label for="password">Mot de passe : </label>
		<input type="password" class="form-control" id="password" name="password" />
  	</div>
  	<button type="submit" name="submit" class="btn btn-default" value="Connection">Submit</button>
</form>

<?php global $content ?>
<?php include("footer.php")?>
 </body>
</html>