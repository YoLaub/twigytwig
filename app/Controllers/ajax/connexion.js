document.getElementById('connexion-invite').addEventListener('click', () => {
    fetch('/ajax/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ mode: 'invite' })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = data.redirect;
        } else {
            alert('Échec de la connexion');
        }
    })
    .catch(error => console.error(error));
});