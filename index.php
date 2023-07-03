<?php require 'includes/_head.php';
require 'vendor/autoload.php';
require 'includes/_database.php';
require 'includes/_functions.php';



$query = $dbCo->prepare('SELECT id_task, title, date_creation, is_completed, ranking  FROM task WHERE is_completed = 0 ORDER BY ranking DESC');
$query->execute();
$tasks = $query->fetchAll();

$query2 = $dbCo->prepare('SELECT id_task, ranking, MAX(ranking) AS maxrank, MIN(ranking) AS minrank FROM task WHERE is_completed = 0 ORDER BY ranking DESC');
$query2->execute();
$ranking = $query->fetchAll();
?>

<body>
    <header class="header">
        <h2>Mes tâches</h2>
        <img src="img/plus-violet.png" class="add-js" alt="plus dans une case violette">
    </header>
       
    <article class="article task-js _display-none">
        <form action="add.php" method="post" class="article-form">
            <input class="article-input" type="text" name="task" id="add_task" placeholder="Tâche" required>
            <textarea class="article-textarea" type="text" name="description" id="add_description" rows="3" cols="20" placeholder="Décrivez votre tâche" required></textarea>
            <button class="btn">Ajouter</button>
        </form>
    </article>
    <article class="article modify-js _display-none">
        <?=getForm($tasks)?>
    </article>
    <?php
    echo getPopupText($popupMsg);
    ?>
    <main>
        <section>
            <article class="container">
                <h3 class="container-subtitle">Aujourd'hui</h3>
                <?= getList($tasks) ?>
            </article>
        </section>
        <section>
            <article class="container">
                <h3 class="container-subtitle">Terminées</h3>
                <?php
                $query = $dbCo->prepare('SELECT id_task, title, is_completed FROM task WHERE is_completed = 1;');
                $query->execute();
                $tasks = $query->fetchAll();
                echo getList($tasks);
                ?>
            </article>
        </section>
        <a href="tempupdatedbrank.php?" class="btn">Restore</a>
    </main>
    <script src="js/script.js"></script>
</body>

</html>