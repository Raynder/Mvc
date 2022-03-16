var pag = 1;
var precoAtual = 0;
var tamanho = 0;
var bebida = 0;
var batata = 0;
var respostas = {};
var pagClose = '<div class="close" onclick="closePag()"><p>X</p></div>';

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

function closePag() {
    document.querySelectorAll('.close>p').forEach((close) => {
        close.addEventListener('click', function() {
            document.querySelector('.detalhes-container').style.top = '100vh';
            document.querySelector('.detalhes-container2').style.top = '100vh';
            document.querySelector('.carrinho').style.top = '100vh';
            document.querySelector('.detalhes-container').style.top = '';
            document.querySelector('.detalhes-container2').style.top = '';
            document.querySelector('.carrinho').style.top = '';
            document.querySelector('.container').style.opacity = 1;
        }, false);
    });
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
        url: "cardapio/buscarProduto",
        type: "POST",
        data: {
            id: id
        },
        success: function(data) {
            dados = JSON.parse(data.split('[')[1].split(']')[0]);
            precoAtual = parseFloat(dados.valor.replace(',', '.'));

            dadosDescricao = dados.ingredientes.split(';');

            html2 = `<div class="detalhes">
                        <div class="detalhes-imagem">
                            <img src="` +
                url + dados.img + `" alt="">
                        </div>
                        <div class="detalhes-descricao">`

            html = `<div class="detalhes">
                        <div class="detalhes-imagem">
                            <img src="` + url + dados.img + `" alt="">
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

            if (dados.ingredientes.indexOf("Pão") != -1 || dados.ingredientes.indexOf("tamanho") != -1 || dados.ingredientes.indexOf("pão") != -1 || dados.ingredientes.indexOf("tamanho") != -1) {
                html2 += `<h2>Tamanho do pão</h2>`
                html2 += `<div style="display:flex;justify-content: space-around;">
                                    <div class="tamanho" onclick="addAcomp(this)"><p>80g</p></div>
                                    <div class="tamanho" onclick="addAcomp(this)"><p>120g</p></div>
                                    <div class="tamanho" onclick="addAcomp(this)"><p>160g</p></div>
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

            html += `</div>
                        </div>
                        <div style="display: flex;justify-content: space-around;">
                        <p class="precoAvaliado">R$ ` + dados.valor + `</p>
                        <button class="btn-detalhes" onclick="addCarrinho('` + dados.nome + `','` + dados.tipo + `')">Continuar</button>
                        </div>`;

            html2 += `</div>
                        </div>
                        <div style="display: flex;justify-content: space-around;">
                        <p class="precoAvaliado">R$ ` + dados.valor + `</p>
                        <button class="btn-detalhes" onclick="addCarrinho('` + dados.nome + `','` + dados.tipo + `')">Continuar</button>
                        </div>`;


            document.querySelector('.detalhes-container').innerHTML = pagClose + html;
            document.querySelector('.detalhes-container2').innerHTML = pagClose + html2;
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
    respostas['pedido'] = nome;
    respostas['tipo'] = tipo;

    container2 = document.querySelector('.detalhes-container2');
    // Verificar se o container 2 existe
    if (container2.innerHTML != '') {
        console.log('passo 1')
        if (container2.style.top == '') {
            console.log('passo 2')
                // Trazer o container 2 para cima
            document.querySelector('.detalhes-container').style.top = '-100vh';
            setTimeout(() => {
                document.querySelector('.detalhes-container2').style.top = '-80vh';
            }, 1000);
            return;
        }
        if (container2.style.top == '-80vh') {
            console.log('passo 3')
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


                    $.ajax({
                        url: 'cardapio/addCarrinho',
                        type: 'POST',
                        data: respostas,
                        success: function(data) {
                            dados = JSON.parse(data.split('[')[1].split(']')[0]);
                            alerta(dados['msg']);
                            setTimeout(() => {
                                document.querySelector('.swal2-confirm').addEventListener('click', function() {
                                    window.location.reload();
                                });
                            }, 1000);
                        }
                    })


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

    if (classAtual.includes('tamanho')) {
        if (elem.innerText == '80g') {
            tamanho = -2;
        }

        if (elem.innerText == '120g') {
            tamanho = 0;
        }

        if (elem.innerText == '160g') {
            tamanho = 2;
        }
    }
    if (classAtual.includes('bebida')) {
        if (elem.innerText == 'Sim') {
            bebida = 3;
        }

        if (elem.innerText == 'Não') {
            bebida = 0;
        }
    }
    if (classAtual.includes('batata')) {
        if (elem.innerText == 'Sim') {
            batata = 3;
        }

        if (elem.innerText == 'Não') {
            batata = 0;
        }
    }

    precoFinal = precoAvaliado + tamanho + bebida + batata;
    respostas['valor'] = precoFinal;

    // atribuir perco final ao precoAvaliado
    document.querySelector('.detalhes-container2>div>.precoAvaliado').innerText = "R$ " + precoFinal.toFixed(2).replace('.', ',');

    document.querySelectorAll('.' + classAtual).forEach(function(item) {
        item.classList.remove('ativo');
    })
    elem.classList.add('ativo');
}

function abrirCarrinho() {
    setTimeout(function() {
        document.querySelector('.carrinho').style.display = 'block';
        document.querySelector('.carrinho').style.top = '-170vh';
    }, 1000);
    document.querySelector('.container').style.opacity = 0;
}

function removerCarrinho(pos) {
    $.ajax({
        url: 'cardapio/removerCarrinho',
        type: 'POST',
        data: { pos: pos },
        success: function(data) {
            dados = JSON.parse(data.split('[')[1].split(']')[0]);
            alerta(dados['msg']);
            setTimeout(() => {
                document.querySelector('.swal2-confirm').addEventListener('click', function() {
                    window.location.reload();
                });
            }, 1000);
        }
    })
}

function enviarPedido() {
    $.ajax({
        url: 'cardapio/enviarPedido',
        type: 'POST',
        data: { mesa: '1' },
        success: function(data) {
            dados = JSON.parse(data.split('[')[1].split(']')[0]);
            alerta(dados['msg']);
            setTimeout(() => {
                document.querySelector('.swal2-confirm').addEventListener('click', function() {
                    window.location.reload();
                });
            }, 1000);
        }
    })
}