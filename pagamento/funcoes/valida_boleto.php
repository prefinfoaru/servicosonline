
<?php
    function boleto2($codigoBarras){
        $codigoBarras = str_replace([' ', '-'], '', $codigoBarras);
        
        if (!preg_match("/^[0-9]{48}$/", $codigoBarras)) {
            return 0;
        }
        
        $blocos[0] = substr($codigoBarras, 0, 12);
        $blocos[1] = substr($codigoBarras, 12, 12);
        $blocos[2] = substr($codigoBarras, 24, 12);
        $blocos[3] = substr($codigoBarras, 36, 12);
        
        return $blocos;
    }
    function boleto($codigoBarras)
    {
       
        if($blocos=boleto2($codigoBarras)){ 
        }
        else{
            return false;
        }
            /**
             * Verifica se é o modulo 10.
             * Se o 3º digito for 6 ou 7 é modulo 10.
             */
            $isModulo10 = in_array($blocos[0][2], [6, 7]);

            $valido = 0;

            foreach ($blocos as $bloco) {
                if ($isModulo10 && modulo10($bloco)) {
                    $valido++;
                }
            }
            return $valido == 4;
    }
     function modulo10($bloco)
    {
        $tamanhoBloco = strlen($bloco) - 1;
        $digitoVerificador = $bloco[$tamanhoBloco];
        
        $codigo = substr($bloco, 0, $tamanhoBloco);
        $codigo = strrev($codigo);
        $codigo = str_split($codigo);
        
        $somatorio = 0;

        foreach ($codigo as $index => $value) {
            $soma = $value * ($index % 2 == 0 ? 2 : 1);
            /**
             * Quando a $soma tiver mais de 1 algarismo(ou seja, maior que 9),
             * soma-se os algarismos antes de somar com $somatorio
             */
            if ($soma > 9) {
                $somatorio += array_sum(str_split($soma));
            } else {
                $somatorio += $soma;
            }
        }
        /**
         * (ceil($somatorio / 10) * 10) pega a dezena imediatamente superior ao $somatorio
         * (dezena superior de 25 é 30, a de 43 é 50...).
         */
        $dezenaSuperiorSomatorioMenosSomatorio = (ceil($somatorio / 10) * 10) - $somatorio;
        return $dezenaSuperiorSomatorioMenosSomatorio == $digitoVerificador;
    }
    $boleto= addslashes($_POST['cod']);
    $blocos=boleto2($boleto);
    // //Separando o Boleto em Blocos
    // $blocos[0] = substr($boleto2, 0, 12);
    // $blocos[1] = substr($boleto2, 12, 12);
    // $blocos[2] = substr($boleto2, 24, 12);
    // $blocos[3] = substr($boleto2, 36, 12);
    //Tratativas para a data
    $hoje = date("Y-m-d");
    $ano = date("Y");
    //Pegando Informações Importantes
    $mes =substr($blocos[2], 1, 2); 
    $dia =substr($blocos[2], 3, 2); 
    $data=$ano.'-'.$mes.'-'.$dia; 
    $codMun=substr($blocos[1], 4, 4);
    //Pegando o Valor do boleto
    $calculoValor=substr($blocos[0],0,11)."".$blocos[1];
    $valorInteiro=intval(substr($calculoValor,5,8));
    $valorDecimal=substr($calculoValor,13,2);
    $valor=$valorInteiro.'.'.$valorDecimal;
    $valor;
  
 
    // date('d/m/Y', strtotime($data )) > $hoje &
    //  echo date('d/m/Y', strtotime($data )); 
     if(strtotime($data)>=strtotime($hoje) && $codMun == '0357')
     {
        $valida = 1;
     }else {
        $valida = 0;
     }
?>