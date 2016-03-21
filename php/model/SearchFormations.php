<?php

	header('cContent-type: application/json');
	include_once("MFormation.php");

	extract($_POST);

	$mform = new MFormation();
	$mform->Connect();
	$response = $mform->SelectFormationsByKeywords($keywords, $page);
	$response[] = $mform->CountFormations();
	$response[] = $mform->NbResults;
	
	echo json_encode($response);