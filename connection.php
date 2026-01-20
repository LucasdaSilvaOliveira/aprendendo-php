<?php
    $username = "root";
    $servername = "localhost";
    $password = "senha123";

    $conn = new PDO("mysql:host=$servername;dbname=praticandophp", $username, $password);
    $data = $conn->query("SELECT * FROM pessoas");
?>