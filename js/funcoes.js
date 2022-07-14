const passaros = {
    "bege": { "mh": 1, "custo": 35.00, "cor": '#AD9079', "img": 'images/bege.png' },
    "verde": { "mh": 5, "custo": 150.00, "cor": '#447E3C', "img": 'images/verde.png' },
    "amarelo": { "mh": 55, "custo": 1500.00, "cor": '#E8B621', "img": 'images/amarelo.png' },
    "castanho": { "mh": 277, "custo": 7500.00, "cor": '#321914', "img": 'images/castanho.png' },
    "azul": { "mh": 1430, "custo": 37500.00, "cor": '#406EAC', "img": 'images/azul.png' },
    "vermelho": { "mh": 7230, "custo": 150000.00, "cor": '#D54751', "img": 'images/vermelho.png' },
    "rei": { "mh": 21925, "custo": 375000.00, "cor": '#5C4788', "img": 'images/rei.png' },
    "especial": { "mh": 0, "custo": 0, "cor": '#B6B0B0', "img": 'images/especial.jpg' }
};

const percentagem_retirada = 0.30,
    percentagem_compra = 0.70,
    moedas_por_dollar = 8265,
    percentagem_troca = 0.20,
    valor_minimo_compra = 35,
    minimo_troca_retirada = 100;

function ConverterMoedasPorDollar(usd) {
    moedas = moedas_por_dollar * usd;
    return Math.round(moedas, 0);
}

function E_Passaro(passaro) {
    var e_passaro = false;
    $.each(passaros, function (index, value) {
        if (index == passaro) {
            e_passaro = true;
            return;
        }
    });

    return e_passaro;
}

function CalcularMoedasPorPassaro(passaro, qtd, tipo_tempo = 'hora', qtd_tempo = 1) {
    if (!E_Passaro(passaro)) return 0;

    moedas = passaros[passaro]["mh"] * qtd;

    if (tipo_tempo == 'hora') {
        resultado = moedas * qtd_tempo;
    } else {
        resultado = moedas * qtd_tempo * 24;
    }

    return Math.round(resultado, 0);
}


function CalcularCompraPorHora(moeda, hora) {
    compra = (moeda * hora * percentagem_compra) / 100;
    return Math.round(compra, 2);
}

function CalcularCompraPorDia(moeda, dia) {
    hora = 24 * dia;

    return Math.round(CalcularCompraPorHora(moeda, hora), 2);
}

function CalcularCompraPorPassaro(passaro, qtd, tipo_tempo = 'hora', qtd_tempo = 1) {
    if (!E_Passaro(passaro)) return 0;

    moedas = passaros[passaro]["mh"] * qtd;

    if (tipo_tempo == 'hora') {
        resultado = CalcularCompraPorHora(moedas, qtd_tempo);
    } else {
        resultado = CalcularCompraPorDia(moedas, qtd_tempo);
    }

    return Math.round(resultado, 2);
}

function CalcularRetiradaPorPassaro(passaro, qtd, tipo_tempo = 'hora', qtd_tempo = 1) {
    if (!E_Passaro(passaro)) return 0;

    moedas = passaros[passaro]["mh"] * qtd;

    if (tipo_tempo == 'hora') {
        resultado = CalcularRetiradaPorHora(moedas, qtd_tempo);
    } else {
        resultado = CalcularRetiradaPorDia(moedas, qtd_tempo);
    }

    return Math.round(resultado, 2);
}

function CalcularRetiradaPorHora(moeda, hora) {
    compra = (moeda * hora * percentagem_retirada) / 100;
    return Math.round(compra, 2);
}

function CalcularRetiradaPorDia(moeda, dia) {
    hora = 24 * dia;
    return Math.round(CalcularRetiradaPorHora(moeda, hora), 2);
}

function CalcularRetiradaUSD(moeda) {
    resultado = (moeda * 0.12) / 1000;
    return currency(resultado);
}

function CalcularRetiradaEURO(moeda) {
    resultado = (moeda * 0.1) / 1000;
    return currency(resultado);
}

function CalcularLucro(valor_investir, ganho, qtd_tempo = 1, tipo_tempo = 'hora', trocar_retirada = false, data = new Date, passaros_em_stock = {}) {

    var tempo = 0,
        moedas_compra = ConverterMoedasPorDollar(valor_investir),
        retirada_usd = 0,
        passaros_comprados = {},
        tempo_investimento = qtd_tempo,
        resultado = [],
        compra_acumulada = moedas_compra,
        retidada_acumulada = 0,
        _data = new Date;

    if (ExistePassarosEmStock(passaros_em_stock)) {
        passaros_comprados[tempo] = CalcularValorPassaros(passaros_em_stock);
        if (moedas_compra < valor_minimo_compra) tempo_investimento = 0;
    }



    while (retirada_usd < ganho) {

        if (passaros_comprados.length <= 0 && moedas_compra < valor_minimo_compra) return resultado;

        if (moedas_compra >= valor_minimo_compra && tempo_investimento == qtd_tempo) {
            passaros_comprados[tempo] = ComprarPassaros(moedas_compra);
            tempo_investimento = 0;
            compra_acumulada -= Math.trunc(moedas_compra);
            compra_acumulada += passaros_comprados[tempo]["saldo_total"];
        }

        ganhos = CalcularGanhos(passaros_comprados, trocar_retirada, tipo_tempo);
        retirada_usd = ganhos['usd_' + tipo_tempo];

        tempo++;
        tempo_investimento++;

        compra_acumulada += ganhos["compra_acumulada"];
        retidada_acumulada += ganhos["retidada_acumulada"];

        if (trocar_retirada && retidada_acumulada >= minimo_troca_retirada) {
            troca_retirada = TrocarRetiradaPorCompra(retidada_acumulada, trocar_retirada);
            retidada_acumulada -= Math.trunc(retidada_acumulada);
            compra_acumulada += troca_retirada["compra"];
            ganhos["trocado"] = troca_retirada["trocado"];
        } else {
            retidada_acumulada += ganhos["saldo_retirada"];
        }

        ganhos["compra_acumulada"] = compra_acumulada;
        ganhos["retidada_acumulada"] = Math.round(retidada_acumulada, 2);
        ganhos["compra_retirada"] = compra_acumulada;
        moedas_compra = compra_acumulada;

        dataActual = new Date(data);
        _data = dataActual.setDate(dataActual.getDate() + tempo);

        resultado.push({
            'dia': tempo,
            'data': formatDate(_data),
            'bege': ganhos["passaros"]['bege'],
            'verde': ganhos["passaros"]['verde'],
            'amarelo': ganhos["passaros"]['amarelo'],
            'castanho': ganhos["passaros"]['castanho'],
            'azul': ganhos["passaros"]['azul'],
            'vermelho': ganhos["passaros"]['vermelho'],
            'rei': ganhos["passaros"]['rei'],
            'especial': ganhos["passaros"]['especial'],
            'total': ganhos["passaros"]['total_passaros'],
            'md': currency(ganhos['moedas_' + tipo_tempo]),
            'rd': currency(ganhos['retidada_' + tipo_tempo]),
            'usd': currency(ganhos['usd_' + tipo_tempo]),
            'euro': ganhos['euro_' + tipo_tempo],
            'trocado': ganhos['trocado'],
            'retirada_actual': ganhos['retidada_acumulada'],
            'retirada_actual_usd': CalcularRetiradaUSD(ganhos['retidada_acumulada']),
            'cd': currency(ganhos['compra_' + tipo_tempo]),
            'cdtroca': currency(ganhos['compra_retirada'])
        });
    }

    return resultado;
}

function CalcularGanhos(passaros, trocar_retirada = false, tipo_tempo = "hora") {
    _moedas_compra = 0;
    _moedas_retirada = 0;
    total_moedas = 0;
    total_passaros = TotalizarPassarosComprados(passaros);

    $.each(total_passaros, function (passaro, qtd) {
        if (!E_Passaro(passaro)) return;
        _moedas_compra += CalcularCompraPorPassaro(passaro, qtd, tipo_tempo);
        _moedas_retirada += CalcularRetiradaPorPassaro(passaro, qtd, tipo_tempo);
        total_moedas += CalcularMoedasPorPassaro(passaro, qtd, tipo_tempo);
    });

    retirada_usd = CalcularRetiradaUSD(_moedas_retirada);
    retirada_euro = CalcularRetiradaEURO(_moedas_retirada);
    troca_retirada = TrocarRetiradaPorCompra(_moedas_retirada, trocar_retirada);
    compra_acumulada = _moedas_compra;
    retidada_acumulada = _moedas_retirada + troca_retirada["saldo_retirada"];
    compra_retirada = (compra_acumulada + troca_retirada["compra"]);

    var moedas_tempo = "moedas_" + tipo_tempo,
        compra_tempo = "compra_" + tipo_tempo,
        retirada_tempo = "retidada_" + tipo_tempo,
        usd_tempo = "usd_" + tipo_tempo,
        euro_tempo = "euro_" + tipo_tempo;

    var resultado = {
        "passaros": total_passaros,
        [moedas_tempo]: total_moedas,
        "tempo": tipo_tempo,
        [compra_tempo]: _moedas_compra,
        [retirada_tempo]: _moedas_retirada,
        [usd_tempo]: retirada_usd,
        [euro_tempo]: retirada_euro,
        "saldo_retirada": troca_retirada["saldo_retirada"],
        "saldo_compra": total_passaros['total_saldo'],
        "compra_acumulada": compra_acumulada,
        "retidada_acumulada": retidada_acumulada,
        "trocado": troca_retirada["trocado"],
        "compra_retirada": compra_retirada
    };

    return resultado;
}

function ComprarPassaros(moedas) {
    saldo = moedas;
    _passaros = ["bege", "verde", "amarelo", "castanho", "azul", "vermelho", "rei", "especial"];
    passaros_comprados = [];

    for (i = _passaros.length - 1; i >= 0; i--) {
        custo = passaros[_passaros[i]]['custo'];
        if (custo <= 0) continue;

        saldo_anterior = saldo;
        qtd = Math.trunc(saldo / custo);
        if (qtd <= 0) continue;

        total = (custo * qtd);
        saldo -= total;

        passaros_comprados.push({
            [_passaros[i]]: {
                "moedas": saldo_anterior,
                "qtd": qtd,
                "custo": custo,
                "total": total,
                "saldo": saldo
            }
        });
    }

    passaros_comprados["saldo_total"] = saldo;

    return passaros_comprados;
}

function CalcularValorPassaros(_passaros) {
    var passaros_comprados = [];

    $.each(Object.keys(_passaros), function (index, passaro) {
        custo = passaros[passaro]['custo'];
        qtd = _passaros[passaro];

        if (custo <= 0 || qtd <= 0) return;
        total = (custo * qtd);

        passaros_comprados.push({
            [passaro]: {
                "moedas": 0,
                "qtd": qtd,
                "custo": custo,
                "total": total,
                "saldo": 0
            }
        });
    });

    return passaros_comprados;
}

function TotalizarPassarosComprados(passaros) {
    total_passaros = {
        "bege": 0,
        "verde": 0,
        "amarelo": 0,
        "castanho": 0,
        "azul": 0,
        "vermelho": 0,
        "rei": 0,
        "especial": 0,
        "total_passaros": 0,
        "total_saldo": 0.0
    };

    saldo = 0.0;

    $.each(passaros, function (index, value) {
        $.each(value, function (_dia, _passaros) {
            $.each(_passaros, function (passaro, qtd) {
                if (!E_Passaro(passaro)) return;
                total_passaros[passaro] += qtd["qtd"];
                total_passaros["total_passaros"] += qtd["qtd"];
                saldo = qtd["saldo"];
            });
            total_passaros["total_saldo"] += saldo;
        });
    });

    return total_passaros;
}

function TrocarRetiradaPorCompra(retirada, activo = false) {
    var resultado = { "compra": 0, "saldo_retirada": 0, "trocado": 'NÃO' };

    if (activo && retirada >= minimo_troca_retirada) {
        resultado["compra"] = retirada + (retirada * percentagem_troca);
        resultado["saldo_retirada"] = Math.round(retirada - Math.trunc(retirada, 2));
        resultado["trocado"] = 'SIM';
    }

    return resultado;
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}

function ExistePassarosEmStock(passaros_em_stock = {}) {
    var passaros = Object.keys(passaros_em_stock);
    var contar = 0;
    var exite = true;
    if (passaros.length == 0) return false;

    $(passaros).each(function (index, value) {
        if (passaros_em_stock[value] <= 0) {
            contar++;
        } else {
            exite = true;
            return;
        }

        if (passaros.length == contar) {
            exite = false;
            return;
        };
    });

    return exite;
}