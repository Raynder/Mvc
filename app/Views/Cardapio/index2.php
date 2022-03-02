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

    <div class="container">

        <div class="btnmenu">
            <img src="<?= DIST ?>img/btnmenu.png" alt="">
        </div>

        <div class="produtos">
            <?php
            $produtos = $dados['produtos'];
            $arrayProdutos = array();

            foreach ($dados['grupos'] as $grupo) {
                $arrayProdutos[strtolower($grupo['nome'])] = array();
            }

            foreach ($produtos as $produto) {
                $arrayProdutos[$produto['tipo']][] = $produto;
            }


            foreach ($dados['grupos'] as $grupo) {
            ?>
                <div class="grupo" id="<?= strtolower($grupo['nome']) ?>">
                    <!-- <h1><?= $grupo['nome'] ?></h1> -->
                    <?php
                    $contador = 1;
                    $cont = 0;
                    foreach ($arrayProdutos[strtolower($grupo['nome'])] as $produto) {
                        if ($cont >= 6) {
                            $cont = 0;
                            $contador++;
                        }
                    ?>
                        <div class="lista lista<?= $contador ?>" <?= $contador > 1 ? 'style="display:none"' : "" ?>>
                            <div class="produto" id="<?= $produto['id'] ?>">
                                <div class="item">
                                    <h1><?= ucfirst($produto['nome']) ?></h1>
                                    <div class="produto-imagem">
                                        <img src="<?= URL ?><?= $produto['img'] ?>" alt="">
                                    </div>
                                    <div class="produto-detalhes">
                                        <p>R$ <?= $produto['valor'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $cont++;
                    }
                    ?>
                </div>
            <?php
            }
            ?>


            <div class="rodape">
                <span onclick="mudaPagina(1)">
                    <img src="<?= DIST ?>img/mao.png" alt="" class="mao voltar">
                </span>
                <span id="concluir">
                    <p>Concluir</p>
                    <h1>20,00</h1>
                </span>
                <span onclick="mudaPagina(2)">
                    <img src="<?= DIST ?>img/mao.png" alt="" class="mao avancar">
                </span>
            </div>
        </div>

    </div>

    <div class="bg-container">

    </div>

    <div class="detalhes-container">

    </div>

    <div class="detalhes-container2">

    </div>

    <div class="cloud">
        <img src="<?= DIST ?>img/nuvem.png" alt="" class="img_cloud">
    </div>

    <div class="menu">
        <div class="logo">
            <img src="<?= DIST ?>img/logo.png" alt="">
        </div>

        <div class="submenu">
            <?php
            foreach ($dados['grupos'] as $grupo) {
                echo '<span name="' . $grupo['nome'] . '">';
                echo '<H1>' . ucfirst($grupo['nome']) . '</H1>';
                echo '</span>';
            }
            ?>

        </div>
    </div>

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

        /* Estilos dos produtos */

        .container>.produtos {
            transition: 1s;
            padding-top: 10px;
            opacity: 0;
            display: none;
            height: 85%;
        }

        .grupo {
            height: 100%;
        }

        .grupo>.lista {
            padding: 0 5px;
            margin: 5px 0 0 0;
            width: 50%;
            height: 32%;
            float: left;
            color: #fff;
        }

        .grupo>.lista>.produto {
            width: 100%;
            height: 100%;
        }

        .produto>.item {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            background: rgba(0, 0, 0, .4)
        }

        .produto>.item>h1 {
            font-family: 'Indie Flower', cursive;
            -webkit-text-stroke-color: #ff00008a;
            font-size: 16pt;
            -webkit-text-stroke-width: 2px;
        }

        .produto-imagem>img {
            width: 60%;
            left: 50%;
            transform: translateX(-50%);
            position: relative;
        }

        /* Fim dos estilos dos produtos */

        /* Estilos do menu */
        .btnmenu {
            position: absolute;
            right: 0;
            z-index: 3;
            display: none;
            transition: 1s;
            opacity: .6;
        }

        .btnmenu>img {
            width: 70px;
            margin: 9px;
            z-index: 6;
        }

        .menu {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            background: #53383880;
            transition: 1s;
            opacity: 1;
            display: block;
            z-index: 2;
        }

        .menu>.logo>img {
            width: 100%;
        }

        .menu>.submenu>span.ativo {
            background: #5c2323 !important;
        }

        .submenu {
            width: 80%;
            margin: auto;
        }

        .menu>.submenu>span {
            padding: 5px;
            background: #E72323;
            text-decoration: none;
            color: #fff;
            display: block;
            width: 100%;
            text-align: center;
            margin: 10px 0;
            border-radius: 10px;
        }

        /* FIm estilos do menu */

        /* Estilos rodape */
        .produtos>.rodape {
            position: relative;
            bottom: 0;
            width: 90vw;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: 1s;
            opacity: 1;
            z-index: 2;
            height: 11%;
            margin: 2% 0;
        }

        .mao.voltar {
            opacity: 0;
            width: 50px;
            transform: rotate(90deg) scaleY(-1);
        }

        .mao.avancar {
            width: 50px;
            transform: rotate(90deg);
        }

        #concluir {
            color: white;
            width: 50%;
            background-color: #1bbc1b;
            text-align: center;
            border-radius: 10px;
        }

        #concluir>h1 {
            font-size: 20pt;
        }

        /* Fim estilos rodape */

        /* Estilos dos detalhes */

        .detalhes-container,
        .detalhes-container2 {
            height: 90vh;
            margin: auto;
            width: 80vw;
            z-index: 5;
            background-color: #ffffffd6;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            position: relative;
            top: 100vh;
            transition: 1s;
        }

        .detalhes-container>.detalhes,
        .detalhes-container2>.detalhes {
            padding: 10px;
        }

        .detalhes-container>.detalhes>.detalhes-imagem,
        .detalhes-container2>.detalhes>.detalhes-imagem {
            width: 50%;
            margin: auto;
        }

        .detalhes-container>.detalhes>.detalhes-imagem>img,
        .detalhes-container2>.detalhes>.detalhes-imagem>img {
            width: 100%;
        }

        .detalhes-container>.detalhes>.detalhes-descricao>div>.ativo,
        .detalhes-container2>.detalhes>.detalhes-descricao>div>.ativo {
            background-color: #f7d73e;
        }

        .detalhes-container>.detalhes>.detalhes-descricao>p>span {
            width: 8%;
            padding: 1px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 1px 1px black;
        }

        .detalhes-container>.detalhes>.detalhes-descricao>p>span.ativo {
            background: #1bbc1b !important;
        }

        .detalhes-container>.detalhes>.detalhes-descricao>p {
            padding-bottom: 5px;
        }

        .detalhes-container>.detalhes>.detalhes-descricao>div>.bebida,
        .detalhes-container>.detalhes>.detalhes-descricao>div>.batata,
        .detalhes-container2>.detalhes>.detalhes-descricao>div>.bebida,
        .detalhes-container2>.detalhes>.detalhes-descricao>div>.batata,
        .detalhes-container>.detalhes>.detalhes-descricao>div>.pao,
        .detalhes-container2>.detalhes>.detalhes-descricao>div>.pao {
            padding: 5px;
            width: 23%;
            text-align: center;
            border-radius: 5px;
            box-shadow: 1px 1px black;
        }
    </style>

    <script>
        var pag = 1;
        var precoAtual = 0;
        var pao = 0;
        var bebida = 0;
        var batata = 0;

        function maoAvancar() {
            try {
                // pegar a div com class lista que esta com display block
                aux = document.querySelector('.ativado>.lista' + (pag + 1)).childElementCount;
                document.querySelector('.mao.avancar').style.opacity = 1;
            } catch (error) {
                document.querySelector('.mao.avancar').style.opacity = 0;
            }
        }

        function maoVoltar() {
            try {
                aux = document.querySelector('.ativado>.lista' + (pag - 1)).childElementCount;
                document.querySelector('.mao.voltar').style.opacity = 1;
            } catch (error) {
                document.querySelector('.mao.voltar').style.opacity = 0;
            }
        }

        function limparPagina() {
            document.querySelectorAll('.lista').forEach(function(lista) {
                lista.style.display = 'none';
            });
            document.querySelectorAll('.lista1').forEach(function(lista) {
                lista.style.display = 'block';
            });

            document.querySelector('.mao.avancar').style.opacity = 1;
        }

        function mudaPagina(sentido) {
            document.querySelectorAll('.lista').forEach(function(lista) {
                lista.style.display = 'none';
            });
            if (sentido == 1) {
                pag--;
            } else {
                pag++;
            }
            document.querySelectorAll('.lista' + pag).forEach(function(lista) {
                lista.style.display = 'block';
            });

            document.querySelectorAll('.mao').forEach(function(mao) {
                mao.style.opacity = 0;
            });

            maoAvancar();
            maoVoltar();

            // if (document.querySelector('.lista' + (pag - 1)).childElementCount == 1) {
            //     document.querySelector('.mao.voltar').style.display = 'block';
            // } else {
            //     document.querySelector('.mao.voltar').style.display = 'none';
            // }
        }

        window.onload = function() {
            btnmenu = $('.btnmenu')[0];
            btnmenu.addEventListener('click', opencls);

            lista = document.querySelectorAll('.submenu>span');
            lista.forEach((itemLista) => {
                itemLista.addEventListener('click', open);
            });

            document.querySelectorAll('.produto').forEach((produto) => {
                produto.addEventListener('click', function() {
                    openDetalhes(produto.id)
                }, false);
            });

        }

        function openDetalhes(id) {
            $.ajax({
                url: "<?= URL ?>/cardapio/buscarProduto",
                type: "POST",
                data: {
                    id: id
                },
                success: function(data) {
                    dados = JSON.parse(data.split('[')[1].split(']')[0]);
                    precoAtual = parseFloat(dados.valor.replace(',', '.'));
                    console.log(precoAtual);
                    dadosDescricao = dados.ingredientes.split(';');

                    html2 = `<div class="detalhes">
                        <div class="detalhes-imagem">
                            <img src="<?= URL ?>` + dados.img + `" alt="">
                        </div>
                        <div class="detalhes-descricao">`

                    html = `<div class="detalhes">
                        <div class="detalhes-imagem">
                            <img src="<?= URL ?>` + dados.img + `" alt="">
                        </div>
                        <div class="detalhes-descricao">
                            <h1>` + dados.nome + `</h1>
                            `
                    if (dadosDescricao.length > 1) {
                        ingredientes = dados.ingredientes.split(';');
                        html += `<h2>Ingredientes</h2>`
                        ingredientes.forEach((ingrediente) => {
                            html += `<p>` + ingrediente + `<span id="` + ingrediente + `" class="ativo" style="float:right;background:red;">-</span></p>`
                        });
                    } else {
                        html += `<h2>Descrição</h2>`
                        html += `<p>` + dados.ingredientes + `</p>`
                    }

                    if (dados.ingredientes.indexOf("Pão") != -1 || dados.ingredientes.indexOf("Pao") != -1 || dados.ingredientes.indexOf("pão") != -1 || dados.ingredientes.indexOf("pao") != -1) {
                        html2 += `<h2>Tamanho do pão</h2>`
                        html2 += `<div style="display:flex;justify-content: space-around;">
                                    <div class="pao" onclick="addAcomp(this)"><p>80g</p></div>
                                    <div class="pao" onclick="addAcomp(this)"><p>120g</p></div>
                                    <div class="pao" onclick="addAcomp(this)"><p>160g</p></div>
                                </div>`
                    }

                    if (dados.bebida != 0 && dados.bebida != "0") {
                        html2 += `<h2>Bebida</h2>`
                        html2 += `<div style="display:flex;justify-content: space-around;">
                                    <div class="bebida" onclick="addAcomp(this)"><p>Sim</p></div>
                                    <div class="bebida" onclick="addAcomp(this)"><p>Não</p></div>
                                </div>`
                    }

                    if (dados.batata != 0 && dados.batata != "0") {
                        html2 += `<h2>Batata</h2>`
                        html2 += `<div style="display:flex;justify-content: space-around;">
                                    <div class="batata" onclick="addAcomp(this)"><p>Sim</p></div>
                                    <div class="batata" onclick="addAcomp(this)"><p>Não</p></div>
                                </div>`
                    }

                    html += `<h2>Preço</h2>
                                <p class="precoAvaliado">R$ ` + dados.valor + `</p>
                            </div>
                        </div>
                        <div>
                        <button class="btn-detalhes" onclick="addCarrinho('` + dados.nome + `','`+dados.tipo+`')">Adicionar ao carrinho</button>
                        </div>`;

                    html2 += `<h2>Preço</h2>
                                <p class="precoAvaliado">R$ ` + dados.valor + `</p>
                            </div>
                        </div>
                        <div>
                        <button class="btn-detalhes" onclick="addCarrinho('` + dados.nome + `','`+dados.tipo+`')">Adicionar ao carrinho</button>
                        </div>`;


                    document.querySelector('.detalhes-container').innerHTML = html;
                    document.querySelector('.detalhes-container2').innerHTML = html2;
                }
            })

            document.querySelector('.detalhes-container').style.top = '10vh';
            document.querySelector('.container').style.opacity = 0;

            setTimeout(() => {
                altIngredientes();
            }, 1000)
        }

        function altIngredientes() {
            document.querySelectorAll('.detalhes-container>.detalhes>.detalhes-descricao>p>span').forEach((item) => {
                item.addEventListener('click', function() {
                    //verificar se o item contem a class ativo
                    if (item.classList.contains('ativo')) {
                        item.classList.remove('ativo');
                        item.classList.add('inativo');
                    } else {
                        item.classList.add('ativo');
                        item.classList.remove('inativo');
                    }
                });
            });
        }

        function addCarrinho(nome, tipo) {
            respostas = [];
            respostas['pedido'] = nome;
            respostas['tipo'] = tipo;

            container2 = document.querySelector('.detalhes-container2');
            // Verificar se o container 2 existe
            if (container2.innerHTML != '') {
                if (container2.style.top == '') {
                    // Trazer o container 2 para cima
                    document.querySelector('.detalhes-container').style.top = '-100vh';
                    setTimeout(() => {
                        document.querySelector('.detalhes-container2').style.top = '-80vh';
                    }, 1000);
                    return;
                }
                if (container2.style.top == '-80vh') {
                    // Validação de dados do container 2
                    total = container2.querySelectorAll('.detalhes>.detalhes-descricao>div').length
                    total2 = container2.querySelectorAll('.detalhes>.detalhes-descricao>div>.ativo').length

                    container2.querySelectorAll('.detalhes>.detalhes-descricao>div>.ativo').forEach((item) => {
                        respostas[item.className.split(' ')[0]] = item.innerText;
                    });
                    if (total2 != total) {
                        alert('Preencha todos os campos');
                        return;
                    } else {
                        if (respostas.bebida == 'Sim') {

                        } else {
                            //Pegar ingredientes recusados pelo cliente
                            document.querySelectorAll('.detalhes-container>.detalhes>.detalhes-descricao>p>span.inativo').forEach((item) => {
                                respostas[item.id] = 'Não';
                            });

                            console.log(respostas)
                        }
                    }
                }
            }
        }

        function open() {
            lista.forEach(function(item) {
                item.classList.remove('ativo');
            })
            this.classList.add('ativo');

            produtos = document.querySelectorAll('.container>.produtos>.grupo');
            grupo = this.getAttribute('name');
            grupo = grupo.toLowerCase();

            produtos.forEach(function(item) {
                item.style.display = 'none';
                item.classList.remove('ativado');
            })

            console.log(grupo);
            aux = document.getElementById(grupo);
            aux.classList.add('ativado');
            aux.style.display = 'block';
            opencls();
        }

        function opencls() {
            menu = $('.menu')[0];
            produtos = $('.container>.produtos')[0];

            if (menu.style.display == 'none') {
                menu.style.display = 'block';
                produtos.style.opacity = 0;
                btnmenu.style.opacity = 0;

                setTimeout(() => {
                    menu.style.opacity = 1;
                    produtos.style.display = 'none';
                    btnmenu.style.display = 'none';
                }, 1000);
            } else {
                pag = 1;
                limparPagina();
                menu.style.opacity = 0;
                produtos.style.display = 'block';
                btnmenu.style.display = 'block';

                setTimeout(() => {
                    menu.style.display = 'none';
                    produtos.style.opacity = 1;
                    btnmenu.style.opacity = .6;
                }, 1000);
            }
        }

        function addAcomp(elem) {
            classAtual = elem.getAttribute('class');
            precoAvaliado = precoAtual;

            if(classAtual.includes('pao')){
                if(elem.innerText == '80g'){
                    pao = -2;
                }

                if(elem.innerText == '120g'){
                    pao = 0;
                }

                if(elem.innerText == '160g'){
                    pao = 2;
                }
            }
            if(classAtual.includes('bebida')){
                if(elem.innerText == 'Sim'){
                    bebida = 3;
                }

                if(elem.innerText == 'Não'){
                    bebida = 0;
                }
            }
            if(classAtual.includes('batata')){
                if(elem.innerText == 'Sim'){
                    batata = 3;
                }

                if(elem.innerText == 'Não'){
                    batata = 0;
                }
            }
            console.log('precoAvaliado: '+precoAvaliado);

            precoFinal = precoAvaliado + pao + bebida + batata;
            console.log(precoFinal);

            // atribuir perco final ao precoAvaliado
            document.querySelector('.detalhes-container2>.detalhes>.detalhes-descricao>.precoAvaliado').innerText = "R$ " + precoFinal.toFixed(2).replace('.',',');

            document.querySelectorAll('.' + classAtual).forEach(function(item) {
                item.classList.remove('ativo');
            })
            elem.classList.add('ativo');
        }

        function pedir(produto) {
            if (produto == 0) {
                alert("Ingredientes insulficientes!");
            } else {
                $.ajax({
                    url: "php/pedido.php",
                    type: "POST",
                    data: {
                        produto: produto
                    },
                    success: function(data) {
                        alert(data);
                        location.reload();
                    }
                });
            }
        }

        function concluir() {
            $.ajax({
                url: "php/pedido.php",
                type: "POST",
                data: {
                    concluir: 1
                },
                success: function(data) {
                    alert(data);
                    location.reload();
                }
            });
        }

        function cancelar() {
            $.ajax({
                url: "php/pedido.php",
                type: "POST",
                data: {
                    cancelar: 1
                },
                success: function(data) {
                    alert(data);
                    location.reload();
                }
            })
        }
    </script>
</body>