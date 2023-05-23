<?php

  include "conexao.php"; 
  
  header("Content-type: text/html; charset=utf-8");
  $data_agenda=addslashes($_GET["data"]);
  $unidade_agenda=addslashes($_GET["unidade"]);
  // $unidade_agenda =utf8_encode($unidade_agenda);
    
  $data_agenda=implode('-', array_reverse(explode('/', $data_agenda)));
    //SE INSERIR UNIDADE  DÁ PARA FAZER OUTROS HORARIOS PRA OUTRO ATENDIMENTO
    $sh="SELECT horario_agenda FROM agendamentos WHERE data_agenda='$data_agenda' AND unidade_agenda='$unidade_agenda' AND status_agenda='0'";
    $qh=mysqli_query($conn, $sh); 
    //$array_h = array("09:00", "09:05","09:10","09:15","09:20","09:25","09:30","09:35","09:40","09:45","09:55","10:00","10:05","10:10","10:15","10:20","10:25","10:30","10:35","10:40","10:50","10:55","11:00","11:05","11:10","11:15","11:20","11:25","11:30","11:35","11:40","11:45","11:50","11:55","12:00","12:05","12:05","12:10","12:15","12:20","12:25","12:30","12:35","12:40","12:45","12:50","12:55");
    if($unidade_agenda =='Cadastro')
    {
      $array_h = array("08:30","09:00","09:30","10:00","10:30","11:00","11:30","13:00","13:30","14:00","14:30","15:00","15:30","16:30");
    }
    
    else if($unidade_agenda =='Dívida Ativa')
    {
      $array_h = array("08:30","09:00","09:30","10:00","10:30","11:00","11:30","13:00","13:30","14:00","14:30","15:00","15:30","16:30");
    }
    else if($unidade_agenda =='Dívisão de Rendas')
    {
      $array_h = array("08:30","09:00","09:30","10:00","10:30","11:00","11:30","13:00","13:30","14:00","14:30","15:00","15:30","16:30");
    }
    else if($unidade_agenda =='Habitação')
    {
      $array_h = array("08:30","09:00","09:30","10:00","10:30","11:00","11:30","13:00","13:30","14:00","14:30","15:00","15:30","16:30");
    }
    else if($unidade_agenda =='Obras')
    {
      $array_h = array("08:30","09:00","09:30","10:00","10:30","11:00","11:30","13:00","13:30","14:00","14:30","15:00","15:30","16:30");
    }
    else if($unidade_agenda =='Ouvidoria')
    {
      $array_h = array("08:30","09:00","09:30","10:00","10:30","11:00","11:30","13:00","13:30","14:00","14:30","15:00","15:30","16:30");
    }
    
    
                             
    while ($l=mysqli_fetch_array($qh)) {
      $hora=$l["horario_agenda"]; //seleciona os horários agendados, vindo do banco de dados
      //tentando adicionar mais agendamentos para uma mesmo horario;
      /*
      $conta=0;
      if($hora == $achar_posicao = (array_search("$hora", $array_h)))
      {
        
        $conta+=1;
      }
      if($conta >= 2)
      {
        $achar_posicao = array_search("$hora", $array_h);  //procura em qual posição do $array_h está o horario vindo do banco. 
        array_splice($array_h, $achar_posicao , 1); //quando achar a posição com determinada hr, exclui do $array_h para evitar varios agendamentos com o mesmo horario no mesmo dia
      }
     
      */
      $achar_posicao = array_search("$hora", $array_h);  //procura em qual posição do $array_h está o horario vindo do banco. 
      array_splice($array_h, $achar_posicao , 1); //quando achar a posição com determinada hr, exclui do $array_h para evitar varios agendamentos com o mesmo horario no mesmo dia
    }
    $h2=0;
    if($h2 >= count($array_h))
    {
      echo"<option value=''>Não há mais vagas disponiveis nesta data</option>";
    }
    else{

      $hora_atual = date('H:i');
    $hoje = date('Y-m-d');
    $maior = max($array_h);
    if (strtotime($hoje) == strtotime($data_agenda) && strtotime($hora_atual) >= strtotime($maior)) {

        echo "<option value=''>Não há mais vagas</option>"; //gera as opções de horários disponíveis no front end, via ajax

    } else if(strtotime($hoje) > strtotime($data_agenda) )
    {
        echo "<option value='Não há mais vagas'>Não há mais vagas</option>";
    } 
    else {
        echo $data_agenda;
        for ($h = 0; $h < count($array_h); $h++) {
            $posicao = $array_h[$h];
           
                $hora_atual = date('H:i');
                $hoje = date('Y-m-d');
                
                if(strtotime($hoje) == strtotime($data_agenda) && strtotime($hora_atual) >= strtotime($posicao))
                {
                    $achar_posicao_nv = array_search("$hora_atual", $posicao);  //procura em qual posição do $array_h está o horario vindo do banco. 
                    array_splice($posicao, $achar_posicao_nv, 1); 
                }
                else if(strtotime($hoje) > strtotime($data_agenda) )
                {
                    echo "<option value='Não há mais vagas'>Não há mais vagas</option>";
                }
                else{
                        echo "<option value='" . $posicao . "'>" . $posicao . "</option>"; //gera as opções de horários disponíveis no front end, via ajax
                    }
        }
       
    }
    }

?>