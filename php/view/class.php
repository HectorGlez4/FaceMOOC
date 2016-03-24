<?php
include("head.php");
include("header.php");
global $content;
$formationInfo = $content['formation'][0];
$chapterInfo = $content['chapter'];
$classInfo = $content['class'];
$classesInfo = $content['currentclass'][0];
$formation = $content['formation'][0]['id_formation'];
?>
<div class='container'>
	<div class="jumbotron">
			<h1><?php echo $formationInfo['title']; ?></h1>
	</div>
	<?php
		echo "<div class='row'>";
		echo "<div class='col-md-3'>";
		foreach ($chapterInfo as $chapter) {
			echo "<h2>".$chapter['title']."</h2>";
			//var_dump(expression);
			if ($classInfo[$chapter['id_chapter']] != null) {
				foreach ($classInfo[$chapter['id_chapter']] as $class) {
					echo "<a href='".WEBROOT."Classes/index/".$class['id_class']."'><h3>".$class['title']."</h3></a>";
				}
			}else{
				echo "";
			}
		}
		echo "<a class='btn btn-default' href='".WEBROOT."Formation/view/" .$formation."'><span class='glyphicon glyphicon-chevron-left'></span> Formation </a>";
		echo "</div>";
		echo "<div class='col-md-9'>";
		echo "<h2>".$classesInfo['title']."</h2>";
		echo "<iframe width='100%' height='415' src='".$classesInfo['video']."' frameborder='0' allowfullscreen></iframe>";
		echo "<p>".$classesInfo['description']."</p>";
		if ($classesInfo['docs'] != null) {
			echo "<a class='btn btn-default' href='".WEBROOT."docs/".$classesInfo['docs']."' onclick='window.open(this.href); return false;'><span class='glyphicon glyphicon-download'></span> Download teacher's note </a>";
		}
		echo "</div>";
		echo "</div>";
	?>
</div>