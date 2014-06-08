<?php

echo '<h1>Running a little test...</h1>';

// Read the config and set up the database connection
$config = require 'config/local.config.php';
$dbconfig = $config['db_master'];
$pdo = new PDO('mysql:host=' . $dbconfig['host'] . ';dbname=' . $dbconfig['dbname'], $dbconfig['user'], $dbconfig['pass']); 

// Make sure we have access to the database for this application 
$result = $pdo->query('SHOW DATABASES LIKE "' . $dbconfig['dbname'] . '"');
if (1 === $result->rowCount()) {
    echo '<div style="color:darkgreen; font-size: xx-large;">OK!</div> I can see the application database.';
} else {
    echo '<div style="color:red; font-size: xx-large;">Whoops!</div> I can\'t see the application database.';
}
