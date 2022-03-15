<?php

    class Pedidos {

        private $sql;

        public function __construct() {
            $this->sql = new Database();
        }

        public function listarMesas() {
            $sql = new Database();
            $resultado = $sql->select("SELECT * ,COUNT(valor) FROM pedidos GROUP BY mesa;");

            if (count($resultado) > 0) {
                $produtos = $resultado;
                echo ('<div class="produtos"><h2 style="padding: 5px;" onclick="play()">Pedidos</h2>');
                foreach ($produtos as $produto) {
                    echo ('<div  onclick="expandir('.$produto['mesa'].')" class="itemCarrinho">');
                    echo ('<p>Mesa ' . $produto['mesa'] . '<span class="remover">'.$produto['COUNT(valor)'].' itens</span></p>');
                    echo ('</div>');
                }
                echo ('</div>');
            }
            return true;
        }

        public function imprimir($mesa){
            $total = 0;
            $sql = new Database();
            $resultado = $sql->select("SELECT * FROM pedidos WHERE mesa = $mesa;");
            
            echo '<div class="impressao"><div style="" class="tituloImpressao">Pedido Mesa '.$resultado[0]['mesa'].'</div><h1 style="font-size: 36px;margin: 0;">----------------------------------</h1>';
            foreach($resultado as $pedido){
                echo '<p>'.$pedido['pedido'].' '.$pedido['tamanho'].' <span class="floatRight">R$'.$pedido['valor'].'</span></p>';
                echo '<p>'.$pedido['observacao'].'</p>';
                $total += $pedido['valor'];
                echo('<h1 style="font-size: 36px;margin: 0;">----------------------------------</h1>');
            }
            echo '<p style="text-align:center">Total do pedido R$'.$total.'</p></div>';

            echo("<style>");
            echo(".impressao {
                width: 100%;
                height: 100%;
                position: fixed;
                top: 0;
                left: 0;
                background-color: white;
                z-index: 99;
            }
            p {
                margin: 0 0 10px;
                margin: 0;
                font-size: 18pt;
            }
            .tituloImpressao {
                text-align: center;font-size: 28pt;
            }
            .floatRight {
                float: right;
                margin-right: 10px;
            }
            ");
            echo("</style>");
            exit();
        }

    }