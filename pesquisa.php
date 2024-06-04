<?php
    include "conexao.php";
    include "cidadao.php";
    $nis = $_POST['nis_digitado'];
    $dados_cidadao = new cidadao($connection);
    $resultado = $dados_cidadao->pesquisa_cidadao($nis);
    if($resultado){
        echo "\n<br>Nome do cidadão procurado: ". $resultado[0]['nome'] . "\n";
        echo "\n<br>NIS: ". $resultado[0]['NIS'] . "\n";
    }else{
        echo "\n<br>Cidadão não achado.";
    }
?>