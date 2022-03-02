<?php

    class Sistema extends Controller {

        public function index($nomeSistema = '') {
            $dados = array(
                'nomeSistema' => $nomeSistema
            );
            $this->view('sistema/admin', $dados);
        }

        public function ingredientes() {
            $colunas = ['nome', 'quantidade', 'status'];

            $model = new Ingredientes();
            $ingredientes = $model->listar();
            $dados = array(
                'lista' => 'ingredientes',
                'ingredientes' => $ingredientes,
                'colunas' => $colunas
            );
            $this->view('sistema/admin', $dados);
        }

        public function grupos() {
            $colunas = ['nome', 'status'];

            $model = new Grupos();
            $produtos = $model->listar();
            $dados = array(
                'lista' => 'grupos',
                'produtos' => $produtos,
                'colunas' => $colunas
            );

            $this->view('sistema/admin', $dados);
        }

        public function produtos($tipo = '') {
            if(strtolower($tipo) == 'bebidas' || strtolower($tipo) == 'refrigerantes' || strtolower($tipo) == 'sucos') {
                $colunas = ['nome', 'valor', 'img', 'status'];
            } else {
                $colunas = ['nome', 'valor', 'ingredientes', 'bebida', 'batata', 'status', 'img'];
            }

            $model = new Produtos();
            $produtos = $model->listar($tipo);
            $dados = array(
                'lista' => $tipo,
                'produtos' => $produtos,
                'colunas' => $colunas
            );

            $this->view('sistema/admin', $dados);
        }

        public function cadastrar($tipo) {
            $model = new Produtos();
            $model->cadastrar($_POST, $tipo);
            header('Location: ' . URL . 'sistema/produtos/' . $tipo);
        }

        public function excluir($tipo, $id, $img) {
            $model = new Produtos();
            $model->excluir($id, $img);
            header('Location: ' . URL . 'sistema/produtos/' . $tipo);
        }

        public function cadastrarGrupo(){
            $model = new Grupos();
            $model->cadastrar($_POST);
            header('Location: ' . URL . 'sistema/grupos');
        }

        public function excluirGrupo($id){
            $model = new Grupos();
            $model->excluir($id);
            header('Location: ' . URL . 'sistema/grupos');
        }


    }