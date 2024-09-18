document.getElementById('loginForm').addEventListener('submit', function(event) {
    const code = document.getElementById('code').value;
    if (code.length !== 8 || isNaN(code)) {
        alert('Le code doit comporter exactement 8 chiffres.');
        event.preventDefault(); // Empêche l'envoi du formulaire si le code n'est pas valide
    }
});
