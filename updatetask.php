<?php
require 'includes/_database.php';

if (array_key_exists('id', $_GET)){
    $query = $dbCo->prepare("UPDATE task SET is_completed = 1 WHERE task.id_task=:id");
    $isOk = $query->execute(
        ["id" => intval(strip_tags($_GET['id']))]
    );

}

header('Location: index.php');
exit;
?>