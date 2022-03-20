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

    <div class="menu">
        <div class="logo">
            <img src="<?= DIST ?>img/logo.png" alt="">
        </div>

        <div class="submenu">

            <span name="listapedido">
                <H1>Lista de Pedidos</H1>
            </span>

            <span name="relatorios">
                <H1>Relatórios</H1>
            </span>

        </div>
    </div>

    <div style="top: 100vh;" class="listapedido item-container">
        <div class="close" onclick="closePagRec()">
            <p>X</p>
        </div>
        <div id="mesas">

        </div>

    </div>

    <div style="top: 100vh;" class="relatorios item-container">
        <div class="close" onclick="closePagRec()">
            <p>X</p>
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


        .item-container {
            height: 90vh;
            width: 85vw;
            z-index: 5;
            background-color: #ffffffd6;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            position: absolute;
            top: 100vh;
            transition: 1s;
            left: 7.5vw;
        }

        /* Fim estilos dos detalhes */

        /* Estilos do carrinho */

        .listapedido>#mesas>.produtos {
            padding: 0 15px;
        }

        .listapedido>#mesas>.produtos>.itemCarrinho {
            padding: 5px;
            background: red;
            border-radius: 10px;
            color: white;
            margin-bottom: 5px;
        }

        .listapedido>#mesas>.produtos>.itemCarrinho>p>span.remover {
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
                        play()
                    }
                    totalPedidos = novoTotalPedidos;
                }
            });
        }

        function removerMesa(mesa){
            $.ajax({
                url: '<?= URL ?>recepcao/removerMesa',
                type: 'POST',
                data: {
                    mesa: mesa
                },
                success: function(data) {
                    listarMesas();
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

                    // alerta com swal.fire perguntando se impressão bem sucedida
                    // se sim, remover mesa
                    // se não, não fazer nada
                    swal.fire({
                        title: 'Impressão',
                        text: "Impressão bem sucedida?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sim',
                        cancelButtonText: 'Não'
                    }).then((result) => {
                        if (result.value) {
                            removerMesa(mesa);
                        }
                    })
                    // window.parent.document.getElementById('printf').contentWindow.print();
                }
            })
        }

        function play() {
            document.getElementById('audio').play()
        }

        // criar um eventlistener para cada item do submenu
        $('.submenu>span').each(function() {
            $(this).click(function() {
                if ($(this).attr('name') == 'listapedido') {
                    $('.listapedido').css('top', '10vh');
                    play();
                    $('.menu').css('opacity', '0');
                    setTimeout(function() {
                        $('.submenu').css('display', 'none');
                    }, 1000);
                } else {
                    $('.' + $(this).attr('name')).css('top', '10vh');
                    $('.menu').css('opacity', '0');
                    setTimeout(function() {
                        $('.submenu').css('display', 'none');
                    }, 1000);
                }
            })
        })

        function closePagRec() {
            $('.item-container').css('top', '100vh');
            $('.submenu').css('display', 'block');
            setTimeout(function() {
                $('.menu').css('opacity', '1');
            }, 500);
        }
    </script>

</body>