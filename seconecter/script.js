document.getElementById('createAccountForm').addEventListener('submit', function(event) {
    const code = generateCode(8); // Génère un code de 8 chiffres
    document.getElementById('code').value = code; // Attribue le code au champ caché
});

function generateCode(length) {
    const characters = '0123456789';
    let result = '';
    for (let i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return result;
}
