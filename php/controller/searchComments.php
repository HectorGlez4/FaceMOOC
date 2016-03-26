<?php

	header('cContent-type: application/json');
	include_once("../model/MComment.php");

	

	extract($_POST);

	$mcomments = new MComment();
	$mcomments->Connect();
	$response = $mcomments->SelectComment(idFormation);
	
	
	echo json_encode($response);