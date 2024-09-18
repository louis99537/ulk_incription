<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'universite');

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupération de tous les étudiants
$sql = "SELECT nom, post_nom, prenom, matricule, photo FROM etudiants";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants Inscrits</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Liste des Étudiants Inscrits</h1>
    <div class="students-container">
        <?php
        if ($result->num_rows > 0) {
            // Affichage des étudiants
            while($row = $result->fetch_assoc()) {
                echo "<div class='student-card'>";
                echo "<img src='" . $row['photo'] . "' alt='Photo de " . $row['prenom'] . "' class='student-photo'>";
                echo "<p><strong>Nom :</strong> " . $row['nom'] . "</p>";
                echo "<p><strong>Post-Nom :</strong> " . $row['post_nom'] . "</p>";
                echo "<p><strong>Prénom :</strong> " . $row['prenom'] . "</p>";
                echo "<p><strong>Matricule :</strong> " . $row['matricule'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Aucun étudiant inscrit pour le moment.</p>";
        }
        ?>
    </div>
</body>
</html>