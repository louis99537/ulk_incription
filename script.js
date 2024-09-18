function validateForm() {
    const nom = document.getElementById('nom').value;
    const postNom = document.getElementById('post_nom').value;
    const prenom = document.getElementById('prenom').value;

    if (nom === "" || postNom === "" || prenom === "") {
        alert("Tous les champs doivent être remplis.");
        return false;
    }
    return true;
}