<?php
    $server_name = "localhost";
    $user_name = "root";
    $psswd = "";
    $banco_name = "cadastro_nis";

    //criando a conexão

    $connection = new mysqli($server_name, $user_name, $psswd, $banco_name);

    if($connection->connect_error){
        die("Não foi possivel conectar ao banco de dados: " . $connection->connection_error);
    }else{
        echo "Conexão realizada com sucesso!";
    }
?>