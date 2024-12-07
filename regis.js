document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const response = await fetch("cadUsuario.php", {
            method: "POST",
            body: formData
        });

        const data = await response.json();

        const divSuccess = document.querySelector(".alert-success");
        const divMessage = document.querySelector(".alert");

        if (data.success) {
            divSuccess.innerHTML = data.message;
            divSuccess.style.display = 'block'; // Mostra a div de sucesso
            divSuccess.classList.add('desce');

            setTimeout(() => {
                divSuccess.classList.remove('desce');
                window.location.href = 'index.php'; // Redireciona após sucesso
            }, 1500);

        } else {
            divMessage.innerHTML = data.message;
            divMessage.style.display = 'block'; // Mostra a div de erro
            divMessage.classList.add('desce');

            setTimeout(() => {
                divMessage.classList.remove('desce');
                divMessage.classList.add('sobe');
                divMessage.style.display = 'none'; // Esconde a div após a animação
            }, 2500);
        }
    });
});
