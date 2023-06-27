<?php require 'includes/_head.php';
require 'includes/_database.php';
require 'includes/_functions.php';
$query = $dbCo->prepare('SELECT * FROM task');
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
                <!-- <ul> -->
                <!-- <li class="list-item"><img src="img/checkbox.png" alt="checkbox">This is a task</li> -->
                <!-- </ul> -->
            </article>
        </section>
    </main>
    <script src="js/script.js"></script>
</body>

</html>