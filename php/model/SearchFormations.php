<?php

	header('cContent-type: application/json');
	include_once("MFormation.php");

	extract($_POST);

	$mform = new MFormation();
	$mform->Connect();
	
	echo json_encode($mform->SelectFormations($keywords));