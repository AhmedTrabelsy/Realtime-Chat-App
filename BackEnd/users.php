<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

include_once 'db_connection.php';

$currentUser = json_decode(file_get_contents("php://input"));

$sql = "SELECT full_name FROM users WHERE user_id != '$currentUser'";

//prepare for variables in sql query : plus de sécurité
$reponse = $db->prepare($sql);
$reponse->execute();

$user = $reponse->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($user);
