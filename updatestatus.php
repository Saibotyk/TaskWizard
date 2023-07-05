<?php
require 'includes/_database.php';
require 'includes/_functions.php';

session_start();
// verifyToken();
// verifyOrigin();


$query2 = $dbCo->prepare('SELECT id_task, ranking, MAX(ranking) AS maxrank FROM task');
$query2->execute();
$ranking = $query2->fetch(PDO::FETCH_ASSOC);

$maxRank = $ranking['maxrank'];

if (isset($_GET['id']) && isset($_GET['is_completed']) && $_GET['is_completed'] == 0) {
    $query = $dbCo->prepare("UPDATE task SET is_completed = 1, ranking = 1 WHERE task.id_task = :id");
    $isOk = $query->execute(["id" => intval($_GET['id'])]);

    $query3 = $dbCo->prepare("UPDATE task SET ranking = ranking - 1 WHERE ranking > :ranking");
    $isOk = $query3->execute(["ranking" => intval($_GET['ranking'])]);
}

if (isset($_GET['id']) && isset($_GET['is_completed']) && $_GET['is_completed'] == 1) {
    $query = $dbCo->prepare("UPDATE task SET is_completed = 0, ranking = :maxRank + 1 WHERE task.id_task = :id");
    $isOk = $query->execute([
        "id" => intval($_GET['id']),
        "maxRank" => $maxRank
    ]);
}

header('Location: index.php');
exit;

?>
