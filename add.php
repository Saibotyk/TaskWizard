<?php
require "includes/_database.php";


$query = $dbCo->prepare("INSERT INTO task (title) VALUES (:title)");
$isOK = $query->execute([
    'title' => strip_tags($_POST['task']),
]);

header('location: index.php?msg='.($isOK ? 'ok' : 'ko'));
exit;
?>
