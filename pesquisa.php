<?php
    include "conexao.php";
    include "cidadao.php";

    $nis = $_POST['nis_digitado']; //Pega o nis digitado para pesquisa e armazena na variavel nis
    $dados_cidadao = new cidadao($connection); //criando um objeto 
    $resultado = $dados_cidadao->pesquisa_cidadao($nis); //Realizando a pesquisa com a chamada da função da classe cidadao
    
    echo "\n<br>Consulta realizada com sucesso!<br>";
    if($resultado){
        echo "\n<br>Nome do cidadão procurado: ". $resultado[0]['nome'] . "\n";
        echo "\n<br>NIS: ". $resultado[0]['NIS'] . "\n";
    }else{
        echo "\n<br>Cidadão não achado.";
    }
?>