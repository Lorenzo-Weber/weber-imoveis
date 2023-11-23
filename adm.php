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

        if(isset($imovel['id'])) {
            $imovel['venda'] = $imovel['venda'] == null ? null : number_format($imovel['venda'], 2, ',', '.');
            $imovel['aluguel'] = $imovel['aluguel'] == null ? null : number_format($imovel['aluguel'], 2, ',', '.');
        }

    }

    if(isset($_POST['id'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM imovel WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: adm.php");
    }
?>

<main>
    <div class="admContainer">
        <form action="adm.php" method="GET" class="searchRS">
            <input type="number" name="id" placeholder="ID: 31621" class="searchBar">
            <input type="submit" value="Buscar" class="btn ">

        </form>
        <?php if(isset($imovel['id'])): ?>

            <div class="admRealstateShow">

                <?= criaCard($imovel) ?>

                <div class="actions">
                    <form action="adm.php" method="POST">
                        <input type="hidden" name="id" value="<?= $imovel['id'] ?>" >
                        <input type="submit" value="Excluir" class="btn btnred">
                    </form>

                    <a href="real-state-edit.php?id=<?= $imovel['id'] ?>" class="editBtn">Editar</a>

                </div>                
            </div>

        <?php else: ?>
            <div class="realstateAdd">
                <p>Adicionar novo imóvel</p>
                <a href="real-state-register.php" class="btn">Adicionar</a>
            </div>
        <?php endif;?>
    </div>
</main>
