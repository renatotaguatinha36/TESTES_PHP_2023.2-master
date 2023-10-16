<?php

$user = 'root';
$pass = '';

try {
    $conn = new PDO(
        'mysql:host=localhost;dbname=mydatabase_2023',
        $user,
        $pass
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    echo '<h3>Connected Successfully with Database</h3>';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage() . '<br/> ' . $e->getTraceAsString();
}