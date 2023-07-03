<?php
require 'includes/_database.php';

$query = $dbCo->prepare("UPDATE task SET ranking = id_task");
$isOk = $query->execute();


header('Location: index.php');
exit;
?>