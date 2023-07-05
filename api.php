<?php
header('content-type:application/json');
require "includes/_database.php";
$data = json_decode(file_get_contents('php://input'), true);

if ($data['action'] === 'move') {
    $query2 = $dbCo->prepare('SELECT id_task, ranking, MAX(ranking) AS maxrank, MIN(ranking) AS minrank FROM task ORDER BY ranking');
    $query2->execute();
    $ranking = $query2->fetchAll();
    //ca me brise les noisettes !

    $maxRank = $ranking[0]['maxrank'];
    $minRank = $ranking[0]['minrank'];



    $rankingPlus = $data['ranking'] - 1;
    $ranking = intval($data['ranking']);
    $rankingMinus = $data['ranking'] + 1;
    
    if (($ranking == $maxRank && $data['prior'] == 'down') || ($ranking == $minRank && $data['prior'] == 'up')) {
        echo json_encode([
            "result" => false
        ]);
        exit;
        
    }



    if (array_key_exists('ranking', $data) && $data['prior'] == 'down') {
        $query1 = $dbCo->prepare("UPDATE task SET ranking = ranking + 1 WHERE ranking=:rank");
        $isOk = $query1->execute([
            "rank" => intval(strip_tags($ranking))
        ]);

        $query2 = $dbCo->prepare("UPDATE task SET ranking = ranking - 1 WHERE ranking=:rankMinus AND NOT id_task=:id");
        $isOk = $query2->execute([
            "id" => intval(strip_tags($data['id'])),
            "rankMinus" => intval(strip_tags($rankingMinus))
        ]);

        echo json_encode([
            "result" => $isOk,
            "id" => $data['id'],
            "prior" => $data['prior']
        ]);

        exit;
    } else if (array_key_exists('ranking', $data) && $data['prior'] == 'up') {
        $query3 = $dbCo->prepare("UPDATE task SET ranking = ranking - 1 WHERE ranking=:rank");
        $isOk = $query3->execute([
            "rank" => intval(strip_tags($ranking))
        ]);

        $query4 = $dbCo->prepare("UPDATE task SET ranking = ranking + 1 WHERE ranking=:rankPlus AND NOT id_task=:id");
        $isOk = $query4->execute([
            "id" => intval(strip_tags($data['id'])),
            "rankPlus" => intval(strip_tags($rankingPlus))
        ]);

        echo json_encode([
            "result" => $isOk,
            "id" => $data['id'],
            "prior" => $data['prior']
        ]);

        exit;
    }
}
// test async


if ($data['action'] === 'rename' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $id = intval(strip_tags($data['idTask']));
    $name = trim(strip_tags($data['taskName']));
    $query = $dbCo->prepare("UPDATE `task` SET `title` = :articleName WHERE `id_task` = :idArticle;");
    $isOk = $query->execute([
        'idArticle' => $id,
        'articleName' => $name
    ]);
    echo json_encode([
        'result' => $isOk && $query->rowCount() > 0,
        'idArticle' => $id,
        'articleName' => $name
    ]);
    exit;
}
