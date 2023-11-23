<?php

    function buscaBanco ($string) {

        global $conn;

        $sql = "SELECT * FROM $string";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    function insereBanco ($imovel) {

        global $conn;

        zera($imovel);
    
        $tipos = buscaBanco("tipos");
        $bairros = buscaBanco("bairros");
        
        do{
            $cod = rand(30000, 39999);
            $sql = "SELECT * FROM imovel WHERE id = :cod";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':cod', $cod);
            $stmt->execute();
            $id = $stmt->fetch(PDO::FETCH_ASSOC);
        } while(!empty($id));
        
        $imovel['id'] = $cod;

        $sql = "SELECT id FROM tipos WHERE tipo = :tipo";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':tipo', $imovel['tipo']);
        $stmt->execute();
        $tipo = $stmt->fetch(PDO::FETCH_ASSOC);
        $imovel['tipo'] = $tipo['id'];

        $sql = "SELECT id FROM bairros WHERE bairro = :bairro";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':bairro', $imovel['bairro']);
        $stmt->execute();
        $bairro = $stmt->fetch(PDO::FETCH_ASSOC);
        $imovel['bairro'] = $bairro['id'];

        $sql = "INSERT INTO imovel (id, idTipo, idBairro, quartos, suites, banheiros, vagas, area, rua, venda, aluguel, descricao) VALUES (:id, :idTipo, :idBairro, :quartos, :suites, :banheiros, :vagas, :areaPriv, :rua, :venda, :aluguel, :descricao)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $imovel['id']);
        $stmt->bindParam(':idTipo', $imovel['tipo']);
        $stmt->bindParam(':idBairro', $imovel['bairro']);
        $stmt->bindParam(':quartos', $imovel['quartos']);
        $stmt->bindParam(':suites', $imovel['suites']);
        $stmt->bindParam(':banheiros', $imovel['banheiros']);
        $stmt->bindParam(':vagas', $imovel['garagens']);
        $stmt->bindParam(':areaPriv', $imovel['area']);
        $stmt->bindParam(':rua', $imovel['rua']);
        $stmt->bindParam(':venda', $imovel['venda']);
        $stmt->bindParam(':aluguel', $imovel['aluguel']);
        $stmt->bindParam(':descricao', $imovel['descricao']);
        $stmt->execute();
    }
?>