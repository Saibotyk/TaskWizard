<?php
require "includes/_database.php";
require "includes/_functions.php";

session_start();


verifyToken();
verifyOrigin();


    $query = $dbCo->prepare("UPDATE task SET title = :title WHERE id_task = :id");
    $isOK = $query->execute([
        'title' => strip_tags($_REQUEST['title']),
        'id' => intval(strip_tags($_REQUEST['id']))
    ]);
    
    header('location: index.php?msg='.($isOK ? 'addtask' : 'failtask'));
    exit;




// $expiration = 30;
// $currentTime = $_SERVER['REQUEST_TIME'];
// $expirationTime = $currentTime + $expiration;

// if ($currentTime > $expirationTime){
// var_dump('Token expired');
// }
// else{var_dump('token\'s fine');}
