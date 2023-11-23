<?php
    include_once('templates/header.php');
    if(isset($_GET['tipo'])) {

        $tipo = $_GET['tipo'];
    
        $sql = "SELECT imovel.id AS id, tipo, bairro, quartos, suites, banheiros, 
        vagas, area, rua, venda, aluguel, descricao FROM imovel 
        JOIN tipos ON imovel.idTipo = tipos.id 
        JOIN bairros ON imovel.idBairro = bairros.id
        WHERE imovel." . $tipo . " > 0";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $imoveis = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
        header("Location: index.php");
    }

    format($imoveis);

?>

<main>
    <div class="grid-container">
        <?php foreach($imoveis as $im): ?>
            <?php criaCard($im); ?>
        <?php endforeach; ?>
    </div>
</main>

<?php
    include_once('templates/footer.php');
?>