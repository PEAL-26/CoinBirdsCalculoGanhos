<?php $titulo = 'Cálculos'; ?>
<?php require '_header.php'; ?>

<div class="row mt-3" class="container-body">
	<!-- Left -->
	<?php include '_side_left.php'; ?>

	<!-- Right -->
	<div class="col-sm-12 col-md-8 col-lg-8 conteudo-right">
		<!-- Caular Ganhos -->
		<div class="silver-bk">
			<div class="s-bk-lf">
				<div class="titulo-moldura titulo-conteudo">Calcular Ganhos</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-sm-12 col-md-12 col-lg-6">
					<div class="card-body d-flex flex-column">
						<!-- Bege -->
						<div class="row  d-inline align-middle mb-1">
							<table class="fr-block">
								<tbody>
									<tr>
										<td>
											<img class="bird" src="images/bege.png">
										</td>
										<td>
											<div class="fr-te-gr-title">
												Bege
											</div>
											<div class="fr-te-gr">
												Produtividade: <span class="desc-produtividade-bege">1\h</span>
											</div>
											<div class="fr-te-gr">
												Custo: <span class="desc-custo-bege">35 moedas</span>
											</div>
											<div class="fr-te-gr">
												Investimento: <span class="investimento-bege">0</span>
											</div>
										</td>
										<td class="text-center">
											<div class="number-input">
												<button class="minus input-number-minus"></button>
												<input min="0" value="0" type="number" id="bege_comprado">
												<button class="plus input-number-plus"></button>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<!-- Verde -->
						<div class="row  d-inline align-middle mb-1">
							<table class="fr-block">
								<tbody>
									<tr>
										<td>
											<img class="bird" src="images/verde.png">
										</td>
										<td>
											<div class="fr-te-gr-title">
												Verde
											</div>
											<div class="fr-te-gr">
												Produtividade: <span class="desc-produtividade-verde">1\h</span>
											</div>
											<div class="fr-te-gr">
												Custo: <span class="desc-custo-verde">35 moedas</span>
											</div>
											<div class="fr-te-gr">
												Investimento: <span class="investimento-verde">0</span>
											</div>
										</td>
										<td class="text-center">
											<div class="number-input">
												<button class="minus input-number-minus"></button>
												<input min="0" value="0" type="number" id="verde_comprado">
												<button class="plus input-number-plus"></button>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<!-- Amarelo -->
						<div class="row  d-inline align-middle mb-1">
							<table class="fr-block">
								<tbody>
									<tr>
										<td>
											<img class="bird" src="images/amarelo.png">
										</td>
										<td>
											<div class="fr-te-gr-title">
												Amarelo
											</div>
											<div class="fr-te-gr">
												Produtividade: <span class="desc-produtividade-amarelo">1\h</span>
											</div>
											<div class="fr-te-gr">
												Custo: <span class="desc-custo-amarelo">35 moedas</span>
											</div>
											<div class="fr-te-gr">
												Investimento: <span class="investimento-amarelo">0</span>
											</div>
										</td>
										<td class="text-center">
											<div class="number-input">
												<button class="minus input-number-minus"></button>
												<input min="0" value="0" type="number" id="amarelo_comprado">
												<button class="plus input-number-plus"></button>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<!-- Castanho -->
						<div class="row  d-inline align-middle mb-1">
							<table class="fr-block">
								<tbody>
									<tr>
										<td>
											<img class="bird" src="images/castanho.png">
										</td>
										<td>
											<div class="fr-te-gr-title">
												Castanho
											</div>
											<div class="fr-te-gr">
												Produtividade: <span class="desc-produtividade-castanho">1\h</span>
											</div>
											<div class="fr-te-gr">
												Custo: <span class="desc-custo-castanho">35 moedas</span>
											</div>
											<div class="fr-te-gr">
												Investimento: <span class="investimento-castanho">0</span>
											</div>
										</td>
										<td class="text-center">
											<div class="number-input">
												<button class="minus input-number-minus"></button>
												<input min="0" value="0" type="number" id="castanho_comprado">
												<button class="plus input-number-plus"></button>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<!-- Azul -->
						<div class="row  d-inline align-middle mb-1">
							<table class="fr-block">
								<tbody>
									<tr>
										<td>
											<img class="bird" src="images/azul.png">
										</td>
										<td>
											<div class="fr-te-gr-title">
												Azul
											</div>
											<div class="fr-te-gr">
												Produtividade: <span class="desc-produtividade-azul">1\h</span>
											</div>
											<div class="fr-te-gr">
												Custo: <span class="desc-custo-azul">35 moedas</span>
											</div>
											<div class="fr-te-gr">
												Investimento: <span class="investimento-azul">0</span>
											</div>
										</td>
										<td class="text-center">
											<div class="number-input">
												<button class="minus input-number-minus"></button>
												<input min="0" value="0" type="number" id="azul_comprado">
												<button class="plus input-number-plus"></button>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<!-- Vermelho -->
						<div class="row  d-inline align-middle mb-1">
							<table class="fr-block">
								<tbody>
									<tr>
										<td>
											<img class="bird" src="images/vermelho.png">
										</td>
										<td>
											<div class="fr-te-gr-title">
												Vermelho
											</div>
											<div class="fr-te-gr">
												Produtividade: <span class="desc-produtividade-vermelho">1\h</span>
											</div>
											<div class="fr-te-gr">
												Custo: <span class="desc-custo-vermelho">35 moedas</span>
											</div>
											<div class="fr-te-gr">
												Investimento: <span class="investimento-vermelho">0</span>
											</div>
										</td>
										<td class="text-center">
											<div class="number-input">
												<button class="minus input-number-minus"></button>
												<input min="0" value="0" type="number" id="vermelho_comprado">
												<button class="plus input-number-plus"></button>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<!-- Rei -->
						<div class="row  d-inline align-middle mb-1">
							<table class="fr-block">
								<tbody>
									<tr>
										<td>
											<img class="bird" src="images/rei.png">
										</td>
										<td>
											<div class="fr-te-gr-title">
												Rei
											</div>
											<div class="fr-te-gr">
												Produtividade: <span class="desc-produtividade-rei">1\h</span>
											</div>
											<div class="fr-te-gr">
												Custo: <span class="desc-custo-rei">35 moedas</span>
											</div>
											<div class="fr-te-gr">
												Investimento: <span class="investimento-rei">0</span>
											</div>
										</td>
										<td class="text-center">
											<div class="number-input">
												<button class="minus input-number-minus"></button>
												<input min="0" value="0" type="number" id="rei_comprado">
												<button class="plus input-number-plus"></button>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<!-- Especial -->
						<div class="row  d-inline align-middle mb-1">
							<table class="fr-block">
								<tbody>
									<tr>
										<td>
											<img class="bird" src="images/especial.png">
										</td>
										<td>
											<div class="fr-te-gr-title">
												Especial
											</div>
											<div class="fr-te-gr">
												Produtividade: <span class="desc-produtividade-especial">1\h</span>
											</div>
											<div class="fr-te-gr">
												Custo: <span class="desc-custo-especial">35 moedas</span>
											</div>
											<div class="fr-te-gr">
												Investimento: <span class="investimento-especial">0</span>
											</div>
										</td>
										<td class="text-center">
											<div class="number-input">
												<button class="minus input-number-minus"></button>
												<input min="0" value="0" type="number" id="especial_comprado">
												<button class="plus input-number-plus"></button>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="col-sm-12 col-md-12 col-lg-6 needs-validation" novalidate>
					<div class="card-body">

						<div class="mb-3">
							<label for="data" class="form-label">Data: </label>
							<input type="date" class="form-control" id="data">
						</div>

						<div class="mb-3">
							<label for="valor_investir" class="form-label was-validated">Investimento
								Inicial
								(USD): </label>
							<input type="text" class="form-control" id="valor_investir" data-type="currency" value="0,00">
							<div class="invalid-feedback">
								Campo Obrigatório.
							</div>
							<span class="investimento " id="converter-investimento-moeda"></span>
						</div>

						<div class="mb-3">
							<label for="ganho" class="form-label">Ganhos\Dia (USD) <span class="bg-badge-bird d-inline-block popover-bird" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Disabled popover">?</span>:
							</label>
							<input type="text" class="form-control" id="ganho" data-type="currency" value="0,00">
							<div class="invalid-feedback">
								Campo Obrigatório.
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="calcular_investimento">
								<label class="form-check-label" for="calcular_investimento">
									<i class="fa fa-solid fa-hand-pointer"></i> Calcular investimento com esse
									ganho. <span class="bg-badge-bird">?</span>
								</label>
							</div>
						</div>

						<div class="mb-3 tempo-ganho-investimento">
							<label for="tempo_ganho_investimento" class="form-label">Tempo de ganho do investimento <span class="bg-badge-bird">?</span> :</label>
							<input type="number" class="form-control" id="tempo_ganho_investimento" min="0" value="0">
							<div class="invalid-feedback">
								Campo Obrigatório.
							</div>
						</div>

						<div class="mb-3">
							<label for="tempo" class="form-label">Período de compra <span class="bg-badge-bird">?</span></label>
							<input type="number" class="form-control mb-1" id="tempo" min="0" value="0">
							<select class="form-control" id="tipo_tempo" name="tipo_tempo">
								<option value="dia">Dia(s)</option>
								<option value="hora">Hora(s)</option>
							</select>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="trocar_retirada">
								<label class="form-check-label" for="trocar_retirada">
									Trocar retirada por compra (+20%) <span class="bg-badge-bird">?</span>
								</label>
							</div>
						</div>

						<div class="text-center">
							<button id="calcular" type="button" class="botao-principal">Calcular</button>
							<div id="carregar"></div>
						</div>
					</div>
				</div>
			</div>


			<!--
				<table border="1px" style="border-collapse: collapse;">
					<thead>
						<tr>
							<th></th>
							<th></th>
							<th colspan="9">Pássaros Comprados</th>
							<th></th>
							<th colspan="4">Retirada/Dia</th>
							<th colspan="2">Retirada Acumulada</th>
							<th colspan="2">Compra/Dia</th>
						</tr>
						<tr>
							<th>Dia</th>
							<th>Dia-Comprar</th>
							<th>Data</th>
							<th>Be</th>
							<th>Ve</th>
							<th>Am</th>
							<th>Ca</th>
							<th>Az</th>
							<th>Ve</th>
							<th>Re</th>
							<th>Es</th>
							<th>Total<span>?</span></th>
							<th>Moedas/Dia</th>
							<th>Moedas</th>
							<th>$</th>
							<th>EURO</th>
							<th>Trocado</th>
							<th>Moedas</th>
							<th>$</th>
							<th>Moedas</th>
							<th>C + R<span>?</span></th>
						</tr>
					</thead>
					<tbody id="tbody">
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>

					</tbody>
				</table>
				-->

		</div>

		<!-- Tabela de resultado -->
		<div class="silver-bk mt-4">
			<div class="block_name">
				<p class="text-center"><b>Resultado</b></p>
				<b>Ganhos diários:</b> <span id="ganhos-diarios">0</span>
				| <b>Dias Totais:</b> <span id="total-dias">0</span>
				| <b>Pássaros Totais:</b> <span id="ganhos-totais">0</span>
				| <b>Data Inicial:</b> <span id="ganhos-totais">0</span>
				| <b>Data Final:</b> <span id="ganhos-totais">0</span>
			</div>



			<div class="text-center">
				<button id="guardar-calculo" type="button" class="botao-principal">Guardar Cálculo</button>
				<div id="carregar"></div>
			</div>
		</div>
	</div>
</div>

<?php include '_scripts.php'; ?>
<script src="js/index.js"></script>
<script>

</script>
<?php include '_footer.php'; ?>