<?php

    class Recepcao extends Controller{

        
        public function index() {
            $model = new Pedidos();
    
            $array = array(
                'mesas' => $model->listarMesas()
            );

            $this->view('recepcao/index', $array);
        }

        public function imprimir() {
            $model = new Pedidos();
    
            $array = array(
                'mesas' => $model->imprimir($_POST['mesa'])
            );

            $this->view('recepcao/imprimir', $array);
        }

    }