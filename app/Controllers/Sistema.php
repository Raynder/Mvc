<?php

    class Sistema extends Controller {

<<<<<<< HEAD
        public function index($nomeSistema = "") {
            if(isset($_SESSION['usuario'])) {
                $dados = array(
                    'nomeSistema' => $nomeSistema
                );
                $this->view('sistema/index', $dados);
            } else {
                $this->view('conta/index');
            }
=======
        public function index($nomeSistema = '') {
            $dados = array(
                'nomeSistema' => $nomeSistema
            );
            $this->view('sistema/admin', $dados);
>>>>>>> de72703639f7efe34358a75dc95c4ce4a77de415
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

        public function combos() {
            $colunas = ['nome', 'valor', 'ingredientes', 'status', 'img'];

            $model = new Combos();
            $combos = $model->listar();
            $dados = array(
                'lista' => 'combos',
                'combos' => $combos,
                'colunas' => $colunas
            );
            $this->view('sistema/admin', $dados);
        }

        public function gourmet() {
            $colunas = ['nome', 'valor', 'ingredientes', 'status', 'img'];

            $model = new Gourmet();
            $gourmet = $model->listar();
            $dados = array(
                'lista' => 'gourmet',
                'gourmet' => $gourmet,
                'colunas' => $colunas
            );
            $this->view('sistema/admin', $dados);
        }

        public function combinados() {
            $colunas = ['nome', 'valor','ingredientes', 'status', 'img'];

            $model = new Combinados();
            $combinados = $model->listar();
            $dados = array(
                'lista' => 'combinados',
                'combinados' => $combinados,
                'colunas' => $colunas
            );
            $this->view('sistema/admin', $dados);
        }

        public function bebidas() {
            $colunas = ['nome', 'valor', 'status', 'img'];

            $model = new Bebidas();
            $bebidas = $model->listar();
            $dados = array(
                'lista' => 'Bebidas',
                'bebidas' => $bebidas,
                'colunas' => $colunas
            );
            $this->view('sistema/admin', $dados);
        }

        public function cadastrar($lista) {
            $model = new $lista();
            $model->cadastrar($_POST);
            header('Location: ' . URL . 'sistema/' . $lista);
        }

        public function excluir($lista, $id, $img) {
            $model = new $lista();
            $model->excluir($id, $img);
            header('Location: ' . URL . 'sistema/' . $lista);
        }


    }