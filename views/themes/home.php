	<div class="container mt-5">
		<div class="card">
			<div class="card-header"><i class="fas fa-book mr-1"></i> <strong> Lista de Usuários </strong> <a
					href="add" class="float-right btn btn-dark btn-sm"><i
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
		<table class="table table-dark table-striped table-bordered text-center">
			<thead>
				<tr class="bg-info text-white">
					<th>ID</th>
					<th>Nome</th>
					<th>Email</th>
					<th class="text-center">Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php 
						foreach($clients as $client):
					?>
				<tr>
					<td><?=$client["id_client"]?></td>
					<td><?=$client["name"]?></td>
					<td><?=$client["email"]?></td>
					<td>
					<a href="edit-tipo-produtos.php?id_tipo_produto=<?=$client["id_client"]?>" class="text-info"><i
								class="fa fa-fw fa-eye"></i> Ver</a> | <a href="edit-tipo-produtos.php?id_tipo_produto=<?=$client["id_client"]?>" class="text-primary"><i
								class="fa fa-fw fa-edit"></i> Editar</a> |
						<a href="delete.php?id_tipo_produto=<?=$client["id_client"]?>" class="text-danger"
							onClick="return confirm('Você tem certeza disso? Todos itens associados também serão apagados!');"><i
								class="fa fa-fw fa-trash"></i> Deletar</a>
					</td>

				</tr>
				<?php 
						endforeach;
					if(empty($clients)):
					?>
				<tr>
					<td class="text-center" colspan="6">Nenhum Cliente Cadastrado!</td>
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