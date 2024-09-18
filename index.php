<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'universite');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $post_nom = $_POST['post_nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $date_naissance = $_POST['date_naissance'];
    $promotion = $_POST['promotion'];
    $filiere = $_POST['filiere'];
    $matricule = 'UNIV-' . rand(1000, 9999); // Génération automatique du matricule

    // Gestion de l'upload de la photo
    $photo = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];
    $photo_path = 'uploads/' . $photo;
    move_uploaded_file($photo_tmp, $photo_path);

    // Enregistrement dans la base de données
    $sql = "INSERT INTO etudiants (nom, post_nom, prenom, sexe, date_naissance, promotion, filiere, photo, matricule) 
            VALUES ('$nom', '$post_nom', '$prenom', '$sexe', '$date_naissance', '$promotion', '$filiere', '$photo', '$matricule')";

    if ($conn->query($sql) === TRUE) {
        // Redirection vers la page de confirmation
        header("Location: confirmation.php?matricule=$matricule");
    } else {
        echo "Erreur : " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Universitaire</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Formulaire d'Inscription Universitaire</h1>
    <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="post_nom">Post-Nom :</label>
        <input type="text" id="post_nom" name="post_nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="sexe">Sexe :</label>
        <select id="sexe" name="sexe" required>
            <option value="M">Masculin</option>
            <option value="F">Féminin</option>
        </select><br>

        <label for="date_naissance">Date de Naissance :</label>
        <input type="date" id="date_naissance" name="date_naissance" required><br>

        <label for="promotion">Promotion :</label>
        <input type="text" id="promotion" name="promotion" required><br>

        <label for="filiere">Filière :</label>
        <input type="text" id="filiere" name="filiere" required><br>

        <label for="photo">Photo d'Étudiant :</label>
        <input type="file" id="photo" name="photo" accept="image/*" required><br>

        <button type="submit">S'inscrire</button>
    </form>

    <script src="script.js"></script>
</body>
</html>