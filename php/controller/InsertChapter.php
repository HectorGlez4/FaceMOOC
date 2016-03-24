<?php

	header('cContent-type: application/json');
	include_once("../model/MClass.php");

	extract($_POST);

	$mchapters = new MChapter();
	$mchapters->Connect();
	$response = $mchapters->Insert($idFormation, $nameChapter, $descriptionChapter);
	
	
	echo json_encode($response);