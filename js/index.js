var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
});

var popover = new bootstrap.Popover(document.querySelector('.popover-bird'), {
    container: 'body'
});

$("input[data-type='currency']").on({
    keyup: function () {
        formatCurrency($(this));
    },
    blur: function () {
        formatCurrency($(this), "blur");
    }
});

$('.tempo-ganho-investimento').hide();

$(document).ready(function () {
    $('#data').val(formatDate(new Date().toDateString()));
}).on('click', '#calcular', async function () {
    await Calcular();
}).on('input', '#valor_investir', function () {
    $('#converter-investimento-moeda').text('');
    let valor = $(this).val().replaceAll(',', '');
    let moedas = ConverterDollarEmMoedas(valor);

    if (moedas)
        $('#converter-investimento-moeda').text(moedas + ' Moedas');

    calcularNumeroPassarosPorInvestimento(valor);
}).on('change ', '#calcular_investimento', function () {
    $('#converter-investimento-moeda').text('');
    if (this.checked) {
        $('#valor_investir').prop('disabled', true);
        $('#valor_investir').val('0,00');
        $('.tempo-ganho-investimento').show();
    } else {
        $('#valor_investir').prop('disabled', false);
        $('.tempo-ganho-investimento').hide();
    }
});

var calculando = false;
async function Calcular() {

    if (calculando) return;

    var dados = {
        valor: parseFloat($('#valor_investir').val().replaceAll(',', '')),
        ganho: parseFloat($('#ganho').val().replaceAll(',', '')),
        tempo: $('#tempo').val(),
        tipoTempo: $('#tipo_tempo').val(),
        troca: $('#trocar_retirada').prop("checked") ? true : false,
        calcular_investimento: $('#calcular_investimento').prop("checked") ? true : false,
        tempo_ganho_investimento: $('#tempo_ganho_investimento').val(),
        data: $('#data').val(),
        passaros_em_stock: {
            bege: parseInt($("#bege_comprado").val()),
            verde: parseInt($("#verde_comprado").val()),
            amarelo: parseInt($("#amarelo_comprado").val()),
            castanho: parseInt($("#castanho_comprado").val()),
            azul: parseInt($("#azul_comprado").val()),
            vermelho: parseInt($("#vermelho_comprado").val()),
            rei: parseInt($("#rei_comprado").val()),
            especial: parseInt($("#especial_comprado").val())
        },
    };

    if (!validar(dados)) return;

    calculando = true;
    let resultado = [];
    if (dados.calcular_investimento) {
        resultado = await calcularInvestimento(dados);
    } else {
        resultado = await calcularGanhos(dados);
    }


    console.log(resultado);

    // listarPassaros(resultado_acumulado);
    calculando = false;
    // Removendo o LOADING
    // $('#carregar').html("");
}

async function calcularGanhos(dados) {
    return new Promise(resolve => {
        let ganhos_total = 0;
        let resultado_acumulado = [];
        while (parseFloat(ganhos_total) < parseFloat(dados.ganho)) {
            var resultado = calcularMenorTempoGanho(dados);
            resultado_acumulado.push(resultado);

            dados.valor = 0;
            dados.ganho = $('#ganho').val();
            dados.tempo = $('#tempo').val();
            dados.tipoTempo = $('#tipo_tempo').val();
            dados.troca = $('#trocar_retirada').prop("checked") ? true : false;
            dados.data = resultado[resultado.length - 1].data;
            dados.passaros_em_stock.bege = resultado[resultado.length - 1].bege;
            dados.passaros_em_stock.verde = resultado[resultado.length - 1].verde;
            dados.passaros_em_stock.amarelo = resultado[resultado.length - 1].amarelo;
            dados.passaros_em_stock.castanho = resultado[resultado.length - 1].castanho;
            dados.passaros_em_stock.azul = resultado[resultado.length - 1].azul;
            dados.passaros_em_stock.vermelho = resultado[resultado.length - 1].vermelho;
            dados.passaros_em_stock.rei = resultado[resultado.length - 1].rei;
            dados.passaros_em_stock.especial = resultado[resultado.length - 1].especial;

            ganhos_total = resultado[resultado.length - 1].usd;
        };

        return resolve(resultado_acumulado);
    });
}

async function calcularInvestimento(dados) {
    return new Promise(resolve => {


        return resolve(dados);

    });
}

function calcularMenorTempoGanho(dados) {
    let resultrado_guaddado = [];
    for (let index = 1; index <= 31; index++) {
        var resultado = CalcularLucro(dados.valor, dados.ganho, index, dados.tipoTempo, dados.troca, dados.data, dados.passaros_em_stock);

        resultrado_guaddado.push({
            'cada_dia': index,
            'total_dias': resultado[resultado.length - 1]['dia'],
            'resultado': resultado
        });

    }

    var menor_dia = resultrado_guaddado.reduce(function (a, b) {
        return a.total_dias < b.total_dias ? a : b;
    });

    var menor_resultado = proximoDiaCompra(menor_dia.cada_dia + 1, menor_dia.resultado);
    return menor_resultado;
}

function proximoDiaCompra(dia_compra, passaros) {
    let passaros_comprados = [];
    $(passaros).each(function (index, passaro) {
        if (dia_compra >= passaro.dia) {
            passaros_comprados.push(passaro);
            return true;
        }
        return false;
    });
    return passaros_comprados;
}

function validar(dados) {
    $('.is-invalid').removeClass('is-invalid');

    let valido = true;
    let calcular_investimento_ganho = $('#calcular_investimento').prop("checked") ? true : false
    if (!calcular_investimento_ganho) {
        if (parseFloat(dados.valor) == 0 && !ExistePassarosEmStock(dados.passaros_em_stock)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Não pode fazer nenhum cálculo se não possui pássaros, ou não definir um valor de investimento inicial.!',
            });
            valido = false;
        }
    } else {
        if (parseInt(dados.tempo_ganho_investimento) == 0) {
            $('#tempo_ganho_investimento').addClass('is-invalid');
            valido = false;
        }
    }

    if (parseFloat(dados.ganho) == 0) {
        $('#ganho').addClass('is-invalid');
        valido = false;
    }

    // if (dados.tempo == 0) {
    //     $('#tempo').addClass('is-invalid');
    //     valido = false;
    // }

    return valido;
}

function calcularNumeroPassarosPorInvestimento(investimento) {
    limparaQuantidadePassarosInvetimento();
    if (!investimento) return;

    let passaros = ComprarPassaros(moedas);
    $(passaros).each(function (index, element) {
        let key = Object.keys(element)[0];
        let value = element[key];
        QuantidadePassarosInvestimento(key, value.qtd);
    });
}

function QuantidadePassarosInvestimento(passaro, qtd) {
    if (passaro == 'bege')
        $('#investimento-bege').text(qtd);

    if (passaro == 'verde')
        $('#investimento-verde').text(qtd);

    if (passaro == 'amarelo')
        $('#investimento-amarelo').text(qtd);

    if (passaro == 'castanho')
        $('#investimento-castanho').text(qtd);

    if (passaro == 'azul')
        $('#investimento-azul').text(qtd);

    if (passaro == 'vermelho')
        $('#investimento-vermelho').text(qtd);

    if (passaro == 'rei')
        $('#investimento-rei').text(qtd);

    if (passaro == 'especial')
        $('#investimento-especial').text(qtd);
}

function limparaQuantidadePassarosInvetimento() {
    QuantidadePassarosInvestimento('bege', 0);
    QuantidadePassarosInvestimento('verde', 0);
    QuantidadePassarosInvestimento('amarelo', 0);
    QuantidadePassarosInvestimento('castanho', 0);
    QuantidadePassarosInvestimento('azul', 0);
    QuantidadePassarosInvestimento('vermelho', 0);
    QuantidadePassarosInvestimento('rei', 0);
    QuantidadePassarosInvestimento('especial', 0);
}

function botaoEsperar(esperar = true) {
    if (esperar) {
        $('#calcular').prop('disabled', true);
        $('#calcular').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
        $('#calcular').text('Calculando...');
    } else {
        $('#calcular').prop('disabled', false);
        $('#calcular').html('Calcular');
    }
}

function listarPassaros(data) {

    $("#tbody").html("");

    let dia = 0;
    let negritar = false;
    $(data).each(function (index, resultado) {

        $(resultado).each(function (index, value) {
            dia++;
            negritar = resultado.length - 1 == index ? true : false;
            var row =
                "<tr " + (negritar ? 'class="negrito"' : '') + ">" +
                "<td scope='row'>" + dia + "</td>" +
                "<td scope='row'>" + value.dia + "</td>" +
                "<td style='width:100px'>" + value.data + "</td>" +
                "<td>" + value.bege + "</td>" +
                "<td>" + value.verde + "</td>" +
                "<td>" + value.amarelo + "</td>" +
                "<td>" + value.castanho + "</td>" +
                "<td>" + value.azul + "</td>" +
                "<td>" + value.vermelho + "</td>" +
                "<td>" + value.rei + "</td>" +
                "<td>" + value.especial + "</td>" +
                "<td>" + value.total + "</td>" +
                "<td>" + value.md + "</td>" +
                "<td>" + value.rd + "</td>" +
                "<td>" + value.usd + "</td>" +
                "<td>" + value.euro + "</td>" +
                "<td>" + value.trocado + "</td>" +
                "<td>" + value.retirada_actual + "</td>" +
                "<td>" + value.retirada_actual_usd + "</td>" +
                "<td>" + value.cd + "</td>" +
                "<td>" + value.cdtroca + "</td>" +
                "</tr>";

            $("#tbody").append(row);

            negritar = false;
        });
    });


}

function Listar() {
    $.each(passaros, function (index, value) {
        var dados = {
            "passaro": index,
            "mh": value.mh,
            "custo": value.custo,
            "img": value.img
        };
        var template = $('#template').html();
        $("#passaros").append(Mustache.render(template, dados));
    });
}