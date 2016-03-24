<?php
include("head.php");
include("header.php");

global $content;
foreach ($content['userInfo'] as $user){

echo "<div class='container'>";
echo "<div class='panel-heading'>";
echo '<h2>Bienvenue sur le site, '. $user['firstname'] .' !</h2>';
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
	<script src="<?php echo WEBROOT?>js/search.js"></script>
	<script>loadFormations(1)</script>
</body>
