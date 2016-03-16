<?php
include("head.php");
global $content;
foreach ($content['userInfo'] as $user){
echo '<h1>Bienvenue sur le site '. $user['firstname'] .' !</h1>';

}
//$formations = $content['formations'];
$formations = $content['page'];
$countFormations = $content['countFormations'];
$perpage = $content['perPage'];
$pages = ceil($countFormations[0]/$perpage);
//var_dump($content['page']);
//var_dump($pages);

//var_dump($formations);

?>
<body>
	<?php
		for($i = 0; $i <= count($formations) -1; $i++){
			echo "<div class ='row'>";
			for($j=1; $j<=4; $j++){
				echo "<a href='#'>";
				echo "<div class ='col-md-3 formation text-center'>";
				echo "<h2>".$formations[$i]['title']."</h2>";
				echo "<img src='".WEBROOT.$formations[$i]['image']."' alt='Image formation'>";
				echo "<p>Difficulty : ".$formations[$i]['difficulty']." </p>";
				echo "<p>Required skills : ".$formations[$i]['required_skill']." </p>";
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
</body>
<a class='btn btn-default' href='<?php WEBROOT ?>User/logout'>Deconnexion</a>