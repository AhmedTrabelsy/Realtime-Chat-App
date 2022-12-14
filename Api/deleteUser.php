<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'db_connection.php';

$data = json_decode(file_get_contents("php://input"));
$currentUser = $data;

$sql = "DELETE FROM `chats` WHERE sender_id = $currentUser OR receiver_id = $currentUser;";

//prepare for variables in sql query : plus de sécurité
$reponse = $db->prepare($sql);
$reponse->execute();

$sql = "DELETE FROM `users` WHERE user_id = $currentUser;";

//prepare for variables in sql query : plus de sécurité
$reponse = $db->prepare($sql);
$reponse->execute();

$user = $reponse->fetch(PDO::FETCH_ASSOC);
if (isset($user)) {
    $data = true;
}

echo json_encode($data);
