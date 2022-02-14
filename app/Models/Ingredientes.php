<?php

    class Ingredientes{

        private $sql;


        public function __construct(){ // 
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            $this->sql = new Database();
        }

        public function cadastrar($dados){
            $resul = $this->sql->insere("INSERT INTO ingredientes (nome, quantidade, status) VALUES (:nome, :quantidade, :status)", array(
                ':nome' => $dados['nome'],
                ':quantidade' => $dados['quantidade'],
                ':status' => $dados['status']
            ));

            if($resul){
                echo "Cadastrado com sucesso!";
            }
            else{
                echo "Erro ao cadastrar!";
            }
        }

        public function listar(){
            $query = "SELECT * FROM ingredientes";
            $resul = $this->sql->select($query);
            return $resul;
        }

        public function excluir($id){
            $resul = $this->sql->insere("DELETE FROM ingredientes WHERE id = :id", array(
                ':id' => $id
            ));

            if($resul){
                echo "Excluido com sucesso!";
            }
            else{
                echo "Erro ao excluir!";
            }
        }
    }