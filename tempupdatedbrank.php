<?php
require 'includes/_database.php';
require 'includes/_functions.php';

session_start();


// verifyToken();
verifyOrigin();

$query = $dbCo->prepare("UPDATE task SET ranking = id_task");
$isOk = $query->execute();


header('Location: index.php');
exit;
?>