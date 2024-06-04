<?php
//Aqui temos a ação do formulário.
include "cidadao.php";
include "conexao.php";

$dados_cidadao = new cidadao($connection);

if(empty($_POST['action'])){
    $action = $_GET['action'];
    $id = $_GET['id'];

}else{
    $action = $_POST['action'];
}

if($action == 'insert_banco'){
    $dados_cidadao->insert_banco($_POST); //Inserindo usando função da classe cidadao
    
}

header('Location: index.php');
?>