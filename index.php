<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>TaskWizard</title>
</head>

<body>
    <main>
        <?php
        require 'includes/_database.php';
        require 'includes/_functions.php';
        $query = $dbCo->prepare('SELECT * FROM task');
        $query->execute();
        $tasks = $query->fetchAll();
        echo getList($tasks);
        ?>
    </main>
    <script src="js/script.js"></script>
</body>

</html>