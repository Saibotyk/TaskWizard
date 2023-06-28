<?php
require "includes/_database.php";


$query = $dbCo->prepare("INSERT INTO task (title, description) VALUES (:title, :description)");
$isOK = $query->execute([
    'title' => strip_tags($_POST['task']),
    'description' => strip_tags($_POST['description'])
]);

header('location: index.php?msg='.($isOK ? 'ok' : 'ko'));
exit;
?>
