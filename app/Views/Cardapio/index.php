<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIT SOFT</title>
    
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    <link href="dist/css/lightslider.css" rel="stylesheet" type="text/css">

    <script src="dist/js/jquery.js"></script>
    <script src="dist/js/lightslider.js"></script>
    <script src="dist/js/js.js"></script>
</head>
<body>

<div class="container">
    <div class="barra topo">
        <a href="<?=URL?>cardapio/Combos"><H1>Combos</H1></a>
        <a href="<?=URL?>cardapio/Combinados"><H1>Combinados</H1></a>
        <a href="<?=URL?>cardapio/Gourmet"><H1>Gourmet</H1></a>
        <a href="<?=URL?>cardapio/Bebidas"><H1>Bebidas</H1></a>
    </div>

    <ul id="autoWidth" class="cs-hidden">
        <?php
        foreach($dados as $dado){
        ?>
        <li class="item-a">
            <div class="produto">
                <div class="item" >
                <h1><?=$dado['nome']?></h1>
                <div class="produto-imagem">
                        <img src="<?= DIST . '/img/' . explode('/', $dado['img'])[2] . '/' . explode('/', $dado['img'])[3] ?>" alt="" >
                    </div>
                    <div class="produto-detalhes">
                        <p>Ingredientes</p>
                        <p><?=$dado['ingredientes']?></p>
                        <p>R$ <?=$dado['valor']?></p>
                        
                    </div>
                </div>
            </div>
        </li>
        <?php
        }
        ?>
    </ul>

    <div class="barra bottom">
        <div class="funcao">
            <a href="estoque.php">
                <p>ESTOQUE</p>
            </a>
        </div>
        <div class="funcao">
            <p>R$<?=$preco?>,00</p>
        </div>
        <div onclick="cancelar()" class="funcao">
            <p>CANCELAR</p>
        </div>
        <div onclick="concluir()" class="funcao">
            <p>CONCLUIR</p>
        </div>
    </div>
</div>
    
<script>
    function pedir(produto){
        if(produto == 0){
            alert("Ingredientes insulficientes!");
        }else{
            $.ajax({
                url: "php/pedido.php",
                type: "POST",
                data: {produto: produto},
                success: function(data){
                    alert(data);
                    location.reload();
                }
            });
        }
    }
    function concluir(){
        $.ajax({
            url: "php/pedido.php",
            type: "POST",
            data: {concluir: 1},
            success: function(data){
                alert(data);
                location.reload();
            }
        });
    }
    function cancelar(){
        $.ajax({
            url: "php/pedido.php",
            type: "POST",
            data: {cancelar: 1},
            success: function(data){
                alert(data);
                location.reload();
            }
        })
    }
</script>
</body>


<style>
    *,
html,
body,
div,
span,
applet,
object,
iframe {
    color: wheat;
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
}

a {
    text-decoration: none;
    color: wheat;
}

a:hover{
    color: wheat;
    text-decoration: none;
}

.container {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.produto {
    width: 500px;
    height: 500px;
    margin: 0 auto;
}

.produto-imagem img {
    width: 100%;
    padding: 15%;
}

.produto-detalhes {
    background: rgb(0 0 0 / 70%);
    margin: 10px;
    bottom: 0;
    position: absolute;
    padding: 10px;
    border-radius: 10px;
}

.item {
    /* border: solid red 4px; */
    border-radius: 20px;
    position: relative;
    background: url('<?=DIST?>img/fundo.jpg') no-repeat;
    height: 100%;
}

h1 {
    font-size: 32pt;
    text-align: center;
    font-family: -webkit-body;
}

.barra {
    height: 10vh;
    width: 100%;
    position: absolute;
    text-align: center;
}

.barra.bottom {
    bottom: 0;
    background: #222222;
}

.barra.topo {
    top: 0;
    background: #222222;
    display: flex;
    justify-content: space-around;
}

.funcao {
    float: left;
    width: 25%;
    height: 100%;
}

.funcao p {
    top: 50%;
    position: relative;
    transform: translateY(-50%);
}

@media (max-width: 750px) {
    .produto {
        width: 400px;
        height: 350px;
        margin: auto;
    }
    .item {
        height: 100%;
        margin: 50px;
    }
    .barra.topo h1{
        font-size: 12pt;
    }
    .item h1{
        font-size: 20pt;
        padding: 10px;
    }
}

.menu {
    width: 80%;
    height: 75vh;
    margin: auto;
    background: red;
}
</style>