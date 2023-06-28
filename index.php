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
        <?= createTask($tasks) ?>
        <article class="article">
            <form action="includes/_add.php" method="get" class="article__form">
                <input class="article__input" type="text" name="task" id="add_task" placeholder="Tâche">
                <textarea class="article__textarea" type="text" name="description" id="add_description" rows="3" cols="20" placeholder="Décrivez votre tâche"></textarea>
            </form>
        </article>
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