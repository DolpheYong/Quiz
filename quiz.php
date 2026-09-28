<?php

session_start();

require_once 'config/database.php';

// Vérifier que l'apprenant existe
if (!isset($_SESSION['nom'])) {
    header('Location: index.php');
    exit;
}

// Vérifier que la matière est envoyée
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: matiere.php');
    exit;
}

$matiere = $_POST['matiere'] ?? '';

$matieresAutorisees = [
    'Anglais',
    'Français',
    'Informatique'
];

if (!in_array($matiere, $matieresAutorisees, true)) {
    die('Matière invalide.');
}

$_SESSION['matiere'] = $matiere;

// Récupérer 30 questions
$sql = "
    SELECT *
    FROM questions
    WHERE matiere = ?
    ORDER BY RAND()
    LIMIT 30
";

$stmt = $pdo->prepare($sql);
$stmt->execute([$matiere]);

$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($questions) < 30) {
    die(
        "Il faut au moins 30 questions pour la matière : "
        . htmlspecialchars($matiere)
    );
}

// Garder les questions dans la session
$_SESSION['questions'] = $questions;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <title>Quiz <?= htmlspecialchars($matiere) ?></title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }

        .question {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .question h3 {
            margin-top: 0;
        }

        .option {
            display: block;
            padding: 8px;
            margin: 5px 0;
        }

        .option:hover {
            background-color: #f2f2f2;
        }

        .btn {
            padding: 12px 25px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>

</head>

<body>

    <h1>Quiz <?= htmlspecialchars($matiere) ?></h1>

    <p>
        Apprenant :
        <strong><?= htmlspecialchars($_SESSION['nom']) ?></strong>
    </p>

    <p>
        <strong>30 questions</strong>
    </p>

    <form method="POST" action="resultat.php">

        <?php foreach ($questions as $index => $question): ?>

            <div class="question">

                <h3>
                    Question <?= $index + 1 ?> / 30
                </h3>

                <p>
                    <strong>
                        <?= htmlspecialchars($question['question']) ?>
                    </strong>
                </p>

                <label class="option">
                    <input
                        type="radio"
                        name="reponse[<?= $question['id'] ?>]"
                        value="A"
                        required
                    >

                    A.
                    <?= htmlspecialchars($question['option_a']) ?>
                </label>

                <label class="option">
                    <input
                        type="radio"
                        name="reponse[<?= $question['id'] ?>]"
                        value="B"
                    >

                    B.
                    <?= htmlspecialchars($question['option_b']) ?>
                </label>

                <label class="option">
                    <input
                        type="radio"
                        name="reponse[<?= $question['id'] ?>]"
                        value="C"
                    >

                    C.
                    <?= htmlspecialchars($question['option_c']) ?>
                </label>

                <label class="option">
                    <input
                        type="radio"
                        name="reponse[<?= $question['id'] ?>]"
                        value="D"
                    >

                    D.
                    <?= htmlspecialchars($question['option_d']) ?>
                </label>

            </div>

        <?php endforeach; ?>

        <button class="btn" type="submit">
            Terminer le quiz
        </button>

    </form>

</body>

</html>