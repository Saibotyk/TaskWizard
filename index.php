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
        <img src="img/plus-violet.png" alt="plus dans une case violette">
    </header>
    <main>
        <section>
            <article class="container">
                <h3 class="container-subtitle">Aujourd'hui</h3>
                <?=getList($tasks)?>
            </article>
        </section>
    </main>
    <script src="js/script.js"></script>
</body>

</html>