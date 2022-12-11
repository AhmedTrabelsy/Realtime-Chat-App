<?php
try {
    // tunichat database connection 
    $db = new PDO('mysql:host=localhost; dbname=realtime-chat-app-db; charset=utf8', 'ahmed', 'vCrS-SNSCy(D!tzv');
} catch (Exception $e) {
    die('Erreur de connexion !' . $e->getMessage());
}