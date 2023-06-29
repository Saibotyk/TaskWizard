<?php
require "includes/_database.php";


$query = $dbCo->prepare("UPDATE task SET title = :title, description = :description WHERE id_task = :id");
$isOK = $query->execute([
    'title' => strip_tags($_POST['task']),
    'description' => strip_tags($_POST['description']),
    'id' => strip_tags($_POST['id'])
]);

header('location: index.php');
exit;
?>
