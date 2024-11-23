document.addEventListener('DOMContentLoaded', function () {
    const cardAlerts = document.querySelectorAll('.cardAlert'); // Seleciona os cards

    cardAlerts.forEach(function(cardAlert) {
        // Mostra o card (remova a classe `hidden`, caso exista)
        cardAlert.classList.remove('hidden');

        // Configura o card para desaparecer automaticamente após 5 segundos
        setTimeout(function () {
            cardAlert.classList.add('hidden'); // Esconde o alerta
            console.log('card fechou'); // Exibindo no console
        }, 5000); // Tempo em milissegundos (5000 = 5 segundos)
    });
});

