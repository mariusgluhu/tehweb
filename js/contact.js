$(document).ready(function () {
    const form = $('#contactForm');
    const messageBox = $('#messageBox');

    form.on('submit', function (e) {
        e.preventDefault();
        const formData = form.serialize();

        // Resetează mesajul anterior
        messageBox.hide().removeClass('success error').text('');

        $.ajax({
            url: '../contact.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (data) {
                messageBox.show();
                if (data.success) {
                    messageBox.addClass('success').text('Mesajul a fost trimis cu succes!');
                    form[0].reset();
                } else {
                    messageBox.addClass('error').text(data.message || 'A apărut o eroare. Încercați din nou.');
                }

                // Dispare după 5 secunde
                setTimeout(function () {
                    messageBox.hide().removeClass('success error').text('');
                }, 3000);
            },
            error: function () {
                messageBox.show().addClass('error').text('Eroare la trimitere.');

                // Dispare după 5 secunde
                setTimeout(function () {
                    messageBox.hide().removeClass('success error').text('');
                }, 3000);
            }
        });
    });
});
