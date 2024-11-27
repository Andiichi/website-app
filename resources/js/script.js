document.addEventListener('DOMContentLoaded', function () {
    const cardAlerts = document.querySelectorAll('.cardAlert'); // Seleciona os cards

    cardAlerts.forEach(function (cardAlert) {
        // Mostra o card (remova a classe `hidden`, caso exista)
        cardAlert.classList.remove('hidden');

        // Configura o card para desaparecer automaticamente após 5 segundos
        setTimeout(function () {
            cardAlert.classList.add('hidden'); // Esconde o alerta
            console.log('card fechou'); // Exibindo no console
        }, 5000); // Tempo em milissegundos (5000 = 5 segundos)
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const decrementButton = document.getElementById('decrement-button');
    const incrementButton = document.getElementById('increment-button');
    const counterInput = document.getElementById('update-quantity-form');

    // Função para enviar os dados ao backend
    const sendUpdate = (quantity) => {
        fetch('/carrinho/update/ROW_ID', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ qty: quantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Quantidade atualizada com sucesso!');
            } else {
                alert('Erro ao atualizar a quantidade.');
            }
        })
        .catch(error => console.error('Erro:', error));
    };

    // Incrementar quantidade
    incrementButton.addEventListener('click', function () {
        let currentValue = parseInt(counterInput.value) || 0;
        counterInput.value = currentValue + 1;
        sendUpdate(counterInput.value);
    });

    // Decrementar quantidade
    decrementButton.addEventListener('click', function () {
        let currentValue = parseInt(counterInput.value) || 0;
        if (currentValue > 1) {
            counterInput.value = currentValue - 1;
            sendUpdate(counterInput.value);
        }
    });

    // Enviar dados quando o campo perde o foco
    counterInput.addEventListener('blur', function () {
        let currentValue = parseInt(counterInput.value) || 1; // Valor padrão: 1
        if (currentValue < 1) {
            currentValue = 1; // Corrige valores inválidos
        }
        counterInput.value = currentValue; // Atualiza o valor no campo
        sendUpdate(currentValue); // Envia a quantidade ao backend
    });
});