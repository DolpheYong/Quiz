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
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <header class="header">

    <div class="logo">
        GÉNIE <span>LOGIC</span>
    </div>

    <div class="header-title">
        Quiz des apprenants
    </div>

</header>

<main class="container">

    <div class="card">

        <div class="hero">

            <h1>Choisissez votre matière</h1>

            <p>
                Bonjour
                <strong><?= htmlspecialchars($_SESSION['nom']) ?></strong>
            </p>

        </div>

        <form method="POST" action="quiz.php">

            <label class="matiere">
                <input
                    type="radio"
                    name="matiere"
                    value="Anglais"
                    required
                >
                🇬🇧 Anglais
            </label>

            <label class="matiere">
                <input
                    type="radio"
                    name="matiere"
                    value="Français"
                >
                🇫🇷 Français
            </label>

            <label class="matiere">
                <input
                    type="radio"
                    name="matiere"
                    value="Informatique"
                >
                💻 Informatique générale
            </label>

            <br>

            <button class="btn" type="submit">
                Commencer le quiz
            </button>

        </form>

    </div>

</main>
</body>
</html>
