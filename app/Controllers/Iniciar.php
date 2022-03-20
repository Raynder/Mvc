<?php

    class Iniciar extends Controller{

        public function pedido($hashmesa = ''){
            $continue = false;
            if(!empty($hashmesa)){
                for($i = 1; $i <= 10; $i++){
                    if(md5($i) == $hashmesa){
                        $_SESSION['mesa'] = $i;
                        $continue = true;
                    }
                }
                if(!$continue){
                    $this->view('iniciar/pedido', $dados);
                }
                else{
                    
                }
            } else {
                $this->view('iniciar/index');
            }
        
    }