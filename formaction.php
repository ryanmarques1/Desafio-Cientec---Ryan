<?php
include "cidadao.php";
include "conexao.php";

if(empty($_POST['action'])){
    $action = $_GET['action'];
    $id = $_GET['id'];

}else{
    $action = $_POST['action'];
}
$dados_cidadao = new cidadao($connection);

if($action == 'insert_banco'){
    $dados_cidadao->insert_banco($_POST);
}

header('Location: index.php');
?>