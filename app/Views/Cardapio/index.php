<?php
$total = 0;
?>
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
            <span onclick="abrirCarrinho()" id="concluir">
                <p>Concluir</p>
                <h1 class="valorTotal">R$0,00</h1>
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

<div class="carrinho">
    <div class="close" onclick="closePag()">
        <p>X</p>
    </div>
    <?php
    if (isset($dados['carrinho']) && count($dados['carrinho']) > 0) {
        $produtos = $dados['carrinho'];
        $total = 0;
        $contadorCarrinho = 0;
        echo ('<div class="produtos"><h2 style="padding: 5px;">Carrinho</h2>');
        foreach ($produtos as $produto) {
            echo ('<div class="itemCarrinho">');
            echo ('<p>' . $produto['pedido'] . '<span class="remover" onclick="removerCarrinho(' . $contadorCarrinho . ')">X</span></p>');
            echo ('</div>');
            $total += $produto['valor'];
            $contadorCarrinho++;
        }
        echo ('</div>');
        echo ("<script>setTimeout(function(){abrirCarrinho()},2000);</script>");
    }
    $total = number_format($total, 2, ',', '.');

    echo ("<div style='display: flex;justify-content: space-around;margin-top:10px;'>");
    echo ("<p class='precoAvaliado'>R$$total</p>");
    echo ("<button class='btn-detalhes' onclick='enviarPedido()'>Finalizar</button>");
    echo ("</div>");

    echo ("<script>document.querySelectorAll('.valorTotal').forEach(function(e){e.innerHTML = 'R$" . $total . "';});</script>");
    ?>

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
    .bg-container {
        background-image: url("<?= DIST ?>img/bg.jpg");
    }
</style>