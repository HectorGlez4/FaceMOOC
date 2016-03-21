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
<h1><?php echo $formationInfo['title']; ?></h1>
<p><?php echo $formationInfo['description']; ?></p>
<a class="btn btn-default" href="#">Sign up</a>
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
		echo "<h2>".$chapter['title']."</h2>";
		//var_dump(expression);
		echo "<div class ='row'>";
		echo "<div class='panel panel-default'>";
		echo "<div class='panel-body'>";
		if ($classInfo[$chapter['id_chapter']] != null) {
			foreach ($classInfo[$chapter['id_chapter']] as $class) {
				echo "<a href='".WEBROOT."Classes/index/".$class['id_class']."'><h3>".$class['title']."</h3></a>";
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