<?php

    class Cardapio extends Controller {

        public function index($nomeCardapio = '') {
            $model = new Produtos();
            $grupo = new Grupos();

            $dados = array(
                'grupos' => $grupo->listar(),
                'produtos' => $model->listar()
            );
            
            $this->view('Cardapio/index2', $dados);            
        }

        public function buscarProduto() {
            $model = new Produtos();
            $produto = $model->buscar($_POST['id']);
            echo json_encode($produto);
        }

    }