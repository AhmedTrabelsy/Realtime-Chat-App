<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'db_connection.php';

$data = json_decode(file_get_contents("php://input"));

$name = $data->name;
$email = $data->email;
$password = $data->password;

$sql = "SELECT user_id FROM users WHERE Upper(email) = '$email'";
$reponse = $db->prepare($sql);
$reponse->execute();
$user = $reponse->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $data = false;
} else {
    $sql = "INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`) VALUES (NULL, '$name', '$email', '$password');";
    $reponse = $db->prepare($sql);
    //prepare for variables in sql query : plus de sécurité
    $reponse->execute();
    $user = $reponse->fetch(PDO::FETCH_ASSOC);
    $data = true;
}

echo json_encode($data);
