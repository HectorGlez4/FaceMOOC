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
	<div class="panel-heading">
		<h2><?php echo $formationInfo['title']; ?></h2>
	</div>
	<div class="container">
		<p><?php echo $formationInfo['description']; ?></p>
		<div class="pull-right">
			<a class="btn btn-success" href="#"><span class="glyphicon glyphicon-eye-open"></span> Sign up</a>
		</div>
	</div>
	<div class="container">
		<?php
		if ($chapterInfo == null) {
			echo "<div class ='row'>";
			echo "<div class='panel panel-default'>";
			echo "<div class='panel-body'>";
			echo "<p>Cette formation ne comporte pas encore de cours</p>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}else{
			foreach ($chapterInfo as $chapter) {
				echo "<div class ='row'>";
				echo "<div class='panel panel-default'>";
				echo "<div class='panel-body'>";
				echo "<h3>".$chapter['title']."</h3>";
				//var_dump(expression);
				echo "<div class ='row'>";
				echo "<div class='panel panel-default'>";
				echo "<div class='panel-body'>";
				if ($classInfo[$chapter['id_chapter']] != null) {
					foreach ($classInfo[$chapter['id_chapter']] as $class) {
						echo "<a href='".WEBROOT."Classes/index/".$class['id_class']."'><h4>".$class['title']."</h4></a>";
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
</div>