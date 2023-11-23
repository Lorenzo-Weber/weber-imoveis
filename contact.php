<?php
    include_once("templates/header.php");

    if(isset($_POST['name'])) {
        $name = strtolower($_POST['name']);
        $name = ucwords($name);
        $email = $_POST['email'];
        $message = $_POST['message'];

        $sql = "INSERT INTO emails (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->execute();
    }

    if(isset($_GET['id'])) {
        $mensagem = "Olá, gostaria de saber mais sobre o imóvel " . $_GET['id'];
    }
    else $mensagem = "";

    $sql = "SELECT * FROM emails";
    $stmt = $conn->prepare($sql);

    $stmt->execute();
    $emails = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
?>

<main class="contact-main">
    <div class="form">
        <h1 class="contact-grey">O que está acontecendo?</h1>
        <form action="contact.php" method = "POST">
            <div class="name">
                <label for="name" class="contact-grey">Nome: </label>
                <input type="text" placeholder="Ex: João da Silva" name="name" class="contact-input">
            </div>
            <div class="email">
                <label for="email" class="contact-grey">Email: </label>
                <input type="email" placeholder="Ex: joaodasilva@gmail.com" name="email" class="contact-input">
            </div>
            <div class="message">
                <br>
                <label for="message" class="contact-grey" >Motivo de contato: </label><br>
                <textarea name="message" id="message" class="contact-textarea" ><?= $mensagem ?></textarea>
            </div>
            <div class="submit">
                <button type="submit" class="btnred subbtn">Enviar</button>
            </div>
        </form>
    </div>
    <div class="form">
        <h1 class="contact-grey">Ou se preferir...</h1>
        <br>
        <div class="medias">
            <ul>
                <li><a href="https://www.instagram.com/weberlorenzo02/" target=”_blank”><i class="fa-brands fa-instagram"></i> WeberImoveis</a></li>
                <br>
                <li><a href="https://www.facebook.com/WeberCorretor" target=”_blank”><i class="fa-brands fa-facebook"></i> Weber Imoveis</a></li>
            </ul>
        </div>
        <br>
        <div class="links">
        <ul>
            <li><a href="https://www.google.com.br/maps/place/Weber+Im%C3%B3veis/@-29.6886874,-53.8152273,17z/data=!3m1!4b1!4m6!3m5!1s0x9503cb680667a123:0x3773e7a5e8a6793!8m2!3d-29.6886921!4d-53.8126524!16s%2Fg%2F11j1j6k6df" target=”_blank”><i class="fa-solid fa-location-dot"></i> Rua Duque de Caxias, 1235</a></li>
            <br>
            <li><i class="fa-sharp fa-solid fa-phone"></i> (55) 3222-1575</li>
        </ul>
    </div> 

    </div>
</main>

<?php
    include_once("templates/footer.php");
?>