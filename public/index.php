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

    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="<?= DIST ?>css/lightslider.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />


    <link href="<?= DIST ?>css/style.css" rel="stylesheet">
    <title><?= APP_NOME ?></title>
</head>

<body>

    <?php
    $rotas = new Rota();
    ?>

</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>


<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
<script src="<?= DIST ?>js/jquery.mask.min.js"></script>
<script src="<?= DIST ?>js/sweetAlert.js"></script>
<script src="<?= DIST ?>js/lightslider.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>-->
<script src="<?= DIST ?>js/main.js"></script>
<script src="<?= DIST ?>js/cardapio.js"></script>
<script src="<?= DIST ?>js/pedido.js"></script>
<script src="<?= DIST ?>js/recepcao.js"></script>
<script>
    function alerta(frase) {
        swal.fire(frase);
        return true;
    }
</script>
</html>