<?php

    function format(&$arr) {
        for($i = 0; $i < count($arr); $i++) {
            $arr[$i]['venda'] = $arr[$i]['venda'] == null ? null : number_format($arr[$i]['venda'], 2, ',', '.');
            $arr[$i]['aluguel'] = $arr[$i]['aluguel'] == null ? null : number_format($arr[$i]['aluguel'], 2, ',', '.');
        }
    }

    function add_arr(&$arr, &$venda, &$aluguel) {
        for($i = 0; $i < count($arr); $i++) {
            if($arr[$i]['venda'] != null && count($venda) < 4) {
                $venda[] = $arr[$i];
            }
            if($arr[$i]['aluguel'] != null && count($aluguel) < 4) {
                if(!in_array($arr[$i], $venda))
                $aluguel[] = $arr[$i];
            }
        }
    }

    function zera(&$arr) {
        foreach($arr as $key=>$value) {
            if(empty($value)) {
                $arr[$key] = 0;
            } 
        }  
    }