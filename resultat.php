<?php

session_start();

require_once 'config/database.php';

// Vérifier que l'apprenant a commencé le quiz
if (!isset($_SESSION['nom'], $_SESSION['matiere'], $_SESSION['questions'])) {
    header('Location: index.php');
    exit;
}

// Vérifier que les réponses ont été envoyées
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$reponses = $_POST['reponse'] ?? [];
$questions = $_SESSION['questions'];

$score = 0;
$total = count($questions);

$correction = [];

foreach ($questions as $question) {

    $questionId = $question['id'];

    // Réponse donnée par l'apprenant
    $reponseUtilisateur = $reponses[$questionId] ?? null;

    // Bonne réponse
    $bonneReponse = $question['bonne_reponse'];

    // Vérifier la réponse
    $correct = ($reponseUtilisateur === $bonneReponse);

    if ($correct) {
        $score++;
    }

    // Préparer la correction
    $correction[] = [
        'question' => $question['question'],
        'option_a' => $question['option_a'],
        'option_b' => $question['option_b'],
        'option_c' => $question['option_c'],
        'option_d' => $question['option_d'],
        'reponse_utilisateur' => $reponseUtilisateur,
        'bonne_reponse' => $bonneReponse,
        'explication' => $question['explication'],
        'correct' => $correct
    ];
}

// Calcul du pourcentage
$pourcentage = ($total > 0)
    ? round(($score / $total) * 100)
    : 0;

// Garder les résultats dans la session
$_SESSION['score'] = $score;
$_SESSION['total'] = $total;
$_SESSION['pourcentage'] = $pourcentage;
$_SESSION['correction'] = $correction;

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Résultat du quiz</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
            text-align: center;
        }

        .resultat {
            border: 1px solid #ddd;
            padding: 30px;
            border-radius: 10px;
        }

        .score {
            font-size: 40px;
            font-weight: bold;
            margin: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin-top: 20px;
            text-decoration: none;
            background: #333;
            color: white;
            border-radius: 5px;
        }

    </style>

</head>

<body>

    <div class="resultat">

        <h1>Résultat du quiz</h1>

        <p>
            Apprenant :
            <strong>
                <?= htmlspecialchars($_SESSION['nom']) ?>
            </strong>
        </p>

        <p>
            Matière :
            <strong>
                <?= htmlspecialchars($_SESSION['matiere']) ?>
            </strong>
        </p>

        <div class="score">

            <?= $score ?> / <?= $total ?>

        </div>

        <h2>
            <?= $pourcentage ?> %
        </h2>

        <p>
            Vous avez obtenu
            <strong><?= $score ?></strong>
            bonne(s) réponse(s) sur
            <strong><?= $total ?></strong>.
        </p>

        <a class="btn" href="correction.php">
            Voir la correction
        </a>

    </div>

</body>

</html>