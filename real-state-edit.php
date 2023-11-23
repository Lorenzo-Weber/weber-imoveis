<?php

    include_once("templates/header.php");

    if(isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql = "SELECT imovel.id AS id, tipo, bairro, quartos, suites, banheiros, 
        vagas, area, rua, venda, aluguel, descricao FROM imovel 
        JOIN tipos ON imovel.idTipo = tipos.id 
        JOIN bairros ON imovel.idBairro = bairros.id
        WHERE imovel.id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $imovel = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    $tipos = buscaBanco("tipos");
    $bairros = buscaBanco("bairros");

    if(isset($_POST['tipo'])) {

        $imovel = $_POST;

        $sql = "UPDATE imovel SET aluguel = :aluguel, venda = :venda, quartos = :quartos, suites = :suites, vagas = :vagas, area = :area, banheiros = :banheiros, rua = :rua, descricao = :descricao WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $imovel['id']);
        $stmt->bindParam(':aluguel', $imovel['aluguel']);
        $stmt->bindParam(':venda', $imovel['venda']);
        $stmt->bindParam(':quartos', $imovel['quartos']);
        $stmt->bindParam(':suites', $imovel['suites']);
        $stmt->bindParam(':vagas', $imovel['vagas']);
        $stmt->bindParam(':area', $imovel['area']);
        $stmt->bindParam(':banheiros', $imovel['banheiros']);
        $stmt->bindParam(':rua', $imovel['rua']);
        $stmt->bindParam(':descricao', $imovel['descricao']);
        $stmt->execute();

        header("Location: adm.php");
    }
    
    $dados = [

        "aluguel" => "number",
        "venda" => "number",
        "quartos" => "number",
        "suites" => "number",
        "vagas" => "number",
        "area" => "number",
        "banheiros" => "number",
        "rua" => "text"
    ];
?>

<main>
    <form action="real-state-edit.php" method="POST" class="realstateAddContainer">

    <div class="realstateInfos">

        <div class="realstateGrid">
            <?php foreach($tipos as $tipo=>$t): ?>
                <div class="realstateInfo">
                    <?php if($imovel['tipo'] == $t['tipo']): ?>
                        <input type="radio" name="tipo" id="tipo" value="<?=$t['tipo']?>" checked>
                    <?php else: ?>
                        <input type="radio" name="tipo" id="tipo" value="<?=$t['tipo']?>">
                    <?php endif; ?>
                    <label for="tipo"><?= $t['tipo'] ?></label>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="realstateGrid">
            <?php foreach($bairros as $bairro=>$b): ?>
                <div class="realstateInfo">
                    <?php if($imovel['bairro'] == $b['bairro']): ?>
                        <input type="radio" name="bairro" id="bairro" value="<?=$b['bairro']?>" checked>
                    <?php else: ?>
                        <input type="radio" name="bairro" id="bairro" value="<?=$b['bairro']?>">
                    <?php endif; ?>
                    <label for="bairro"><?= $b['bairro'] ?></label>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <div class="realstateGridOptions">
        <?php foreach($dados as $dado=>$tipo): ?>
            <div class="realstateInfo">
                <label for="<?= $dado ?>"><?= $dado ?></label>
                <input type="<?= $tipo ?>" name="<?= $dado ?>" id="<?= $dado ?>" class="register-input" value="<?= $imovel[$dado] ?>">
            </div>
        <?php endforeach; ?>
    </div>

    <label for="descricao">Descricao</label>
    <?php if(empty($imovel['descricao'])): ?>
      <textarea name="descricao" id="descricao" cols="40" rows="5" class="register-desc"></textarea>
    <?php else: ?>
        <textarea name="descricao" id="descricao" cols="40" rows="5" class="register-desc"><?= $imovel['descricao'] ?></textarea>
    <?php endif; ?>
    
    <input type="hidden" name="id" value=<?= $id ?>>

    <input type="submit" value="Enviar" class="btn roundbtn ">
    </form>
</main>