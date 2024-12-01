
document.addEventListener('DOMContentLoaded', function () {
    
    ///// script para aparecer o card de alertas
    const cardAlerts = document.querySelectorAll('.cardAlert'); // Seleciona os cards

        cardAlerts.forEach(function cardAlert (cardAlert) {
            // Mostra o card (remova a classe `hidden`, caso exista)
            cardAlert.classList.remove('hidden');

            // Configura o card para desaparecer automaticamente após 5 segundos
            setTimeout(function () {
                cardAlert.classList.add('hidden'); // Esconde o alerta
                
            }, 5000); // Tempo em milissegundos (5000 = 5 segundos)
        });


    //// scrip da qty no carrinho
    const decrementButtons = document.querySelectorAll('#decrement-button');
    const incrementButtons = document.querySelectorAll('#increment-button');

    // Adicionar eventos aos botões de decremento
    decrementButtons.forEach((button) => {
        button.addEventListener('click', () => changeQty('d', button));
    });

    // Adicionar eventos aos botões de incremento
    incrementButtons.forEach((button) => {
        button.addEventListener('click', () => changeQty('i', button));
    });

    // Função para alterar a quantidade
    function changeQty(type, button) {
        // Encontrar o campo de entrada relacionado ao botão clicado
        const itemRow = button.closest('.item-row'); // Ajuste para encontrar a linha do item
        if (!itemRow) {
            console.error('Elemento .item-row não encontrado para o botão clicado.');
            return;
        }

        const counterInput = itemRow.querySelector('#counter-input'); // Encontrar o campo de entrada
        if (!counterInput) {
            console.error('Campo #counter-input não encontrado dentro de .item-row.');
            return;
        }

        let currentValue = parseInt(counterInput.value) || 0;

        // Incrementar ou decrementar o valor
        if (type === 'i') {
            counterInput.value = currentValue + 1;
        } else if (type === 'd' && currentValue > 1) {
            counterInput.value = currentValue - 1;
        }

        // Atualizar a quantidade no backend
        updateQty(counterInput);
    }

    // Função para atualizar a quantidade no backend
    async function updateQty(counterInput) {
        const rowId = counterInput.getAttribute('data-rowId');
        const csrf = counterInput.getAttribute('data-csrf');
        const currentValue = counterInput.value;
      

        if (!rowId || !csrf) {
            console.error('Atributos data-rowId ou data-csrf ausentes no campo de entrada.');
            return;
        }

        await fetch(`/carrinho/atualizar/${rowId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf,
            },
            body: JSON.stringify({ 
                    qty: currentValue,
                   
                 }),
        });

        

        // Atualizar o valor total
        await totalValor();

        // Atualizar o valor subtotal
        await subtotalValor()
    }

    // Função para atualizar o valor total do carrinho
    async function totalValor() {
        const response = await fetch(`/carrinho/totalcarrinho`);
        const total = await response.text();
        document.querySelector('#totalcarrinho').innerHTML = total;
    }


    // Função para atualizar o valor total do carrinho
    async function subtotalValor() {
        const response = await fetch(`/carrinho/subtotalcarrinho`);
        const total = await response.text();
        document.querySelector('#subtotalcarrinho').innerHTML = total;
    }
});



document.addEventListener('DOMContentLoaded', function () {
    let tabs = document.querySelectorAll('.tab');
    let contents = document.querySelectorAll('.tab-content');

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function (e) {
            let targetId = tab.id.replace('Tab', 'Content');

            // Hide all content divs
            contents.forEach(function (content) {
                content.classList.add('hidden');
            });

            // Remove active class from all tabs
            tabs.forEach(function (tab) {
                tab.classList.remove('text-blue-600', 'font-bold', 'bg-gray-50', 'border-blue-600');
                tab.classList.add('text-gray-600', 'font-semibold');
            });

            // Show the target content
            document.getElementById(targetId).classList.remove('hidden');

            // Add active class to the clicked tab
            tab.classList.add('text-blue-600', 'font-bold', 'bg-gray-50', 'border-blue-600');
            tab.classList.remove('text-gray-600', 'font-semibold');
        });
    });
});