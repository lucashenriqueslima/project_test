	<div class="container m-5">
		<div class="card">
			<div class="card-header"><i class="fas fa-book mr-1"></i> <strong> Lista de Usuários </strong> <a
					href="add-tipo-produtos.php" class="float-right btn btn-dark btn-sm"><i
						class="fas fa-user-plus mr-1"></i> Adicionar Usuário </a></div>
			<div class="card-body pb-5">
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Pesquisar por usuário</h5>
					<form method="get">
						<div class="col-lg-12">
							<div class="input-group">
								<input type="text" id="cod_txt" class="form-control"
									placeholder="Digite qualquer dado que esteja relacionado ao usuário"
									aria-label="Text input with segmented dropdown button">
								<button type="button" id="addByButton" class="btn btn-outline-secondary"><i
										class="fa fa-fw fa-search"></i></button>
							</div>



					</form>
				</div>
			</div>
		</div>
	</div>

	<div>
		<table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary text-white">
					<th>ID</th>
					<th>Descrição</th>
					<th>Quantidade</th>
					<th class="text-center">Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php 
						foreach($tipo_produtos as $product):
					?>
				<tr>
					<td><?=$product[0]?></td>
					<td><a href="list-produtos.php?search=<?=$product[1]?>"><?=$product[1]?></a></td>
					<td><?=$product[2]?></td>
					<td align="center">
						<a href="edit-tipo-produtos.php?id_tipo_produto=<?=$product[0]?>" class="text-primary"><i
								class="fa fa-fw fa-edit"></i> Editar</a> |
						<a href="delete.php?id_tipo_produto=<?=$product[0]?>" class="text-danger"
							onClick="return confirm('Você tem certeza disso? Todos itens associados também serão apagados!');"><i
								class="fa fa-fw fa-trash"></i> Deletar</a>
					</td>

				</tr>
				<?php 
						endforeach;
					if(empty($product)):
					?>
				<tr>
					<td colspan="6" align="center">Sem dados registrados!</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>

	</div>



	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
		integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
	</script>
	<script>
	</script>
	</body>

	</html>