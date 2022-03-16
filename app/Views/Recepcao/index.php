<?php
$total = 0;
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIT SOFT</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">

</head>

<body>

    <div class="bg-container">

    </div>

    <div class="lista">
        <div class="close" onclick="closePag()">
            <p>X</p>
        </div>
        <div id="mesas">

        </div>

    </div>

    <div class="cloud">
        <img src="<?= DIST ?>img/nuvem.png" alt="" class="img_cloud">
    </div>

    <audio src="<?= DIST ?>audio/audio.mp3" id="audio"></audio>

    <iframe id="printf" name="printf"></iframe>

    <style>
        h1,
        *,
        body,
        html,
        p,
        a,
        li,
        ul,
        div,
        img,
        span,
        input,
        button,
        textarea {
            margin: 0;
            padding: 0;
            border: 0;
            outline: none;
            list-style: none;
            text-decoration: none;
        }

        body,
        html {
            overflow: hidden;
            height: 100vh;
        }

        .close>p {
            padding: 10px;
            color: black;
            background: grey;
        }

        /* Estilos do BG */

        .bg-container {
            position: fixed;
            width: 100vw;
            height: 100vh;
            background-image: url("<?= DIST ?>img/bg.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            overflow: hidden;
            z-index: -1;
        }

        .container {
            position: fixed;
            height: 100vh;
            width: 100vw;
            z-index: 1;
            transition: 1s;
        }



        .cloud {
            background-color: rgba(0, 0, 0, .4);
            position: fixed;
            bottom: 0;
            /* width: 2200px; */
            height: 100%;
            animation: rotationLeft 80s linear infinite;
            z-index: 0;
        }

        @keyframes rotationLeft {
            0% {
                transform: translateZ(0);
            }

            100% {
                transform: translate3d(-50%, 0, 0);
            }

        }

        .img_cloud {
            height: 100%;
            opacity: 0.5
        }

        /* Fim Estilos do BG */

        /* Estilos dos detalhes */

        .lista {
            height: 90vh;
            margin: auto;
            width: 85vw;
            z-index: 5;
            background-color: #ffffffd6;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            position: relative;
            top: 10vh;
            transition: 1s;
        }

        /* Fim estilos dos detalhes */

        /* Estilos do carrinho */

        .lista>#mesas>.produtos {
            padding: 0 15px;
        }

        .lista>#mesas>.produtos>.itemCarrinho {
            padding: 5px;
            background: red;
            border-radius: 10px;
            color: white;
            margin-bottom: 5px;
        }

        .lista>#mesas>.produtos>.itemCarrinho>p>span.remover {
            float: right;
            padding: 0px 7px;
            background: white;
            color: red;
            border-radius: 5px;
        }

        /* Fim estilos do carrinho */
    </style>

    <script>
        var totalPedidos;
        listarMesas();

        setInterval(() => {
            listarMesas();
        }, 2000);

        function listarMesas() {
            $.ajax({
                url: '<?= URL ?>recepcao/listarMesas',
                type: 'GET',
                success: function(data) {
                    $('#mesas').html(data);
                    //contar quantos itemCarrinho tem em data
                    novoTotalPedidos = $('.itemCarrinho').length;
                    if (novoTotalPedidos > totalPedidos) {
                        $('#audio')[0].play();
                    }
                    totalPedidos = novoTotalPedidos;
                }
            });
        }

        function expandir(mesa) {
            $.ajax({
                url: '<?= URL ?>recepcao/imprimir',
                type: 'POST',
                data: {
                    mesa: mesa
                },
                success: function(data) {
                    $('#printf').contents().find('body').html(data);
                    window.frames['printf'].focus();
                    window.frames['printf'].print();
                    // limpar iframe
                    setTimeout(function() {
                        $('#printf').contents().find('body').html('');
                    }, 8000);
                    // window.parent.document.getElementById('printf').contentWindow.print();
                }
            })
        }

        function play() {
            document.getElementById('audio').play()
        }
    </script>

</body>