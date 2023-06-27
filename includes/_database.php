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