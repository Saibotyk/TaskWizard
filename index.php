<?php require 'includes/_head.php';
require 'includes/_database.php';
require 'includes/_functions.php';
$query = $dbCo->prepare('SELECT title, description, date_creation, is_completed, ranking FROM task WHERE is_completed = 0 ORDER BY date_creation');
$query->execute();
$tasks = $query->fetchAll();
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
            <button class="btn">Enregistrer</button>
        </form>
    </article>
    <?php
    $popupMsg = [
        'ok' => '<article class="popup"><p class="popup-text">Vôtre tâche a bien été ajoutée !</p></article>',
        'ko' => '<article class="popup"><p class="popup-text">Vôtre tâche a échouée !</p></article>'
    ];
    // echo getPopupText($popupMsg);
    ?>
    <main>
        <section>
            <article class="container">
                <h3 class="container-subtitle">Aujourd'hui</h3>
                <?= getList($tasks) ?>
            </article>
        </section>
    </main>
    <script src="js/script.js"></script>
</body>

</html>