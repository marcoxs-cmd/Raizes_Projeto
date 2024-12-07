const cards = document.querySelectorAll('.card');
const infoContainer = document.querySelector('.info-container');

cards.forEach((card) => {
    card.addEventListener('click', () => {
        // Verifica se o card já está ativo
        const isActive = card.classList.contains('active');

        // Remove a classe 'active' e 'blur' de todas as cartas
        cards.forEach(otherCard => {
            otherCard.classList.remove('active');
            otherCard.classList.remove('blur');
        });

        // Se o card não estava ativo, ativa-o, desfoca os outros e inicia a animação
        if (!isActive) {
            card.classList.add('active');
            cards.forEach(otherCard => {
                if (otherCard !== card) {
                    otherCard.classList.add('blur');
                }
            });
            infoContainer.style.display = 'flex'; // Mostra a info-container

            // Timer de 500ms antes de redirecionar
            setTimeout(() => {
                const url = card.getAttribute('data-url'); // Obtém a URL do atributo 'data-url'
                if (url) {
                    window.location.href = url; // Redireciona para a URL
                }
            }, 500);
        } else {
            // Se o card já estava ativo, esconde a info-container
            infoContainer.style.display = 'none';
        }
    });
});
