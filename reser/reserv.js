
    function validarData() {
        var dataInput = document.getElementById('data');
        var dataSelecionada = new Date(dataInput.value);
        var dataAtual = new Date();

        if (dataSelecionada < dataAtual) {
            alert("Por favor, selecione uma data igual ou posterior à data atual.");
            return false;
        }

        return true;
    }
