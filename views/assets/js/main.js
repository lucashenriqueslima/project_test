let map;

function initMap(geolocation = false) {
    map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: -16.681355,
            lng: -49.256184
        },
        zoom: 15,
    });
    if(geolocation){
    var geocoder = new google.maps.Geocoder();
    geocodeAddress(geocoder, map);
}
}

function geocodeAddress(geocoder, resultsMap) {
 var ruaP = document.getElementById("street").value; //CAMPO AONDE VOCÊ RECEBEU A RUA
 var bairroP =  document.getElementById("neighborhood").value; //CAMPO AONDE VOCÊ RECEBEU O BAIRRO
 var cidadeP =  document.getElementById("city").value; //CAMPO AONDE VOCÊ RECEBEU A CIDADE
 var numeroP  = document.getElementById("street_number").value; //CAMPO AONDE VOCÊ RECEBEU O NÚMERO      
    var endereco = {
          rua: ruaP,
            bairro: bairroP,
            cidade: cidadeP,
            numero: numeroP
        }

        console.log(endereco);
    var address =  endereco.rua + " " + endereco.bairro + " " + endereco.numero + " " + endereco.cidade
    geocoder.geocode({'address': address}, function(results, status) {
      if (status === 'OK') {
        resultsMap.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
          map: resultsMap,
          position: results[0].geometry.location
        });
      } else {
        alert('error', 'Erro ao carregar geolocalização; \n ' + status);
      }
    });
  }

$('#cpf').mask('000.000.000-00');
$('#cell_number').mask('(00) 00000-0000');
$('#cep').mask('00000-000');


document.getElementById("cep").onblur = () => {
    pesquisacep(document.getElementById("cep").value);
}

document.getElementById("get-geo").onclick = (e) => {
    e.preventDefault();
    initMap(true);
}

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('street').value = ("");
    document.getElementById('neighborhood').value = ("");
    document.getElementById('city').value = ("");
}




function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {

        alert("success", "CEP encontrado.")

        //Atualiza os campos com os valores.
        document.getElementById('street').value = (conteudo.logradouro);
        document.getElementById('neighborhood').value = (conteudo.bairro);
        document.getElementById('city').value = (conteudo.localidade);

        initMap(true);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("error", "CEP não encontrado.");
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('street').value = "...";
            document.getElementById('neighborhood').value = "...";
            document.getElementById('city').value = "...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            console.log(script);

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("error", "Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};