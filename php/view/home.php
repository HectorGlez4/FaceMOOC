<?php
include "../model/MFormation.php";

$mformation = new MFormation();
$mformation->SelectFormations(1);
var_dump($mformation);
?>
<h1>Bienvenue sur le site !</h1>

<body>
	<?php
		/*for(i=1; i<=count($mformation['id']); i++){
			echo "<div class ='row'>";
			for(j=1; j<=4; j++){
				echo "<a href='#'>";
				echo "<div class ='column-md-3'>";
				echo "<h2>$classTitle</h2>";
				echo "<p>$classChapters Chapter</p>";
				echo "<div>";
				echo "</a>";
				i++;
				if(i > count($class)){
					break;
				}
			}
			echo "</div>";
		}*/
	?>
</body>
<a href='<?php WEBROOT ?>User/logout'>Deconnexion</a>