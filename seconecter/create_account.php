<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Créer un compte</h2>
        <form id="createAccountForm" action="register.php" method="POST">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="post_nom">Post-nom :</label>
            <input type="text" id="post_nom" name="post_nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="sexe">Sexe :</label>
            <select id="sexe" name="sexe" required>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select>

            <input type="hidden" id="code" name="code">

            <button type="submit">Créer un compte</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
