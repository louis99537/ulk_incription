<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'universite');

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupération du matricule de l'étudiant depuis l'URL ou un formulaire
$matricule = isset($_GET['matricule']) ? $_GET['matricule'] : '';

// Si le formulaire de modification est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $post_nom = $_POST['post_nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $date_naissance = $_POST['date_naissance'];
    $promotion = $_POST['promotion'];
    $filiere = $_POST['filiere'];
    
    // Gestion de la modification de la photo
    if (isset($_FILES['photo']) && $_FILES['photo']['name'] != '') {
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_path = 'uploads/' . $photo;
        move_uploaded_file($photo_tmp, $photo_path);

        // Mise à jour avec la nouvelle photo
        $sql = "UPDATE etudiants SET nom='$nom', post_nom='$post_nom', prenom='$prenom', sexe='$sexe', 
                date_naissance='$date_naissance', promotion='$promotion', filiere='$filiere', photo='$photo' 
                WHERE matricule='$matricule'";
    } else {
        // Mise à jour sans changer la photo
        $sql = "UPDATE etudiants SET nom='$nom', post_nom='$post_nom', prenom='$prenom', sexe='$sexe', 
                date_naissance='$date_naissance', promotion='$promotion', filiere='$filiere' 
                WHERE matricule='$matricule'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Informations mises à jour avec succès!";
    } else {
        echo "Erreur lors de la mise à jour: " . $conn->error;
    }
}

// Récupération des informations actuelles de l'étudiant
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
    <title>Modifier les Informations de l'Étudiant</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Modifier les Informations de l'Étudiant</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= $etudiant['nom'] ?>" required><br>

        <label for="post_nom">Post-Nom :</label>
        <input type="text" id="post_nom" name="post_nom" value="<?= $etudiant['post_nom'] ?>" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?= $etudiant['prenom'] ?>" required><br>

        <label for="sexe">Sexe :</label>
        <select id="sexe" name="sexe" required>
            <option value="M" <?= $etudiant['sexe'] == 'M' ? 'selected' : '' ?>>Masculin</option>
            <option value="F" <?= $etudiant['sexe'] == 'F' ? 'selected' : '' ?>>Féminin</option>
        </select><br>

        <label for="date_naissance">Date de Naissance :</label>
        <input type="date" id="date_naissance" name="date_naissance" value="<?= $etudiant['date_naissance'] ?>" required><br>

        <label for="promotion">Promotion :</label>
        <input type="text" id="promotion" name="promotion" value="<?= $etudiant['promotion'] ?>" required><br>

        <label for="filiere">Filière :</label>
        <input type="text" id="filiere" name="filiere" value="<?= $etudiant['filiere'] ?>" required><br>

        <label for="photo">Modifier la Photo :</label>
        <input type="file" id="photo" name="photo" accept="image/*"><br>
        <img src="<?= $etudiant['photo'] ?>" alt="Photo actuelle" style="width:150px;height:150px;"><br><br>

        <button type="submit">Enregistrer les Modifications</button>
    </form>
</body>
</html>