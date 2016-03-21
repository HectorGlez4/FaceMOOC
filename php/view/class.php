<?php
include("head.php");
include("header.php");
global $content;
$formationInfo = $content['formation'][0];
$chapterInfo = $content['chapter'];
$classInfo = $content['class'];
$classesInfo = $content['currentclass'][0];
?>
<a class="btn btn-default" href="<?php echo WEBROOT . 'Formation/view/' . $content['formation'][0]['id_formation']?>"><span class="glyphicon glyphicon-chevron-left"></span> Formation </a>
<div class='container'>
	<div class="panel-heading">
			<h2><?php echo $formationInfo['title']; ?></h2>
	</div>
	<?php
		echo "<div class='row'>";
		echo "<div class='col-md-2'>";
		foreach ($chapterInfo as $chapter) {
			echo "<h3>".$chapter['title']."</h3>";
			//var_dump(expression);
			if ($classInfo[$chapter['id_chapter']] != null) {
				foreach ($classInfo[$chapter['id_chapter']] as $class) {
					echo "<a href='".WEBROOT."Classes/index/".$class['id_class']."'><h4>".$class['title']."</h4></a>";
				}
			}else{
				echo "";
			}
		}
		echo "</div>";
		echo "<div class='col-md-1'>";
		echo "</div>";
		echo "<div class='col-md-9'>";
		echo "<h3>".$classesInfo['title']."</h3>";
		echo "<iframe width='100%' height='415' src='".$classesInfo['video']."' frameborder='0' allowfullscreen></iframe>";
		echo "<p>".$classesInfo['description']."</p>";
		if ($classesInfo['docs'] != null) {
			echo "<a class='btn btn-default' href='".WEBROOT."docs/".$classesInfo['docs']."' onclick='window.open(this.href); return false;'><span class='glyphicon glyphicon-download'></span> Download teacher's note </a>";
		}
		echo "</div>";
		echo "</div>";
	?>
</div>