<?php
include("head.php");

global $content;
foreach ($content['userInfo'] as $user){

echo "<div class='container'>";
echo "<div class='panel-heading'>";
echo '<h2>Bienvenue sur le site '. $user['firstname'] .' !</h2>';
echo "</div>";
}
//$formations = $content['formations'];
$formations = $content['page'];
$countFormations = $content['countFormations'];
$perpage = $content['perPage'];
$pages = ceil($countFormations[0]/$perpage);
//var_dump($content['page']);
//var_dump($formations);
?>
<link rel="stylesheet" href="<?php echo WEBROOT?>css/home.css">

<body>
	<div class="container">
		<form id="frmSearch">
		    <div class="form-group">
		    	<label for="keywords">Search Formations</label>
		    	<input type="text" id="inputSearch" class="form-control" placeholder="Keywords..." name="keywords">
		  	</div>
		</form>
		<div id="divContent" class="page-header frm-content">
		</div>
		<a class='btn btn-default' href='<?php WEBROOT ?>Gestion'>Gestion de compte</a>
		<a class='btn btn-default' href='<?php WEBROOT ?>GestionFormation'>Gestion de Cours</a>
		<a class='btn btn-default' href='<?php WEBROOT ?>User/logout'>Deconnexion</a>
	<script src="<?php echo WEBROOT?>js/search.js"></script>
	<script>loadFormations(1)</script>
</body>
