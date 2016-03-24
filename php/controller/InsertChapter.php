<?php

	header('cContent-type: application/json');
	include_once("../model/MChapter.php");

	extract($_POST);

	$mchapters = new MChapter();
	$mchapters->Connect();
	$response = $mchapters->InsertChapter($idFormation, $nameChapter, $descriptionChapter);
	
	
	echo json_encode($response);