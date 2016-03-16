<?php
include("head.php");
global $content;
foreach ($content['userInfo'] as $user){
echo '<h1>Bienvenue sur le site '. $user['firstname'] .' !</h1>';

}
$formations = $content['formations'];

var_dump($formations);

?>
<body>
	<?php
		for($i = 0; $i <= count($formations) -1; $i++){
			echo "<div class ='row'>";
			for($j=1; $j<=4; $j++){
				echo "<a href='#'>";
				echo "<div class ='col-md-3'>";
				echo "<h2>".$formations[$i]['title']."</h2>";
				echo "<img src='".$formations[$i]['image']."' alt='Image formation'>";
				echo "<p>Difficulty : ".$formations[$i]['difficulty']." </p>";
				echo "<p>Required skills : ".$formations[$i]['required_skill']." </p>";
				echo "</div>";
				echo "</a>";
				$i++;
				if($i > count($formations) - 1){
					break;
				}
				
			}
			echo "</div>";
		}
	?>
</body>
<a href='<?php WEBROOT ?>User/logout'>Deconnexion</a>