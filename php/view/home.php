<?php
$mformation = new MFormation();
$formations = $mformation->SelectFormationsPage(1);
var_dump($formations);
?>
<h1>Bienvenue sur le site !</h1>

<body>
	<?php
		for($i = 0; $i <= count($formations) -1; $i++){
			$formationsId = $formations[$i]['id_formation'];
			var_dump($formationsId);
			$formationsTitle = $formations[$i]['title'];
			$formationsImage = $formations[$i]['image'];
			$formationsReqSkills = $formations[$i]['required_skill'];
			$formationsDifficulty = $formations[$i]['difficulty'];
			echo "<div class ='row'>";
			for($j=1; $j<=4; $j++){
				echo "<a href='#'>";
				echo "<div class ='column-md-3'>";
				echo "<h2>$formationsTitle</h2>";
				echo "<img src='$formationsImage' alt='Image formation'>";
				echo "<p>Difficulty : $formationsDifficulty </p>";
				echo "<p>Required skills : $formationsReqSkills </p>";
				echo "<div>";
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