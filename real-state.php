<?php
    include_once("templates/header.php");
    
    if(isset($_GET["id"])) {
        $sql = "SELECT imovel.id AS id, tipo, bairro, quartos, suites, banheiros, 
        vagas, area, rua, venda, aluguel, descricao FROM imovel 
        JOIN tipos ON imovel.idTipo = tipos.id 
        JOIN bairros ON imovel.idBairro = bairros.id
        WHERE imovel.id = :id";
        $stmt = $conn->prepare($sql);  
        $stmt->bindParam(":id", $_GET["id"]);
        $stmt->execute();
        $imovel = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: index.php");
    }

    if($imovel['venda'] != null) $imovel['venda'] = number_format($imovel['venda'], 2, ",", ".");
    if($imovel['aluguel'] != null) $imovel['aluguel'] = number_format($imovel['aluguel'], 2, ",", ".");    
?>

<main class="realstate-container">
    <div class="realstate-title">
        <h1 class="size12"><span class="size12"><?= $imovel['tipo'] ?> em <?= $imovel['bairro'] ?></span> - <span class="red size12">Código: <span class="red size12"><?= $imovel['id'] ?></span></span></h1>

        <div class="realstate-title-prices">
            <?php if($imovel['venda'] > 0): ?>
                <p><span class="red size12">R$ <?= $imovel['venda'] ?></span></p>
            <?php endif; ?>
            <?php if(!empty($imovel['aluguel'])): ?>
                <p><span class="red size12">R$ <?= $imovel['aluguel'] ?>/mês</span></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="realstate-img-container">
        <img src="img/1265937.jpg" alt="" class="realstate-img">
    </div>
    
    <div class="realstate-info">
        <p><span class="bold">Detalhes</span></p>
        <div class="realstate-info-icons">
            <div class="area realstate-icon">
                <i class="fa-solid fa-ruler-combined bold gray"></i>
                <h4><?= $imovel['area'] ?> m²</h4>
            </div>
            <div class="bedroom realstate-icon">
                <i class="fa-solid fa-bed bold gray"></i>
                <h4> <?= $imovel['quartos'] ?> </h4>
            </div>
            <div class="bathroom realstate-icon">
                <i class="fa-solid fa-bath bold gray"></i>
                <h4> <?= $imovel['banheiros'] ?> </h4>
            </div>
            <div class="garage realstate-icon">
                <i class="fa-solid fa-car-side bold gray"></i>
                <h4> <?= $imovel['vagas'] ?> </h4>
            </div>
        </div>
    </div>
    <div class="realstate-desc">
        <?php if(!empty($imovel['descricao'])): ?>
            <p><?= $imovel['descricao'] ?></p>
            <p>Rua: <?= $imovel['rua'] ?></p>
        <?php else: ?>
            <p>Agende uma visita conosco!</p>
        <?php endif; ?>
        <form action="contact.php" method="GET">
            <input type="hidden" name="id" value="<?= $imovel['id'] ?>">
            <input type="submit" value="Entre em contato" class="btn">
        </form>
    </div>
</main>

<?php include_once("templates/footer.php"); ?>
