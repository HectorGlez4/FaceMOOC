<?php

	header('cContent-type: application/json');
	include_once("../model/MComment.php");
	include_once("../model/MUser.php");

	extract($_POST);

	$MUser = new MUser();
	$Mcomment = new MComment();
	$Mcomment->Connect();
	$response= $Mcomment->InsertComment($idFormation, $idUser, $mark, $des, $date);
	if($response)
		$rep = $MUser->SelectUserById($idUser);
	
	echo json_encode($rep);
?>