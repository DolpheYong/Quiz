<?php

session_start();

if (!isset($_SESSION['nom'])) {
    header('Location: index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Choisir une matière</title>
</head>
<body>

    <h1>Quiz Local</h1>

    <p>
        Bonjour <?= htmlspecialchars($_SESSION['nom']) ?> !
    </p>

    <h2>Choisissez une matière</h2>

    <form method="POST" action="quiz.php">

        <label>
            <input type="radio" name="matiere" value="Anglais" required>
            Anglais
        </label>

        <br>

        <label>
            <input type="radio" name="matiere" value="Français">
            Français
        </label>

        <br>

        <label>
            <input type="radio" name="matiere" value="Informatique">
            Informatique générale
        </label>

        <br><br>

        <button type="submit">
            Commencer le quiz
        </button>

    </form>

</body>
</html>