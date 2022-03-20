var criterios = 0;
var split = 0;
var entao = 0;
var campoAlvo;
var url = '192.168.1.8/';

function escreve(code, valor) {
    criterios++;
    if (entao == 1) {
        campoAlvo = code
        entao = 0
    }

    var exemplo = getExemplo();
    var regra = getRegra();

    setExemplo(exemplo + ' ' + valor);
    setRegra(regra + code);

    if (valor == "Então") {
        entao = 1;
    }
}

function envia(incremento = '') {
    if (entao == 1) {
        campoAlvo = code
        entao = 0
    }

    var vari = document.getElementById('valor').value;
    var regra = getRegra();
    var exemplo = getExemplo();

    setExemplo(exemplo + ' ' + vari);
    setRegra(regra + "'" + vari + incremento + "'");

    if (split) {
        setRegra(getRegra() + "') > 0");
        split = 0;
    }
}

function limpa() {
    setExemplo('');
    setRegra('');
    console.log(criterios);
}

function salvarRegra() {
    var regra = getRegra() + ";}";
    $.ajax({
        url: "<?=URL?>formPreco/salvarRegras",
        type: "POST",
        data: {
            regra: regra,
            campoAlvo: campoAlvo,
            criterios: criterios
        },
        success: function(data) {
            console.log(data);
        }
    })
}

function getRegra() {
    return document.getElementById('regra').value;
}

function getExemplo() {
    return document.getElementById('exemplo').value;
}

function setRegra(regra) {
    document.getElementById('regra').value = regra;
}

function setExemplo(exemplo) {
    document.getElementById('exemplo').value = exemplo;
}

function mudarFornecedor() {
    var fornecedor = $('#fornecedor').val();
    $('#fornecedortext').text(fornecedor);
}

function atualizar() {
    preco_do_produto = doc.querySelector('#precodoproduto');
    redutor = doc.querySelector('#redutor');
    repasse = doc.querySelector('#repasse');
    desconto = doc.querySelector('#desconto');
    despesas = doc.querySelector('#despesas');
    pis_cofins_importacao = doc.querySelector('#pis-cofins-importacao');
    pis_cofins_credito = doc.querySelector('#pis-cofins-credito');
    ipi = doc.querySelector('#ipi');
    ii = doc.querySelector('#ii');
    frete = doc.querySelector('#frete');
    credito_icms = doc.querySelector('#credito-icms');
    difal_entrada = doc.querySelector('#difal-entrada');
    icms_st = doc.querySelector('#icms-st');
    preco_da_compra = doc.querySelector('#preco-da-compra');
    preco_de_custo = doc.querySelector('#preco-de-custo');

    // Saidas
    icms_saida = doc.querySelector('#icms-saida');
    difal_fecp_saida = doc.querySelector('#difal-fecp-saida');
    icms_st_efetivo = doc.querySelector('#icms-st-efetivo');
    impostos_federais = doc.querySelector('#impostos-federais');
    desconto_concedido = doc.querySelector('#desconto-concedido');
    pis_cofins_debito = doc.querySelector('#pis-cofins-debito');
    ipi_saida = doc.querySelector('#ipi_saida');
    taxa = doc.querySelector('#taxa');
    comissao = doc.querySelector('#comissao');
    frete_saida = doc.querySelector('#frete_saida');
    custo_fixo = doc.querySelector('#custo-fixo');
    margem_calculada = doc.querySelector('#margem-calculada');
    preco_venda_informado = doc.querySelector('#preco-venda-informado');
    lucro_projetado = doc.querySelector('#lucro-projetado');
    carga_tributaria = doc.querySelector('#carga-tributaria');

    preco_do_produto_v = parseFloat(preco_do_produto.value.replace(".", ""))
    redutor_v = parseFloat(redutor.value.replace("%", ""))
    repasse_v = parseFloat(repasse.value.replace("%", ""))
    desconto_v = parseFloat(desconto.value.replace("%", ""))
    despesas_v = parseFloat(despesas.value.replace(".", ""))
    pis_cofins_importacao_v = parseFloat(pis_cofins_importacao.value.replace("%", ""))
    pis_cofins_credito_v = parseFloat(pis_cofins_credito.value.replace("%", ""))
    ipi_v = parseFloat(ipi.value.replace("%", ""))
    ii_v = parseFloat(ii.value.replace("%", ""))
    frete_v = parseFloat(frete.value.replace("%", ""))
    credito_icms_v = parseFloat(credito_icms.value.replace("%", ""))
    difal_entrada_v = parseFloat(difal_entrada.value.replace("%", ""))
    icms_st_v = parseFloat(icms_st.value.replace("%", ""))
    preco_da_compra_v = parseFloat(preco_da_compra.value.replace(".", ""))
    preco_de_custo_v = parseFloat(preco_de_custo.value.replace(".", ""))

    temp = preco_do_produto_v - (preco_do_produto_v * (redutor_v / 100));
    preco_de_custo.value = temp.toFixed(2);
    temp = temp - (temp * (repasse_v / 100));
    preco_de_custo.value = temp.toFixed(2);
    temp = temp - (temp * (desconto_v / 100));
    preco_de_custo.value = temp.toFixed(2);
    temp = temp + despesas_v;
    preco_de_custo.value = temp.toFixed(2);
    temp = temp + (temp * (pis_cofins_importacao_v / 100));
    preco_de_custo.value = temp.toFixed(2);
    temp = temp + (temp * (pis_cofins_credito_v / 100));
    preco_de_custo.value = temp.toFixed(2);
    temp = temp + (temp * (ipi_v / 100));
    preco_de_custo.value = temp.toFixed(2);
    temp = temp + (temp * (ii_v / 100));
    preco_de_custo.value = temp.toFixed(2);
    temp = temp + (temp * (frete_v / 100));
    preco_de_custo.value = temp.toFixed(2);
    temp = temp - (temp * (credito_icms_v / 100));
    preco_de_custo.value = temp.toFixed(2);
    temp = temp + (temp * (difal_entrada_v / 100));
    preco_de_custo.value = temp.toFixed(2);
    temp = temp + (temp * (icms_st_v / 100));
    preco_de_custo.value = temp.toFixed(2);


}


$(document).ready(function() {
    $("#autoWidth").lightSlider({
        autoWidth: true,
        loop: true,
        onSliderLoad: function() {
            $('autoWidth').removeClass('cS-hidden');
        }
    });
});