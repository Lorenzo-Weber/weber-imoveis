<?php
    include_once("config/url.php");
    include_once("config/conn.php");
    include_once("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial - Weber Imóveis</title>

    <link rel="stylesheet" href="<?=$BASE_URL?>css/navbar.css">
    <link rel="stylesheet" href="<?=$BASE_URL?>css/utilities.css">
    <link rel="stylesheet" href="<?=$BASE_URL?>css/main.css">
    <link rel="stylesheet" href="<?=$BASE_URL?>css/card.css">
    <link rel="stylesheet" href="<?=$BASE_URL?>css/footer.css">
    <link rel="stylesheet" href="<?=$BASE_URL?>css/contato.css">
    <link rel="stylesheet" href="<?=$BASE_URL?>css/grid.css">
    <link rel="stylesheet" href="<?=$BASE_URL?>css/realstate.css">
    <link rel="stylesheet" href="<?=$BASE_URL?>css/adm.css">
    <link rel="stylesheet" href="<?=$BASE_URL?>css/register.css">
    <link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">

    <link rel="shortcut icon" href="<?=$BASE_URL?>img/favicon.ico" type="image/x-icon">
    
    <script src="https://kit.fontawesome.com/d54c4e3858.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="navbar" id="navbar">
        <div class="navcontent">
            <a href="index.php" class = "logo size15"> <span class="red size15">Weber</span> Imóveis</a>
            <ul>
                <li><a href="search.php?tipo=venda">Venda</a></li>
                <li><a href="search.php?tipo=aluguel">Aluguel</a></li>
                <li><a href="contact.php">Contato</a></li>
            </ul>
        </div>
    </div>