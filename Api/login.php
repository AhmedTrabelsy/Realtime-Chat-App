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

$sql = "SELECT user_id, full_name, email, password FROM users WHERE Upper(email) = '$email' AND password = '$password'";

//prepare for variables in sql query : plus de sécurité
$reponse = $db->prepare($sql);
$reponse->execute();

$user = $reponse->fetch(PDO::FETCH_ASSOC);
if (isset($user)) {
    session_start();
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['full_name'] = $user['full_name'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['password'] = $user['password'];
    $data = array();
    $data['user'] = $user;
    $data['session'] = true;
}


echo json_encode($data);
