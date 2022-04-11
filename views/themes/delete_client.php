<div class="container mt-5">
    <div class="card">
        <div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Deletar Cliente</strong></div>
        <div class="card-body">
           
                <h5 class="ml-3">Deseja deletar o cliente <?=$client["name"]?>?</h5>
                    <form class="mt-3 ml-3" method="post" action="<?=route("/req/delete_client?id_client=".$client["id_client"]."")?>">
                        <div class="form-group">
                            <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i
								class="fa fa-fw fa-trash"></i> Deletar Cliente</button>
                            <a class="btn btn-dark" href="<?= route(); ?>"> Voltar</a>
                            
                        </div>
                    </form>
            
        </div>
    </div>

</div>