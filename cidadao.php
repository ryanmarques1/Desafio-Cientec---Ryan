<?php
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
            $primeiro_digito = rand(1,9);
            $restantes = rand(1000000000, 9999999999);

            $nis_gerado = $primeiro_digito . str_pad($restantes,10,"0", STR_PAD_LEFT);
            
            $nis = $nis_gerado;
            return $nis;
        }

        public function insert_banco($post){ //post do forms
            $post['nis'] = $this->gera_NIS();
            $insert_bd = "INSERT INTO usuarios(nome,NIS) VALUES ('{$post['nome_cidadao']}', '{$post['nis']}')";
            if($this->connection->query($insert_bd) === TRUE){
                echo "Dados inseridos com sucesso!!!"."<br>";
                return true;
            }else{
                echo "Erro ao inserir no banco: $insert_bd<br>".$this->connection->error."<br>";
                return false;
            }
        }
        public function ler_tabela($page){
            $seleciona_tabela = "SELECT * FROM usuarios";
            $resultado = $this->connection->query($seleciona_tabela);
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        public function ler_linha($id){
            $seleciona_linha = "SELECT * FROM usuarios WHERE id = $id";
            $resultado = $this->connection->query($seleciona_linha);
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        public function pesquisa_cidadao($nis){
            $seleciona_linha = "SELECT * FROM usuarios WHERE nis = $nis";
            $resultado = $this->connection_query($seleciona_linha);
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
        
    }
?>