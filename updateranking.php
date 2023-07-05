<?php
require 'includes/_database.php';
require 'includes/_functions.php';

// session_start();
// verifyToken();
// verifyOrigin();

$query2 = $dbCo->prepare('SELECT id_task, ranking, MAX(ranking) AS maxrank, MIN(ranking) AS minrank FROM task ORDER BY ranking');
$query2->execute();
$ranking = $query2->fetchAll();



$maxRank = $ranking[0]['maxrank'];
$minRank = $ranking[0]['minrank'];



$rankingPlus = $_GET['rank'] - 1;
$ranking = intval($_GET['rank']);
$rankingMinus = $_GET['rank'] + 1;

if ($ranking == $maxRank && $_GET['prior'] == 'down') {
    header('Location: index.php');
    exit;
} else if ($ranking == $minRank && $_GET['prior'] == 'up'){
    header('Location: index.php');
    exit;
}



if (array_key_exists('rank', $_GET) && $_GET['prior'] == 'down') {
    $query1 = $dbCo->prepare("UPDATE task SET ranking = ranking + 1 WHERE ranking=:rank");
    $isOk1 = $query1->execute([
        "rank" => intval(strip_tags($ranking))
    ]);

    $query2 = $dbCo->prepare("UPDATE task SET ranking = ranking - 1 WHERE ranking=:rankMinus AND NOT id_task=:id");
    $isOk2 = $query2->execute([
        "id" => intval(strip_tags($_GET['id'])),
        "rankMinus" => intval(strip_tags($rankingMinus))
    ]);

} else if (array_key_exists('rank', $_GET) && $_GET['prior'] == 'up'){
    $query3 = $dbCo->prepare("UPDATE task SET ranking = ranking - 1 WHERE ranking=:rank");
    $isOk3 = $query3->execute([
        "rank" => intval(strip_tags($ranking))
    ]);

    $query4 = $dbCo->prepare("UPDATE task SET ranking = ranking + 1 WHERE ranking=:rankPlus AND NOT id_task=:id");
    $isOk4 = $query4->execute([
        "id" => intval(strip_tags($_GET['id'])),
        "rankPlus" => intval(strip_tags($rankingPlus))
    ]);

}
header('Location: index.php');
exit;
?>
