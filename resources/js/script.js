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

    //////////
    const decrementButton = document.getElementById('decrement-button')
    const incrementButton = document.getElementById('increment-button')
    const counterInput = document.getElementById('counter-input')

    function changeQty(type) {
        
        let currentValue = parseInt(counterInput.value) || 0;

        if (type == 'i') {
            counterInput.value = currentValue + 1;
            updateQty(counterInput.value)


        } else if (currentValue > 1) {
            counterInput.value = currentValue - 1;
            updateQty(counterInput.value)

        }

    }

    async function updateQty(currentValue) {
        const rowId = counterInput.getAttribute('data-rowId')
        const csrf = counterInput.getAttribute('data-csrf')


        const r = await fetch(`/carrinho/atualizar/${rowId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf
            },
            body: JSON.stringify({
                qty: currentValue
            })
        })

        await totalValor()
    }


    async function totalValor() {
        const r = await fetch(`/carrinho/totalcarrinho`).
        then(res => res.text()).
        then(value => document.querySelector('#totalcarrinho').innerHTML = value)


    }


    decrementButton.addEventListener('click', () => changeQty('d'))
    incrementButton.addEventListener('click', () => changeQty('i'))

});