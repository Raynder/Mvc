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

        public function addCarrinho() {
            $model = new Produtos();

            $produto = $_POST;
            if($model->add($produto)){
                echo "[".json_encode(array('status' => 'ok', 'msg' => $produto['pedido'].' adicionado ao carrinho, continue seu pedido!')). "]";
            } else {
                echo "[".json_encode(array('status' => 'error', 'msg' => 'Erro ao adicionar produto ao carrinho')). "]";
            }
        }

        public function produtoAdicionado(){
            $model = new Produtos();
            $grupo = new Grupos();

            $produtosCarrinho = $_SESSION['carrinho'];

            $dados = array(
                'grupos' => $grupo->listar(),
                'produtos' => $model->listar(),
                'carrinho' => $produtosCarrinho
            );
            $this->view('Cardapio/index2', $dados);
        }

    }