<?php
require 'includes/_database.php';
$rankingPlus = $_GET['rank'] + 1;
$ranking = intval($_GET['rank']);
$rankingMinus = $_GET['rank'] - 1;


if (array_key_exists('rank', $_GET) && $_GET['prior'] == 'down') {
    $query1 = $dbCo->prepare("UPDATE task SET ranking = ranking - 1 WHERE ranking=:rank");
    $isOk1 = $query1->execute([
        "rank" => intval(strip_tags($ranking))
    ]);

    $query2 = $dbCo->prepare("UPDATE task SET ranking = ranking + 1 WHERE ranking=:rankMinus AND NOT id_task=:id");
    $isOk2 = $query2->execute([
        "id" => intval(strip_tags($_GET['id'])),
        "rankMinus" => intval(strip_tags($rankingMinus))
    ]);

} else if (array_key_exists('rank', $_GET) && $_GET['prior'] == 'up'){
    $query3 = $dbCo->prepare("UPDATE task SET ranking = ranking + 1 WHERE ranking=:rank");
    $isOk3 = $query3->execute([
        "rank" => intval(strip_tags($ranking))
    ]);

    $query4 = $dbCo->prepare("UPDATE task SET ranking = ranking - 1 WHERE ranking=:rankPlus AND NOT id_task=:id");
    $isOk4 = $query4->execute([
        "id" => intval(strip_tags($_GET['id'])),
        "rankPlus" => intval(strip_tags($rankingPlus))
    ]);

} else if (array_key_exists('rank', $_GET) && $_GET['prior'] == 'down'){
    
}

header('Location: index.php');
exit;
?>
