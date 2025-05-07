document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactForm');
    const messageBox = document.getElementById('messageBox');

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(form);

        // Resetează mesajul anterior
        messageBox.style.display = 'none';
        messageBox.classList.remove('success', 'error');
        messageBox.textContent = '';

        fetch('../contact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            messageBox.style.display = 'block';
            if (data.success) {
                messageBox.classList.add('success');
                messageBox.textContent = "Mesajul a fost trimis cu succes!";
                form.reset();
            } else {
                messageBox.classList.add('error');
                messageBox.textContent = data.message || "A apărut o eroare. Încercați din nou.";
            }

            // Dispare după 5 secunde
            setTimeout(() => {
                messageBox.style.display = 'none';
                messageBox.classList.remove('success', 'error');
                messageBox.textContent = '';
            }, 3000);
        })
        .catch(error => {
            console.error(error);
            messageBox.style.display = 'block';
            messageBox.classList.add('error');
            messageBox.textContent = "Eroare la trimitere.";

            // Dispare după 5 secunde
            setTimeout(() => {
                messageBox.style.display = 'none';
                messageBox.classList.remove('success', 'error');
                messageBox.textContent = '';
            }, 3000);
        });
    });
});
