<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'gestion_utilisateurs');

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Vérifier si le code a été soumis via le formulaire
if (isset($_POST['code'])) {
    $code = $_POST['code'];

    // Vérifier si le code existe dans la base de données
    $sql = "SELECT * FROM utilisateurs WHERE code='$code'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("location: /1/index.php");
        // Redirection vers une autre page après connexion
    } else {
        echo "Code invalide.";
    }
} else {
    echo "Aucun code soumis.";
}

$conn->close();
?>
