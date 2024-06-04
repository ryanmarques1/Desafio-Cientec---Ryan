<?php
//Desafio Cientec - Ryan Marques de Castro
//MAIN PRINCIPAL .c
include "conexao.php";
include "cidadao.php";



$id = 0;

if(empty($_GET['action'])){
    $action = 'insert_banco';
    $actionv = 'Cadastrar';
}
$dados_cidadao = new cidadao($connection); //Objeto da classe


if(empty($_GET['page'])){
    $page = 0;
}else{
    $page = $_GET['page'];
}

//Var tabela recebe a tabela do BD. Var demp recebe linha baseada no $id.
$tabela = $dados_cidadao->ler_tabela($page);
$demp = $dados_cidadao->ler_linha($id);


//Atribuindo vazio caso não tiver ninguem no BD.
if(empty($demp)){
    $demp[0]['id'] = '';
    $demp[0]['nome'] = '';
    $demp[0]['NIS'] = '';
}

$id = $id + 1;
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
    <!-- Form para adicionar cidadões-->
    <form class = "formulario" method = "post" action="formaction.php">

        <input type="hidden" name="id" id="id" value="<?php echo $demp[0]['id']; ?>">
        <input type="hidden" name="action" value="<?php echo $action;?>">
        <input type="hidden" name="nis" id="nis" value="<?php echo $demp[0]['NIS']; ?>">

        <label for="nome_cidadao">Nome do cidadão: </label>
        <input type="text" name="nome_cidadao" id="nome_cidadao" value="<?php echo $demp[0]['nome']; ?>" required>
        
        <?php
            if($actionv == 'Cadastrar'){
                echo("<button type='submit'>Cadastrar Cidadão</button>");
            }

        ?>

    </form>
    <!-- Form para pesquisa por NIS-->
    <form class = "formulario" method="post" action="pesquisa.php">
        <label for="nis_digitado">Digite o NIS para pesquisar: </label>
        <input type="text" id="nis_digitado" name="nis_digitado">
        <button type='submit'>Pesquisar Cidadão</button>
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
            if($tabela){
                echo ("<h4>Cidadão com o NIS <u>{$tabela[0]['NIS']}</u> adicionado com sucesso!.</h4>");
                echo("
                    <tr>
                    <td>{$tabela[0]['id']}</td>
                    <td>{$tabela[0]['nome']}</td>
                    <td>{$tabela[0]['NIS']}</td>
                    ");
            }else{
                echo("<h4>Nenhum cidadão encontrado!</h4>");
            }

        ?>
    </table>
</section>


</body>

</html>