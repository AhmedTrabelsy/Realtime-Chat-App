<?php
define('HOST', 'localhost');
define('DBNAME', 'realtime-chat-app-db');
define('CHARSET', 'utf8mb4');
define('USERNAME', 'ahmed');
define('PASSWORD', 'vCrS-SNSCy(D!tzv');

try {
    // tunichat database connection 
    $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';charset=' . CHARSET, USERNAME, PASSWORD);
} catch (Exception $e) {
    die('Erreur de connexion !' . $e->getMessage());
}

// define('HOST', 'sql306.epizy.com');
// define('DBNAME', 'epiz_33163203_realtime_chat_app_db');
// define('CHARSET', 'utf8mb4');
// define('USERNAME', 'epiz_33163203');
// define('PASSWORD', '1bWmeiM0DHTSs4');

// try {
//     // tunichat database connection 
//     $db = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';charset=' . CHARSET, USERNAME, PASSWORD);
// } catch (Exception $e) {
//     die('Erreur de connexion !' . $e->getMessage());
// }
