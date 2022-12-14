<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

session_start();
if (isset($_SESSION['user_id'])) {
    $data = true;
    // session_start();
    // $_SESSION['user_id'] = $user['user_id'];
    // $_SESSION['full_name'] = $user['full_name'];
    // $_SESSION['email'] = $user['email'];
    // $_SESSION['password'] = $user['password'];
} else {
    $data = false;
}

echo json_encode($data);
