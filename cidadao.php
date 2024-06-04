<?php
    //Classe cidadao.
    class cidadao{
        //Variaveis da classe;
        private $id;
        private $name;
        private $nis;

        //Variavel de conexão

        private $connection;

        //Construtor normal
        public function __construct($banco_dados){
            $this->connection = $banco_dados;
        }

        public function gera_NIS(){
            //Pegando o primeiro digito separado para ele não ser 0 toda vez.
            $primeiro_digito = mt_rand(1,9); 
            $numero = mt_rand(1000000000, 9999999999); //gerando um numero GRANDE
            $nis_gerado = $primeiro_digito . str_pad($numero,10 ,"0" , STR_PAD_RIGHT); //Concatenamos o primeiro com o gerado, limitamos em 10 digitos e especificamos para completar com 0s a direita.
            $nis = $nis_gerado;
            return $nis;
        }

        public function insert_banco($post){ //post do forms
            $post['nis'] = $this->gera_NIS();
            $insert_bd = "INSERT INTO usuarios(nome,NIS) VALUES ('{$post['nome_cidadao']}', '{$post['nis']}')";
            if($this->connection->query($insert_bd) === TRUE){
                return true;
            }else{
                return false;
            }
        }
        public function ler_tabela($page){
            $seleciona_tabela = "SELECT * FROM usuarios ORDER BY id DESC LIMIT 1"; //Ordem descrescente com LIMITE 1
            $resultado = $this->connection->query($seleciona_tabela);
            if($this->connection->query($seleciona_tabela) === FALSE){
                return false;
            }
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        public function ler_linha($id){
            $seleciona_linha = "SELECT * FROM usuarios WHERE id = $id";
            $resultado = $this->connection->query($seleciona_linha);
            if($this->connection->query($seleciona_linha) === FALSE){
                return false;
            }
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        public function pesquisa_cidadao($nis){
            $seleciona_linha = "SELECT nome,NIS FROM usuarios WHERE nis = $nis LIMIT 1";
            $resultado = $this->connection->query($seleciona_linha);
            if($this->connection->query($seleciona_linha) === FALSE){
                return false;
            }
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        
    }
?>