function buscaEndereco(cep) {

      if (cep.length != 9) return;
      let form = document.querySelector("form");

      fetch("../../../backend/endereco/busca-endereco.php?cep=" + cep)
        .then(response => {
          if (!response.ok) {
            // A requisição finalizou com sucesso a nível de rede,
            // porém o servidor retornou um código de status
            // fora da faixa 200-299 (indicando outros possíveis erros).
            // Neste caso, lança uma exceção para que a promise seja
            // rejeitada. Como o próximo 'then' não possui callback
            // de erros, será executada a função do próximo 'catch'.
            throw new Error(response.status);
            // return Promise.reject(response.status);
          }

          return response.json();
        })
        .then(endereco => {
          form.rua.value = endereco.rua;
          form.bairro.value = endereco.bairro;
          form.cidade.value = endereco.cidade;
        })
        .catch(error => {
          // Ocorreu um erro na comunicação com o servidor ou
          // no processamento da requisição no PHP, que pode não
          // ter retornado uma string JSON válida.
          form.reset();
          console.error('Falha inesperada: ' + error);
        });
    }

    window.onload = function () {
      const inputCep = document.querySelector("#cep");
      inputCep.onkeyup = () => buscaEndereco(inputCep.value);
    }