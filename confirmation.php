<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'universite');

// Récupérer le matricule depuis l'URL
$matricule = $_GET['matricule'];

// Chercher l'étudiant correspondant
$sql = "SELECT * FROM etudiants WHERE matricule = '$matricule'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $etudiant = $result->fetch_assoc();
} else {
    echo "Étudiant non trouvé.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'Inscription</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Confirmation d'Inscription</h1>
    <p>Nom : <?= $etudiant['nom'] ?></p>
    <p>Post-Nom : <?= $etudiant['post_nom'] ?></p>
    <p>Prénom : <?= $etudiant['prenom'] ?></p>
    <p>Sexe : <?= $etudiant['sexe'] ?></p>
    <p>Date de Naissance : <?= $etudiant['date_naissance'] ?></p>
    <p>Promotion : <?= $etudiant['promotion'] ?></p>
    <p>Filière : <?= $etudiant['filiere'] ?></p>
    <p>Matricule : <?= $etudiant['matricule'] ?></p>
    <img src="<?= $etudiant['photo'] ?>" alt="Photo d'Étudiant" style="width:150px;height:150px;">
</body>