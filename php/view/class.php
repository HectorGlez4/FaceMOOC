<?php
include("head.php");
include("header.php");
global $content;
$formationInfo = $content['formation'][0];
$chapterInfo = $content['chapter'];
$classInfo = $content['class'];
$classesInfo = $content['currentclass'][0];
$formation = $content['formation'][0]['id_formation'];
$comments=$content['comments'][0]['description'];
?>
<!--<script src="<?php echo WEBROOT?>js/addComments.js"></script>!-->
<script src="<?php echo WEBROOT?>js/addComments.js"></script>


<div class='container'>
	<div class="jumbotron">

			<h1 class="text-center"><?php echo $formationInfo['title']; ?></h1>

	</div>
	<a class="btn btn-primary" href="<?php echo WEBROOT . 'Formation/view/' . $content['formation'][0]['id_formation']?>"><span class="glyphicon glyphicon-chevron-left"></span> Formation </a>
<br>
	<?php
		echo "<div class='row info-panel'>";
		echo "<div class='col-md-3 server-action-menu'>";
		foreach ($chapterInfo as $chapter) {

			echo "<h1>".$chapter['title']."</h1>";
			if ($classInfo[$chapter['id_chapter']] != null) {
				foreach ($classInfo[$chapter['id_chapter']] as $class) {
					echo "<a href='".WEBROOT."Classes/index/".$class['id_class']."'><h3>".$class['title']."</h3></a>";
				}
			}else{
				echo "";
			}
		}
		echo "</div>";
		echo "<div class='col-md-9'>";
		echo "<h2>".$classesInfo['title']."</h2>";
		echo "<iframe width='100%' height='415' src='".$classesInfo['video']."' frameborder='0' allowfullscreen></iframe>";
		echo "<p>".$classesInfo['description']."</p>";
		if ($classesInfo['docs'] != null) {
			echo "<a class='btn btn-primary' href='".WEBROOT."docs/".$classesInfo['docs']."' onclick='window.open(this.href); return false;'><span class='glyphicon glyphicon-download'></span> Download teacher's note </a>";
		}
		echo "</div>";
		echo "</div>";
	?>
	<div class='row info-panel'>
	<div class='col-md-3'>
	</div>
	<div class='col-md-9'>
	<div class="panel panel-default">
	<div class="panel panel-heading">
		<h3 class="text-center ">Commentaires</h3>
	</div>

	<form id="frmaddComment">
		                <input type="hidden" name="idFormation" value="<?php echo $idForm ?>">

						<div class="modal-body">
                          <!--   <div class="form-group">
                            <label for="name" class="control-label">Nom :</label>
                            <input type="text" id="nam" class="form-control" name="comm" value="<?php echo $content['userInfo'][0]['firstname'] ?>">
                          </div> -->
                          
		 
                            <div class="form-group">
                            <label for="comm" class="control-label">Commentez et notez :</label>
                            <textarea rows="4" id="desc" cols="60" class="form-control" placeholder="Mes commentaires..." name="comm" required autofocus></textarea>
                          </div>
                    <button id="btnc" class="btn btn-sm btn-primary btn-block" type="submit">Ajouter Comment</button>
                          </div>

                            
	</form>

	<div id="comments">
                          	<?php

        global $content;
var_dump($comments);
        if (is_array($content['formation']) || is_object($content['formation'])) {

            foreach ($content['formation'] as $key) {
				echo '<table>';
                echo '<tr>';
                echo '<td>' . $key["id_formation"] . '</td>';
               	echo '</tr>';
               	echo '</table>';


               

            }
        }


        ?>
                          	
                          </div>
		
	</div>
	</div>
		</div>


<?php $idForm = $content['formation'][0]['id_formation']; ?>
<?php echo $idForm  ?>  
<?php  echo "<script> var idFormation = " . $content['formation'][0]['id_formation'] . "</script>" ?> 
<script src="<?php echo WEBROOT?>js/addComments.js"></script>
<script>addComment(idFormation)</script>


</div>