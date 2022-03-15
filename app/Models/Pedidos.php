<?php

    class Pedidos {

        private $sql;

        public function __construct() {
            $this->sql = new Database();
        }

        public function listarMesas() {
            $sql = new Database();
            $resultado = $sql->select("SELECT * ,COUNT(valor) FROM pedidos GROUP BY mesa;");
            return $resultado;
        }

        public function imprimir($mesa){
            $total = 0;
            $sql = new Database();
            $resultado = $sql->select("SELECT * FROM pedidos WHERE mesa = $mesa;");
            
            echo '<div class="impressao"><div style="text-align: center;" class="tituloImpressao">Pedido Mesa '.$resultado[0]['mesa'].'</div>--------------------';
            foreach($resultado as $pedido){
                echo '<p>'.$pedido['pedido'].' '.$pedido['tamanho'].' R$'.$pedido['valor'].'</p>';
                echo '<p>'.$pedido['observacao'].'</p>';
                $total += $pedido['valor'];
            }
            echo '<p>Total do pedido R$'.$total.'</p></div>';
            exit();
        }

    }