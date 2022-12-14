<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

include_once 'db_connection.php';

$data = json_decode(file_get_contents("php://input"));

$currentUser = $data->currentUser;
$search = $data->search;

$sql = "SELECT full_name FROM users WHERE user_id != '$currentUser' AND Upper(full_name) LIKE('%$search%');";
//prepare for variables in sql query : plus de sécurité
$reponse = $db->prepare($sql);
$reponse->execute();

$user = $reponse->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT full_name, email FROM users WHERE user_id = '$currentUser';";
$reponse = $db->prepare($sql);
$reponse->execute();
$currentUser = $reponse->fetch(PDO::FETCH_ASSOC);

$data = [$user, $currentUser];
echo json_encode($data);
