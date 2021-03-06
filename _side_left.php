<div class="col-sm-12 col-md-4 col-lg-4 mb-5">
    <div class="s-bk-lf">
        <div class="titulo-moldura titulo-menu">Pássaros</div>
    </div>

    <div class="lado-esquerdo">
        <div class="menu-header mt-3 mb-3 ml-5 mr-5">
            Você já comprou: <b><span id="passaro-total">0</span></b> pássaros
            <br>
            Saldo (compras): <b><span id="saldo-compra-total">0</span></b> moedas de ouro em 24h.
            <br>
            Saldo (saques): <b><span id="saldo-retirada-total">0</span></b> barras de ouro em 24h.
        </div>

        <div class="row justify-content-center">
            <div class="col-12 row justify-content-center mb-3">
                <div class="col-sm-5 block_pot">
                    <div class="block_img_pot">
                        <img src="images/bege.png" alt="">
                    </div>
                    <div class="bird-title"><b>Bege</b></div>
                    <div class="bird-descricao">
                        <p>Produtividade: <b><?= $begeComprado['moeda_hora']; ?> por hora</b></p>
                        <p>Comprado: <b class="stock_azul"><?= $begeComprado['comprado']; ?></b></p>
                    </div>
                </div>
                <div class="col-sm-5 block_pot">
                    <div class="block_img_pot">
                        <img src="images/verde.png" alt="">
                    </div>
                    <div class="bird-title"><b>Verde</b></div>
                    <div class="bird-descricao">
                        <p>Produtividade: <b><?= $verdeComprado['moeda_hora']; ?> por hora</b></p>
                        <p>Comprado: <b class="stock_azul"><?= $verdeComprado['comprado']; ?></b></p>
                    </div>
                </div>
                <div class="col-sm-5 block_pot">
                    <div class="block_img_pot">
                        <img src="images/amarelo.png" alt="">
                    </div>
                    <div class="bird-title"><b>Amarelo</b></div>
                    <div class="bird-descricao">
                        <p>Produtividade: <b><?= $amareloComprado['moeda_hora']; ?> por hora</b></p>
                        <p>Comprado: <b class="stock_azul"><?= $amareloComprado['comprado']; ?></b></p>
                    </div>
                </div>
                <div class="col-sm-5 block_pot">
                    <div class="block_img_pot">
                        <img src="images/castanho.png" alt="">
                    </div>
                    <div class="bird-title"><b>Castanho</b></div>
                    <div class="bird-descricao">
                        <p>Produtividade: <b><?= $castanhoComprado['moeda_hora']; ?> por hora</b></p>
                        <p>Comprado: <b class="stock_azul"><?= $castanhoComprado['comprado']; ?></b></p>
                    </div>
                </div>
                <div class="col-sm-5 block_pot">
                    <div class="block_img_pot">
                        <img src="images/azul.png" alt="">
                    </div>
                    <div class="bird-title"><b>Azul</b></div>
                    <div class="bird-descricao">
                        <p>Produtividade: <b><?= $azulComprado['moeda_hora']; ?> por hora</b></p>
                        <p>Comprado: <b class="stock_azul"><?= $azulComprado['comprado']; ?></b></p>
                    </div>
                </div>
                <div class="col-sm-5 block_pot">
                    <div class="block_img_pot">
                        <img src="images/vermelho.png" alt="">
                    </div>
                    <div class="bird-title"><b>Vermelho</b></div>
                    <div class="bird-descricao">
                        <p>Produtividade: <b><?= $vermelhoComprado['moeda_hora']; ?> por hora</b></p>
                        <p>Comprado: <b class="stock_azul"><?= $vermelhoComprado['comprado']; ?></b></p>
                    </div>
                </div>
                <div class="col-sm-5 block_pot">
                    <div class="block_img_pot">
                        <img src="images/rei.png" alt="">
                    </div>
                    <div class="bird-title"><b>Rei</b></div>
                    <div class="bird-descricao">
                        <p>Produtividade: <b><?= $reiComprado['moeda_hora']; ?> por hora</b></p>
                        <p>Comprado: <b class="stock_azul"><?= $reiComprado['comprado']; ?></b></p>
                    </div>
                </div>
                <div class="col-sm-5 block_pot">
                    <div class="block_img_pot">
                        <img src="images/especial.png" alt="">
                    </div>
                    <div class="bird-title"><b>Especial</b></div>
                    <div class="bird-descricao">
                        <p>Produtividade: <b><?= $especialComprado['moeda_hora']; ?> por hora</b></p>
                        <p>Comprado: <b class="stock_azul"><?= $especialComprado['comprado']; ?></b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>