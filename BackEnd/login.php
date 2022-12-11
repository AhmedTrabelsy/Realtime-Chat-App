<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'db_connection.php';

$data = json_decode(file_get_contents("php://input"));
$email = $data->email;
$password = $data->password;

$sql = "SELECT user_id, full_name, email FROM users WHERE email = '$email' AND password = '$password'";

//prepare for variables in sql query : plus de sécurité
$reponse = $db->prepare($sql);
$reponse->execute();

$user = $reponse->fetch(PDO::FETCH_ASSOC);


echo json_encode($user);
