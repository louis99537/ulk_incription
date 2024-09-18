<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'gestion_utilisateurs');

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$post_nom = $_POST['post_nom'];
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$code = $_POST['code'];

// Insérer les données dans la base
$sql = "INSERT INTO utilisateurs (nom, post_nom, prenom, sexe, code) VALUES ('$nom', '$post_nom', '$prenom', '$sexe', '$code')";

if ($conn->query($sql) === TRUE) {
    // Si l'inscription est réussie, afficher la page de confirmation stylée
    echo "
    <!DOCTYPE html>
    <html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Confirmation d'inscription</title>
        <link rel='stylesheet' href='styles.css'>
    </head>
    <body>
        <div class='confirmation-container'>
            <h2>Inscription réussie !</h2>
            <p>Bonjour <strong>$prenom $nom</strong>, votre inscription a été effectuée avec succès.</p>
            <p>Votre code personnel est : <span class='code'>$code</span></p>
            <a href='login.html' class='button'>Se connecter</a>
        </div>
    </body>
    </html>
    ";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
