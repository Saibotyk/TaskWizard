<?php
require "includes/_database.php";

$maxRankingQuery = $dbCo->prepare("SELECT ranking, MAX(ranking) AS maxRanking FROM task");
$maxRankingQuery->execute();
$maxRanking = $maxRankingQuery->fetch(PDO::FETCH_ASSOC)['maxRanking'];


$query = $dbCo->prepare("INSERT INTO task (title, ranking) VALUES (:title, :ranking)");
$isOK = $query->execute([
    'title' => strip_tags($_POST['task']),
    'ranking' => $maxRanking + 1

]);

header('location: index.php?msg='.($isOK ? 'ok' : 'ko'));
exit;
?>
