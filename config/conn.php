<?php
    $host = 'localhost'; // Nome do host
    $dbname = 'weber'; // Nome do banco de dados
    $username = 'root'; // Nome de usuário do banco de dados
    $password = ''; // Senha do banco de dados

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
?>