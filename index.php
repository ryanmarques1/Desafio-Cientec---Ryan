<?php
//Desafio Cientec - Ryan Marques de Castro

include "conexao.php";
include "cidadao.php";

$id = 0;

if(empty($_GET['action'])){
    $action = 'insert_banco';
    $actionv = 'Cadastrar';
}


$dados_cidadao = new cidadao($connection);


if(empty($_GET['page'])){
    $page = 0;
}else{
    $page = $_GET['page'];
}

$tabela = $dados_cidadao->ler_tabela($page);
$demp = $dados_cidadao->ler_linha($id);


if(empty($demp)){
    $demp[0]['id'] = '';
    $demp[0]['nome'] = '';
    $demp[0]['NIS'] = '';

}



?>
<!DOCTYPE html>
<html lang = "pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cientec Desafio</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>    
</head>

<body>
<div id="container">
    <h1>Cadastro de usuários NIS</h1>
    <form id="formulario" method = "post" action="formaction.php">

        <input type="hidden" name="id" id="id" value="<?php echo $demp[0]['id']; ?>">
        <input type="hidden" name="action" value="<?php echo $action;?>">
        <input type="hidden" name="nis" id="nis" value="<?php echo $demp[0]['NIS']; ?>">

        <label for="nome_cidadao">Nome do cidadão: </label>
        <input type="text" name="nome_cidadao" id="nome_cidadao" value="<?php echo $demp[0]['nome']; ?>" required>
        
        <?php
            if($actionv == 'Cadastrar'){
                echo("<button type='submit'> Cadastrar Cidadão</button>");
            }

        ?>

    </form>
    <form id = "formulario" method="post" action="pesquisa.php">
        <label for="nis_digitado">NIS para pesquisar: </label>
        <input type="text" id="nis_digitado" name="nis_digitado">
        <button type='submit'>Pesquisar</button>
    </form>

</div>

<br>

<section id="resultado">
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>NIS</th>
        </tr>
        <?php
            foreach($tabela as $i){
                echo("
                    <tr>
                    <td>{$i['id']}</td>
                    <td>{$i['nome']}</td>
                    <td>{$i['NIS']}</td>
                    ");
            }
        ?>
    </table>
</section>


</body>

</html>