<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'db_connection.php';

$data = json_decode(file_get_contents("php://input"));
$receiver = $data->receiver;
$sender = $data->sender;

$sql = "select full_name, message, sender_id, receiver_id from chats join users on chats.sender_id = users.user_id WHERE (receiver_id = '$receiver' AND sender_id = '$sender') OR (receiver_id = '$sender' AND sender_id = '$receiver') ORDER BY message_id";

$reponse = $db->prepare($sql);
$reponse->execute();

$message = $reponse->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($message);
