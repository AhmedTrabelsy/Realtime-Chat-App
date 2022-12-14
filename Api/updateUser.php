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
$user_id = $data->user_id;

if ($name != "" || $email != "" || $password != "") {
    $sql_name = "`full_name` = '$name'";
    $sql_email = "`email` = '$email'";
    $sql_password = "`password` = '$password'";
    
    if ($name != "") {
        $sql = "UPDATE `users` SET $sql_name WHERE `users`.`user_id` = $user_id";
        $reponse = $db->prepare($sql);
        $reponse->execute();
    }
    if ($email != "") {
        $sql = "UPDATE `users` SET $sql_email WHERE `users`.`user_id` = $user_id";
        $reponse = $db->prepare($sql);
        $reponse->execute();
    }
    if ($password != "") {
        $sql = "UPDATE `users` SET $sql_password WHERE `users`.`user_id` = $user_id";
        $reponse = $db->prepare($sql);
        $reponse->execute();
    }
}
$user = $reponse->fetch(PDO::FETCH_ASSOC);
if ($user) {
    $data = true;
} else {
    $data = false;
}
echo json_encode($data);
