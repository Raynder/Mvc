<?php

class Cardapio extends Controller
{

    public function index($hashmesa = '')
    {
        if (isset($_SESSION['mesa']) && !empty($_SESSION['mesa'])) {
            $this->redirecionar();
        } else {
            $continue = false;
            if (!empty($hashmesa)) {
                for ($i = 1; $i <= 10; $i++) {
                    if (md5($i) == $hashmesa) {
                        $_SESSION['mesa'] = $i;
                        $continue = true;
                    }
                }
                if (!$continue) {
                    $this->view('erros/qrcode');
                } else {
                    header('Location: '.URL.'cardapio');
                }
            } else {
                $this->view('erros/link');
            }
        }
    }

    public function buscarProduto()
    {
        $model = new Produtos();
        $produto = $model->buscar($_POST['id']);
        echo json_encode($produto);
    }

    public function addCarrinho()
    {
        $model = new Produtos();

        $produto = $_POST;
        if ($model->add($produto)) {
            echo "[" . json_encode(array('status' => 'ok', 'msg' => $produto['pedido'] . ' adicionado ao carrinho, continue seu pedido!')) . "]";
        } else {
            echo "[" . json_encode(array('status' => 'error', 'msg' => 'Erro ao adicionar produto ao carrinho')) . "]";
        }
    }

    public function removerCarrinho()
    {
        $model = new Produtos();

        $produto = $_POST['pos'];
        if ($nomeProduto = $model->remover($produto)) {
            echo "[" . json_encode(array('status' => 'ok', 'msg' => $nomeProduto . ' removido do carrinho, continue seu pedido!')) . "]";
        } else {
            echo "[" . json_encode(array('status' => 'error', 'msg' => 'Erro ao remover produto do carrinho')) . "]";
        }
    }

    public function enviarPedido()
    {
        $model = new Produtos();

        if ($model->enviar()) {
            echo "[" . json_encode(array('status' => 'ok', 'msg' => 'Pedido confirmado! Aguarde, logo será servido.')) . "]";
        } else {
            echo "[" . json_encode(array('status' => 'error', 'msg' => 'Erro ao realizar pedido')) . "]";
        }

        //Limpar carrinho
        $model->limpar();
    }

    private function redirecionar()
    {
        $model = new Produtos();
        $grupo = new Grupos();

        $produtosCarrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : array();

        $dados = array(
            'grupos' => $grupo->listar(),
            'produtos' => $model->listar(),
            'carrinho' => $produtosCarrinho
        );

        $this->view('Cardapio/index', $dados);
    }
}
