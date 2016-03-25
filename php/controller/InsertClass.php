<?php

	header('cContent-type: application/json');
	include_once("../model/MClass.php");

	extract($_POST);

	$mclass = new MClass();
	$mclass->Connect();
	$response = $mchlass->InsertClass($idFormation, $nameChapter, $descriptionChapter);
	
	
	echo json_encode($response);