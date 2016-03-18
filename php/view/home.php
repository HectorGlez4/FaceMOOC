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
<link rel="stylesheet" href="<?php echo WEBROOT?>/css/home.css">

<body>
	<div class="container">
		<form id="frmSearch">
		    <div class="form-group">
		    	<label for="keywords">Search Formations</label>
		    	<input type="text" id="inputSearch" class="form-control" placeholder="Keywords..." name="keywords">
		  	</div>
		</form>
		<div class="page-header">

			<?php
			for($i = 0; $i <= count($formations) -1; $i++){
				
				echo "<div class ='row'>";
				for($j=1; $j<=4; $j++){
					echo "<a href='".WEBROOT."Formation/view/".$formations[$i]['id_formation']."'>";
					
					echo "<div class ='col-md-3 text-center'>";
					echo "<div  class='panel panel-info'>";
					echo "<div class='panel-heading'>";
					
					echo "<div class='panel-body'>";
					
					echo "<h2>".$formations[$i]['title']."</h2>";
					echo "<img src='".WEBROOT.$formations[$i]['image']."' alt='Image formation' class='img-responsive img-thumbnail'>";
					echo "<p>Difficulty : ".$formations[$i]['difficulty']." </p>";
					echo "<p>Required skills : ".$formations[$i]['required_skill']." </p>";
					

					echo "</div>";
					echo "</div>";
					echo "</div>";
					echo "</div>";
					echo "</a>";
					$i++;
					if($i > count($formations) - 1){
						break;
					}
				}
				$i--;
				
				echo "</div>";

			}
			for ($ii=1; $ii <= $pages ; $ii++) {
			
				echo "<a class='btn btn-default' href = '".WEBROOT."Home/view/$ii' role='button' >$ii</a>";
			}
			?>
		</div>

		<a class='btn btn-default' href='<?php WEBROOT ?>Gestion'>Gestion de compte</a>
		<a class='btn btn-default' href='<?php WEBROOT ?>GestionFormation'>Gestion de Cours</a>
		<a class='btn btn-default' href='<?php WEBROOT ?>User/logout'>Deconnexion</a>
	
</body>
