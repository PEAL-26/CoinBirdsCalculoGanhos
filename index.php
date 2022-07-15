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
								<input class="form-check-input" type="checkbox" id="calcular-investimento">
								<label class="form-check-label" for="calcular-investimento">
									<i class="fa fa-solid fa-hand-pointer"></i> Calcular investimento com esse
									ganho.
								</label>
							</div>
						</div>

						<!-- 										
										<div class="mb-3">
											<label for="ganho" class="form-label">Dinheiro</label>
											<select class="form-control" id="tipo_tempo" name="tipo_tempo">
												<option value="dia">Dia</option>
												<option value="hora">Hora</option>
											</select>
										</div> -->

						<div class="mb-3">
							<label for="tempo" class="form-label">Período de compra <span class="bg-badge-bird">?</span></label>
							<input type="text" class="form-control mb-1" id="tempo" value="0">
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
					</div>
				</div>

				<div class="col-sm-12 col-md-12 col-lg-6">
					<div class="card-body d-flex flex-column">
						<div class="row justify-content-between">
							<div class="col-4">
								<div class="block_img_pot">
									<img src="images/bege.png" alt="">
								</div>
							</div>
							<div class="col-8 text-center">
								<div class="number-input">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
									<input class="quantity" min="0" name="quantity" value="0" type="number">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
								</div>
								<br>
								<span class="investimento">
									<span id="investimento-bege">0</span>
								</span>
								<!-- Quantidade de Pássaro -->
							</div>
						</div>
						<div class="row justify-content-between">
							<div class="col-4">
								<div class="block_img_pot">
									<img src="images/verde.png" alt="">
								</div>
							</div>
							<div class="col-8 text-center">
								<div class="number-input">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
									<input class="quantity" min="0" name="quantity" value="0" type="number">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
								</div>
								<br>
								<span class="investimento">
									<span id="investimento-verde">0</span>
								</span>
							</div>
						</div>
						<div class="row justify-content-between">
							<div class="col-4">
								<div class="block_img_pot">
									<img src="images/amarelo.png" alt="">
								</div>
							</div>
							<div class="col-8 text-center">
								<div class="number-input">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
									<input class="quantity" min="0" name="quantity" value="0" type="number">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
								</div>
								<br>
								<span class="investimento">
									<span id="investimento-amarelo">0</span>
								</span>
							</div>
						</div>
						<div class="row justify-content-between">
							<div class="col-4">
								<div class="block_img_pot">
									<img src="images/castanho.png" alt="">
								</div>
							</div>
							<div class="col-8 text-center">
								<div class="number-input">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
									<input class="quantity" min="0" name="quantity" value="0" type="number">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
								</div>
								<br>
								<span class="investimento">
									<span id="investimento-castanho">0</span>
								</span>
							</div>
						</div>
						<div class="row justify-content-between">
							<div class="col-4">
								<div class="block_img_pot">
									<img src="images/azul.png" alt="">
								</div>
							</div>
							<div class="col-8 text-center">
								<div class="number-input">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
									<input class="quantity" min="0" name="quantity" value="0" type="number">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
								</div>
								<br>
								<span class="investimento">
									<span id="investimento-azul">0</span>
								</span>
							</div>
						</div>
						<div class="row justify-content-between">
							<div class="col-4">
								<div class="block_img_pot">
									<img src="images/vermelho.png" alt="">
								</div>
							</div>
							<div class="col-8 text-center">
								<div class="number-input">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
									<input class="quantity" min="0" name="quantity" value="0" type="number">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
								</div>
								<br>
								<span class="investimento">
									<span id="investimento-vermelho">0</span>
								</span>
							</div>
						</div>
						<div class="row justify-content-between">
							<div class="col-4">
								<div class="block_img_pot">
									<img src="images/rei.png" alt="">
								</div>
							</div>
							<div class="col-8 text-center">
								<div class="number-input">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
									<input class="quantity" min="0" name="quantity" value="0" type="number">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
								</div>
								<br>
								<span class="investimento">
									<span id="investimento-rei">0</span>
								</span>
							</div>
						</div>
						<div class="row justify-content-between">
							<div class="col-4">
								<div class="block_img_pot">
									<img src="images/especial.png" alt="">
								</div>
								<!-- <div class="">
											Produtividade: <br></b><b>1 por hora</b>
											Custo:
										</div> -->
							</div>
							<div class="col-8 text-center">
								<div class="number-input">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
									<input class="quantity" min="0" name="quantity" value="0" type="number">
									<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
								</div>
								<br>
								<span class="investimento">
									<span id="investimento-especial">0</span>
								</span>
							</div>
						</div>
					</div>
				</div>

				<div class="text-center">
					<button id="calcular" type="button" class="botao-principal">Calcular</button>
					<div id="carregar"></div>
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

			</div>




		</div>
	</div>
</div>

<?php include '_scripts.php'; ?>
<script src="js/index.js"></script>
<script>

</script>
<?php include '_footer.php'; ?>