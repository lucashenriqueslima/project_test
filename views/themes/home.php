	<div class="container mt-5">
		<div class="card">
			<div class="card-header"><i class="fas fa-book mr-1"></i> <strong> Lista de Clientes </strong> <a
					href="<?=route("/adicionar-cliente")?>" class="float-right btn btn-dark btn-sm"><i
						class="fas fa-user-plus mr-1"></i> Adicionar Cliente </a></div>
			<div class="card-body pb-5">
				<div class="col-sm-12">
					
	<div>
		<table class="table table-dark table-striped table-bordered text-center">
			<thead>
				<tr class="bg-info text-white">
					<th>Cód. Cliente</th>
					<th>Nome</th>
					<th>Nº de Celular</th>
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
					<td><?=$client["cell_number"]?></td>
					<td>
<a href="editar-cliente?id_client=<?=$client["id_client"]?>" class="text-primary"><i
								class="fa fa-fw fa-edit"></i> Editar</a> |
						<a href="deletar-cliente?id_client=<?=$client["id_client"]?>" class="text-danger"><i
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
			</div>
		</div>
	</div>


	</div>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
		integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
	</script>

	</body>

	</html>