<?php
include("head.php");
global $content;
$formationInfo = $content['formation'][0];
?>
<h1><?php echo $formationInfo['title']; ?></h1>
<p><?php echo $formationInfo['description']; ?></p>