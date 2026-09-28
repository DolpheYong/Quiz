<?php

session_start();

// Vérifier que le quiz est terminé
if (
    !isset(
        $_SESSION['nom'],
        $_SESSION['matiere'],
        $_SESSION['score'],
        $_SESSION['total'],
        $_SESSION['correction']
    )
) {
    header('Location: index.php');
    exit;
}

$nom = $_SESSION['nom'];
$matiere = $_SESSION['matiere'];
$score = $_SESSION['score'];
$total = $_SESSION['total'];
$pourcentage = $_SESSION['pourcentage'];
$correction = $_SESSION['correction'];

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Correction - Quiz</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: #f5f5f5;
        }

        .header {
            background: white;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .score {
            font-size: 30px;
            font-weight: bold;
        }

        .question {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .correct {
            color: green;
            font-weight: bold;
        }

        .incorrect {
            color: red;
            font-weight: bold;
        }

        .reponse {
            margin: 8px 0;
        }

        .bonne-reponse {
            color: green;
            font-weight: bold;
        }

        .explication {
            background: #f0f0f0;
            padding: 12px;
            margin-top: 15px;
            border-radius: 5px;
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

    <div class="header">

        <h1>Correction du quiz</h1>

        <p>
            Apprenant :
            <strong>
                <?= htmlspecialchars($nom) ?>
            </strong>
        </p>

        <p>
            Matière :
            <strong>
                <?= htmlspecialchars($matiere) ?>
            </strong>
        </p>

        <div class="score">
            <?= $score ?> / <?= $total ?>
        </div>

        <p>
            <?= $pourcentage ?> %
        </p>

    </div>


    <?php foreach ($correction as $index => $question): ?>

        <div class="question">

            <h3>
                Question <?= $index + 1 ?> / <?= $total ?>
            </h3>

            <p>
                <strong>
                    <?= htmlspecialchars($question['question']) ?>
                </strong>
            </p>


            <?php if ($question['reponse_utilisateur'] === 'A'): ?>

                <p class="reponse">
                    Votre réponse :
                    <strong>
                        A. <?= htmlspecialchars($question['option_a']) ?>
                    </strong>
                </p>

            <?php elseif ($question['reponse_utilisateur'] === 'B'): ?>

                <p class="reponse">
                    Votre réponse :
                    <strong>
                        B. <?= htmlspecialchars($question['option_b']) ?>
                    </strong>
                </p>

            <?php elseif ($question['reponse_utilisateur'] === 'C'): ?>

                <p class="reponse">
                    Votre réponse :
                    <strong>
                        C. <?= htmlspecialchars($question['option_c']) ?>
                    </strong>
                </p>

            <?php elseif ($question['reponse_utilisateur'] === 'D'): ?>

                <p class="reponse">
                    Votre réponse :
                    <strong>
                        D. <?= htmlspecialchars($question['option_d']) ?>
                    </strong>
                </p>

            <?php else: ?>

                <p class="incorrect">
                    Vous n'avez pas répondu.
                </p>

            <?php endif; ?>


            <?php

            $lettreBonneReponse = $question['bonne_reponse'];

            if ($lettreBonneReponse === 'A') {
                $texteBonneReponse = $question['option_a'];
            } elseif ($lettreBonneReponse === 'B') {
                $texteBonneReponse = $question['option_b'];
            } elseif ($lettreBonneReponse === 'C') {
                $texteBonneReponse = $question['option_c'];
            } else {
                $texteBonneReponse = $question['option_d'];
            }

            ?>


            <p class="bonne-reponse">

                Bonne réponse :
                <?= htmlspecialchars($lettreBonneReponse) ?>.
                <?= htmlspecialchars($texteBonneReponse) ?>

            </p>


            <?php if ($question['correct']): ?>

                <p class="correct">
                    ✓ Bonne réponse
                </p>

            <?php else: ?>

                <p class="incorrect">
                    ✗ Mauvaise réponse
                </p>

            <?php endif; ?>


            <?php if (!empty($question['explication'])): ?>

                <div class="explication">

                    <strong>Explication :</strong>

                    <?= htmlspecialchars($question['explication']) ?>

                </div>

            <?php endif; ?>

        </div>

    <?php endforeach; ?>


    <div style="text-align: center;">

        <a class="btn" href="index.php">
            Refaire un quiz
        </a>

    </div>

</body>

</html>