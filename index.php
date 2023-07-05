<?php 
require 'includes/_head.php';
require 'vendor/autoload.php';
require 'includes/_database.php';
require 'includes/_functions.php';

$query = $dbCo->prepare('SELECT id_task, title, date_creation, is_completed, ranking  FROM task WHERE is_completed = 0 ORDER BY ranking');
$query->execute();
$tasks = $query->fetchAll();

$query2 = $dbCo->prepare('SELECT id_task, ranking, MAX(ranking) AS maxrank, MIN(ranking) AS minrank FROM task WHERE is_completed = 0 ORDER BY ranking');
$query2->execute();
$ranking = $query2->fetchAll();

$maxRank = $ranking[0]['maxrank'];

// session_start();git 
$_SESSION['myToken'] = md5(uniqid(mt_rand(), true));

?>

<body>
    <header class="header">
        <h2>Mes tâches</h2>
        <img src="img/plus-violet.png" class="add-js" alt="plus dans une case violette">
    </header>

    <article class="article task-js _display-none">
        <form action="add.php" method="post" class="article-form">
            <input class="article-input" type="text" name="task" id="add_task" placeholder="Tâche" required>
            <input type="hidden" name="token" value="<?= $_SESSION['myToken'] ?>">
            <button class="btn">Ajouter</button>
        </form>
    </article>
    <article class="article modify-js _display-none">
        <form action="modify.php" method="post" class="article-form">
            <input class="article-input input-ttl-js" type="text" name="title" id="modify_task" placeholder="Tâche" required value="">'
            <input type="hidden" name="id" class="input-js" value="">
            <input type="hidden" name="token" value="<?= $_SESSION['myToken'] ?>">
            <button class="btn">Enregistrer</button>
        </form>
    </article>
    <?php
    echo getPopupText($popupMsg);
    ?>
    <main>
        <section>
            <article class="container">
                <h3 class="container-subtitle">Aujourd'hui</h3>
                <?= getList($tasks, $maxRank) ?>
            </article>
        </section>
        <section>
            <article class="container">
                <h3 class="container-subtitle">Terminées</h3>
                <?php
                $query = $dbCo->prepare('SELECT id_task, title, is_completed, ranking FROM task WHERE is_completed = 1;');
                $query->execute();
                $tasks = $query->fetchAll();
                echo getList($tasks, $maxRank);
                ?>
            </article>
        </section>
        <a href="tempupdatedbrank.php?" class="btn">Restore</a>
    </main>
    <script src="js/script.js"></script>
</body>

</html>