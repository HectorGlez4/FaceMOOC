<?php

	header('cContent-type: application/json');
	include_once("../model/MClass.php");

	extract($_POST);

	$mclass = new MClass();
	$mclass->Connect();
	$response = $mclass->DeleteClass($idClass);
	
	
	echo json_encode($response);