<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="bs-example">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	    <div class="navbar-header">

	    	<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
				<span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
<a href="<?php echo WEBROOT ?>Home"><img class="navbar-brand" id="logo" src="<?php echo WEBROOT ?>img/FaceMOOC.png"></a>
        </div>
<div id="navbarCollapse" class="collapse navbar-collapse">
             <ul class="nav navbar-nav">
                <li class="nav-item">
		      	<a class="nav-link" href='<?php echo WEBROOT ?>Home'><span class="glyphicon glyphicon-home"></span> Home</a>
		    </li>
		    <li class="nav-item">
		      	<a class="nav-link" href='<?php echo WEBROOT ?>Gestion'><span class="glyphicon glyphicon-user"></span> My account</a>
		    </li>
		    <li class="nav-item">
      			<a class="nav-link" href='<?php echo WEBROOT ?>GestionFormation'><span class="glyphicon glyphicon-book"></span> Formation manager</a>
		    </li>
	    </ul>
           <ul class="nav navbar-nav navbar-right">
	      <li>
	      	<a href='<?php WEBROOT ?>User/logout'><span class="glyphicon glyphicon-off"></span> Logout </a>
	      </li>
	    </ul>
        </div>

</nav>
</div>
</body>
	</html>