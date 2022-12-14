<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


include_once 'db_connection.php';

$sql = "select email, full_name, message, sender_id, receiver_id from chats join users on chats.sender_id = users.user_id ORDER BY message_id";

$reponse = $db->prepare($sql);
$reponse->execute();

$message = $reponse->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($message);
