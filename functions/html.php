<?php

    function criaCard($card) {
        echo '
        <form action="real-state.php" method="GET">
        <input type="hidden" name="id" value="' . $card['id'] . '">
    
            <div class="card">
                <div class="crow1">
                    <div class="img">
                        <a href=""><i class="fa-solid fa-chevron-left"></i></a>
                        <a href=""><i class="fa-solid fa-chevron-right"></i></a>
                    </div>
                </div>
                <label for="enviar ' . $card['id'] . '" style="cursor:pointer">
                    <div class="crow2">
                        <div class="title">
                            <h3><span class="bold gray">' . $card['tipo'] . '</span></h3>
                            <h4><i class="fa-solid fa-location-dot"></i> ' . $card['bairro'] . '</h4>
                        </div>
                        <div class="info">
                            <div class="area icon">
                                <i class="fa-solid fa-ruler-combined bold gray"></i>
                                <h4>' . $card['area'] . ' m²</h4>
                            </div>
                            <div class="bedroom icon">
                                <i class="fa-solid fa-bed bold gray"></i>                        
                                <h4>' . $card['quartos'] . '</h4>
                            </div>
                            <div class "bathroom icon">
                                <i class="fa-solid fa-bath bold gray"></i>
                                <h4>' . $card['banheiros'] . '</h4>
                            </div>
                            <div class="garage icon">
                                <i class="fa-solid fa-car-side bold gray"></i>
                                <h4>' . $card['vagas'] . '</h4>
                            </div>
                        </div>
                        <div class="value">
                            <div class="contract">';
        
        if (!empty($card['venda'])) {
            echo '<h3 class="price"><span class="bold red">R$ ' . $card['venda'] . '</span></h3>';
        }
        
        if (!empty($card['aluguel'])) {
            echo '<h3 class="rental"><span class="bold red">R$ ' . $card['aluguel'] . ' /mês</span></h3>';
        }
        
        echo '
                            </div>
                            <h5>cod.: ' . $card['id'] . '</h5>
                        </div>
                    </div>
                </label>
                <input type="submit" value="" id="enviar ' . $card['id'] . '" class="hidden">
            </div>
        </form>
        ';
    }

?>