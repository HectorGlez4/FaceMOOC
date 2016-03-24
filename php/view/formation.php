<?php
include("head.php");
include("header.php");
global $content;
$formationInfo = $content['formation'][0];
$chapterInfo = $content['chapter'];
if (isset($content['class'])) {
	$classInfo = $content['class'];	
}
?>
<div class="container">

<div class="panel panel-default">

	<div class="panel-heading">
		<h3 class="text-center ">Bienvenue dans le cours <?php echo $formationInfo['title']; ?></h3>
	</div>

		<h1 class="text-justify"><?php echo $formationInfo['description']; ?></h1>
		<div class="pull-right"><br>
			<a class="btn btn-success" href="#"><span class="glyphicon glyphicon-eye-open"></span> Sign up</a>
			<br>
		</div>
	
		
	</div>
	
		<?php
		if ($chapterInfo == null) {
			echo "<div class ='panel panel-default'>";
			echo "<div class ='row'>";
			echo "<div class='panel panel-heading'>";
			echo "<div class='panel-body'>";
			echo "<p>Cette formation ne comporte pas encore de cours</p>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}else{
			//chapters panel
			foreach ($chapterInfo as $chapter) {
				echo "<div class ='rowww'>";
				echo "<div class='panel panel-heading'>";
				echo "<div class='panel-body'>";
				echo "<h2>".$chapter['title']."</h2>";
				//var_dump(expression);

				echo "<div class ='row'>";
				echo "<div class='panel panel-heading'>";
				echo "<div class='panel-body well'>";
				if ($classInfo[$chapter['id_chapter']] != null) {
					foreach ($classInfo[$chapter['id_chapter']] as $class) {
						echo "<a href='".WEBROOT."Classes/index/".$class['id_class']."'><h3 class='text-info'>".$class['title']."</h3></a>";
					}
				}else{
					echo "<p>Ce chapitre ne comporte pas encore de cours</p>";
				}
				echo "</div>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
				echo "</div>";

			}
		}
		?>

</div>
