<?php

require_once 'config/database.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = trim($_POST['nom'] ?? '');

    if ($nom === '') {
        $erreur = "Veuillez saisir votre nom.";
    } else {
        $_SESSION['nom'] = $nom;

        header('Location: matiere.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Quiz Local</title>
</head>
<body>

    <h1>Quiz Local</h1>

    <h2>Bienvenue che GENIE LOGIC</h2>

    <?php if (isset($erreur)): ?>
        <p style="color: red;">
            <?= htmlspecialchars($erreur) ?>
        </p>
    <?php endif; ?>

    <form method="POST">

        <label for="nom">Votre nom :</label>

        <input
            type="text"
            id="nom"
            name="nom"
            required
        >

        <button type="submit">
            Commencer
        </button>

    </form>

</body>
</html>
