<?php

    class Cardapio extends Controller {

        public function index($nomeCardapio = '') {
            $model = new Combos();
            $produtos = $model->listar();
            
            $this->view('Cardapio/index', $produtos);            
        }

        public function combos(){

            $model = new Combos();
            $produtos = $model->listar();
            
            $this->view('Cardapio/index', $produtos);
        }

        public function combinados(){

            $model = new Combinados();
            $produtos = $model->listar();
            
            $this->view('Cardapio/index', $produtos);
        }

        public function gourmet(){

            $model = new Gourmet();
            $produtos = $model->listar();
            
            $this->view('Cardapio/index', $produtos);
        }

    }