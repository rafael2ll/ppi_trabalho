window.onload = () => {
    const enderecoForm = document.querySelector('form');
    const inputCep = document.getElementById('cep')

    inputCep.onkeyup = () => buscaEndereco(inputCep.value);


}

function buscaEndereco(cep) {

      if (cep.length !== 8) return;
      let form = document.querySelector("form");

      fetch(`/clinica/backend/api/endereco/busca-endereco.php?cep=${cep}`)
        .then(response => {
          if (!response.ok) {
            throw new Error(response.status);
            // return Promise.reject(response.status);
          }

          return response.json();
        })
        .then(endereco => {
          form.rua.value = endereco.logradouro;
          form.estado.value = endereco.estado;
          form.cidade.value = endereco.cidade;
        })
        .catch(error => {

          console.error('Falha inesperada: ' + error);
        });
    }