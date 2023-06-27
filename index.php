<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>TaskWizard</title>
</head>
<body>
   <?php
   try {
    $dbCo = new PDO('mysql:host=localhost;dbname=taskwizard;charset=utf8',
    'root');
    $dbCo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
    PDO::FETCH_ASSOC);
   }

   catch (Exception $e) {
    die('Unable to connect to the database.
    '.$e->getMessage());
    }
    
   ?> 
    <script src="js/script.js"></script>
</body>
</html>