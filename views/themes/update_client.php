<div class="container mt-5">   
    <div class="card">
        <div class="card-header"><i class="fas fa-edit"></i> <strong>Editar Cliente <?=$client["name"]?></strong></div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-sm-12 order-1" style="min-height: 300px;">
                    <div class="mt-5 h-75" style="min-height: 300px;" id="map"></div>
                </div>
                <div class="col-lg-6 order-2 pt-sm-5">
                    <form method="post" action="<?=route("/req/update_client?id_client=".$client["id_client"]."")?>">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Nome do Cliente" value="<?=$client["name"]?>" required>
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="" name="cpf" id="cpf" class="form-control" placeholder="CPF do Cliente"
                            value="<?=$client["cpf"]?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nº de Celular</label>
                            <input type="text" name="cell_number" id="cell_number" class="form-control"
                            value="<?=$client["cell_number"]?>" placeholder="Nº de Celular do Cliente" required>
                        </div>
                        <div class="form-group">
                            <label>CEP</label>
                            <input type="text" name="cep" id="cep" class="form-control" placeholder="CEP do Cliente"
                            value="<?=$client["cep"]?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nº da Rua</label>
                            <input type="text" name="street_number" id="street_number" class="form-control" value="<?=$client["street_number"]?>" required>
                        </div>
                        <div class="form-group">
                            <label>Rua</label>
                            <input type="text" name="street" id="street" class="form-control" value="<?=$client["street"]?>" required>
                        </div>
                        <div class="form-group">
                            <label>Bairro</label>
                            <input type="text" name="neighborhood" id="neighborhood" class="form-control" value="<?=$client["neighborhood"]?>" required>
                        </div>
                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="text" name="city" id="city" class="form-control" value="<?=$client["city"]?>" required>
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i
                                    class="fa fa-fw fa-plus-circle"></i> Editar Cliente <?=$client["name"]?> </button>
                            <button class="btn btn-dark" title="Click para ver geolocalização do cliente." id="get-geo"><i class="fas fa-map-marker-alt"></i> Geolocalização</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="<?= asset("js/main.js") ?>"></script>

<script>

window.onload = function() {
  initMap(true);
};

</script>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBincX7_BVK2jC9UEMhlgUgupPiZq2A1c&callback=initMap&v=weekly"
      async
    ></script>
    <script>
        
    </script>