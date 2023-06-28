<?php
require 'includes/_database.php';

if (array_key_exists('id', $_GET)){
    $query = $dbCo->prepare("UPDATE task SET is_completed = 1 WHERE task.id_task=:id");
    $isOk = $query->execute(
        ["id" => strip_tags(intval($_GET['id']))]
    );
    if($_GET['is_completed'] == 1){
        $query = $dbCo->prepare("UPDATE task SET is_completed = 0 WHERE task.id_task=:id");
        $isOk = $query->execute(
            ["id" => strip_tags(intval($_GET['id']))]
        );
    };
}
header('Location: index.php');
exit;
?>

