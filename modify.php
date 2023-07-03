<?php
require "includes/_database.php";

// var_dump($_REQUEST);
// exit;
$query = $dbCo->prepare("UPDATE task SET title = :title WHERE id_task = :id");
$isOK = $query->execute([
    'title' => strip_tags($_REQUEST['title']),
    'id' => strip_tags($_REQUEST['id'])
]);

header('location: index.php');
exit;
?>
