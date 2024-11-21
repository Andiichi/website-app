// Selecionar elementos
const counterInput = document.getElementById('counter-input');
const qntInput = document.getElementById('qnt');
const buyButton = document.getElementById('buy-button');
const cartForm = document.getElementById('add-to-cart-form');
const cardErro = document.getElementById("erro");

// Adicionar evento de clique ao botão de comprar
buyButton.addEventListener('click', function () {
    // Atualizar o campo 'qnt' no formulário com o valor de 'counter-input'
    qntInput.value = counterInput.value;

    // Verificar a condição
    if (qntInput.value < 0) {
        console.log('nOK!');
        cardErro.classList.remove('hidden'); // Mostrar o alerta

        // Ocultar o alerta após 5 segundos e resetar o valor
        setTimeout(function () {
            cardErro.classList.add('hidden'); // Esconde o alerta
            counterInput.value = counterInput.defaultValue//resetado o valor ao default = 1
            console.log(counterInput.value); //exibindo no console
        }, 5000);
    } else {
        console.log('OK!');
        // Submeter o formulário
        cartForm.submit();
    }
});
