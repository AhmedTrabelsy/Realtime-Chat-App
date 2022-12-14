<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));
include_once 'db_connection.php';

$sender_id = $data->currentUser;
$receiver_id = $data->currentReceiver;
$message = $data->msgValue;


$sql = "INSERT INTO `chats` (`message_id`, `sender_id`, `receiver_id`, `message`) VALUES (NULL, '$sender_id', '$receiver_id', '$message');";


$reponse = $db->prepare($sql);
$reponse->execute();

if ($reponse) {
    // success code 201
    http_response_code(201);

    // feedback success
    echo json_encode(array("message" => "Message sent !."));
} else {
    // erreur code 503
    http_response_code(503);

    // feedback error
    echo json_encode(array("message" => "Message not sent !"));
}