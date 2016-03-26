<?php

	header('cContent-type: application/json');
	include_once("../model/MComment.php");

	extract($_POST);
	
	
	$Mcomment = new MComment();
	$Mcomment->Connect();
	$response= $Mcomment->InsertComment($idFormation, $idUser, $mark, $des, $date);
	
	
	echo json_encode($response);
?>