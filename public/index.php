<?php
    session_start();
    include './../app/autoload.php';
    include './../app/config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=DIST?>css/style.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="<?=DIST?>js/jquery.mask.min.js"></script>
    <script src="<?=DIST?>js/sweetAlert.js"></script>

    <title><?=APP_NOME?></title>
</head>
<body>
    
    <?php
        $rotas = new Rota();
    ?>


    <!-- CADASTRAR EMPRESA -->
    <div class="modal fade" id="cadastrarEmpresa" tabindex="-1" role="dialog" aria-labelledby="defUfLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defUfLabel">CADASTRAR EMPRESA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="col-md-12 colunas-pai" style="padding: 1px;"> <!-- Primeira coluna interna -->
                    <div class="table-responsive">
                        
                                
                    </div>
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
                <input type="submit" value="CADASTRAR"  class="btn btn-primary">

            </div>
            </div>
        </div>
    </div>

</body>

<script>
    function alerta(frase){
        swal.fire(frase);
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="<?=DIST?>js/main.js"></script>

</html>