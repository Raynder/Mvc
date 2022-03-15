<?php

    class Recepcao extends Controller{

        
        public function index() {
            $model = new Pedidos();

            $this->view('recepcao/index');
        }

        public function listarMesas(){
            $model = new Pedidos();
            $dados = $model->listarMesas();
        }

        public function imprimir() {
            $model = new Pedidos();
    
            $array = array(
                'mesas' => $model->imprimir($_POST['mesa'])
            );

            $this->view('recepcao/imprimir', $array);
        }

    }