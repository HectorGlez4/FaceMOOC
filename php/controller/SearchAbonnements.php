<?php

header('cContent-type: application/json');
include_once("../model/MFormation.php");

extract($_POST);

$mform = new MFormation();
$mform->Connect();

$response = $mform->SelectInscriptionByKeywords($keywords, $page, $idUser);
$response[] = $mform->CountFormationsAbonnements($idUser);
$response[] = $mform->NbResults;

echo json_encode($response);