<?php
    include_once("templates/header.php");

    $tipos = buscaBanco("tipos");
    $bairros = buscaBanco("bairros");

    if(isset($_POST['tipo'])) {     
        
        $imovel = $_POST;
        insereBanco($imovel);
    } 
    
    $dados = [

        "Aluguel" => "number",
        "Venda" => "number",
        "Quartos" => "number",
        "Suites" => "number",
        "Garagens" => "number",
        "Área" => "number",
        "Banheiros" => "number",
        "Rua" => "text"
    ];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Imóvel</title>
    </head>
    <body>
        <br><br><br>
        <form action="real-state-register.php" method="POST" class="realstateAddContainer">

            <div class="realstateInfos">

                <div class="realstateGrid">
                    <?php foreach($tipos as $tipo=>$t): ?>
                        <div class="realstateInfo">
                            <input type="radio" name="tipo" id="tipo" value="<?=$t['tipo']?>">
                            <label for="tipo"><?= $t['tipo'] ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="realstateGrid">
                    <?php foreach($bairros as $bairro=>$b): ?>
                        <div class="realstateInfo">
                            <input type="radio" name="bairro" id="bairro" value="<?=$b['bairro']?>">
                            <label for="bairro"><?= $b['bairro'] ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

            <div class="realstateGridOptions">
                <?php foreach($dados as $dado=>$tipo): ?>
                    <div class="realstateInfo">
                        <label for="<?= $dado ?>"><?= $dado ?></label>
                        <input type="<?= $tipo ?>" name="<?= $dado ?>" id="<?= $dado ?>" class="register-input">
                    </div>
                <?php endforeach; ?>
            </div>
            <label for="descricao">Descricao</label>
            <textarea name="descricao" id="descricao" cols="40" rows="5" class="register-desc"></textarea>
            <input type="hidden" name="id" value='0'>

            <input type="submit" value="Enviar" class="btn roundbtn ">
        </form>
    </body>
</html>


<?php
    include_once("templates/footer.php");
?>