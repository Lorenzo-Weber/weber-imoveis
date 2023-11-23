<?php
    include_once("templates/header.php");

    $sql = "SELECT imovel.id AS id, tipo, bairro, quartos, suites, banheiros, 
    vagas, area, rua, venda, aluguel, descricao FROM imovel 
    JOIN tipos ON imovel.idTipo = tipos.id 
    JOIN bairros ON imovel.idBairro = bairros.id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $imoveis = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $venda = [];
    $aluguel = [];

    format($imoveis);
    add_arr($imoveis, $venda, $aluguel);
?>

<main>
    <div class="container">
        <div class="start">
            <a href="#navbar" class="top btnred">
                <p>Voltar ao</p>
                <p>inicio</p>
            </a>
        </div>
        <div class="searchContainer">
            <form action="search.php" method="GET">
                <div class="row row1">
                    <div class="type">
                        <input type="radio" id="aluguel" name="tipo" value="aluguel" class="hidden" checked>
                        <label for="aluguel" class="search" id="aluguel">Alugar</label>
                        <input type="radio" id="venda" name="tipo" value="venda" class="hidden">
                        <label for="venda" class="search" id="venda">Comprar</label>
                    </div>
                    <div class="options">
                        <div id="tipo" class="round boxm">
                            <p class="lg size9">Tipo</p>
                            <i class="fa-solid fa-caret-down"></i>     
                        </div>
                        <div id="bairro" class="round boxm">
                            <p class="lg size9">Bairro</p>
                            <i class="fa-solid fa-caret-down"></i>                
                        </div>
                        <div id="Quarto" class="round boxm">
                            <p class="lg size9">Quartos</p>
                            <i class="fa-solid fa-caret-down"></i>                
                        </div>
                        <div id="Garagem" class="round boxm">
                            <p class="lg size9">Garagens</p>
                            <i class="fa-solid fa-caret-down"></i>                
                        </div>
                    </div>
                </div>
                <div class="row row2">
                <input type="submit" value="Pesquisar" class="btn">
                </div>
            </form>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d27728.62253011862!2d-53.802928!3d-29.6882998!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1682500526241!5m2!1spt-BR!2sbr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="fast" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="real-state" id="realstate">
            <div class="venda section">
                <h2><span class="red large">VENDA</span></h2>
                <div class="cards">
                    <?php foreach($venda as $ve): ?>
                        <?php criaCard($ve) ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="aluguel section">
                <h2><span class="red large">ALUGUEL</span></h2>
                <div class="cards">
                    <?php foreach($aluguel as $al): ?>
                        <?php criaCard($al) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
    include_once("templates/footer.php")
?>