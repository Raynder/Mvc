var totalPedidos;

function listarMesas() {
    $.ajax({
        url: url + 'recepcao/listarMesas',
        type: 'GET',
        success: function(data) {
            $('.listapedido>#mesas').html(data);
            //contar quantos itemCarrinho tem em data
            novoTotalPedidos = $('.listapedido>#mesas>.produtos>.itemCarrinho').length;
            if (novoTotalPedidos > totalPedidos) {
                play()
            }
            totalPedidos = novoTotalPedidos;
        }
    });
}

function removerMesa(mesa) {
    $.ajax({
        url: url + 'recepcao/removerMesa',
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
        url: url + 'recepcao/imprimir',
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
$('#recepcao>.menu>.submenu>span').each(function() {
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