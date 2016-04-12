<?php

	header('cContent-type: application/json');
	include_once("../model/MChapter.php");

	extract($_POST);

	$mchapters = new MChapter();
	$mchapters->Connect();
	$response = $mchapters->DeleteChapter($idChapter);
	
	
	echo json_encode($response);