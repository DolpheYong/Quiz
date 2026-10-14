
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir une matière | Génie Logic</title>

    <link rel="stylesheet" href="/quiz-local/assets/css/menu.css">
    <link rel="stylesheet" href="/quiz-local/assets/css/matiere.css">

    <script src="/quiz-local/assets/js/menu.js" defer></script>
</head>

<body>
    <main class="matiere-container">

        <header class="matiere-header">
            <h1>Quiz Génie Logic</h1>

            <p>
                Bonjour
                <strong><?= htmlspecialchars($_SESSION['nom'], ENT_QUOTES, 'UTF-8') ?></strong> !
            </p>

            <p>Testez vos connaissances et progressez à votre rythme.</p>
        </header>

        <section class="matiere-card">
            <h2>Choisissez une matière</h2>

            <p class="description">
                Sélectionnez une matière pour commencer le quiz de 30 questions.
            </p>

            <form method="POST" action="quiz.php">

                <label class="matiere-option">
                    <input
                        type="radio"
                        name="matiere"
                        value="Anglais"
                        required
                    >
                    <span>
                        <span class="matiere-nom">Anglais</span>
                        <span class="matiere-detail">
                            Vocabulaire, grammaire et compréhension.
                        </span>
                    </span>
                </label>

                <label class="matiere-option">
                    <input
                        type="radio"
                        name="matiere"
                        value="Français"
                    >
                    <span>
                        <span class="matiere-nom">Français</span>
                        <span class="matiere-detail">
                            Orthographe, grammaire et expression.
                        </span>
                    </span>
                </label>

                <label class="matiere-option">
                    <input
                        type="radio"
                        name="matiere"
                        value="Informatique"
                    >
                    <span>
                        <span class="matiere-nom">Informatique générale</span>
                        <span class="matiere-detail">
                            Culture numérique et notions informatiques.
                        </span>
                    </span>
                </label>

                <button class="btn-commencer" type="submit">
                    Commencer le quiz →
                </button>

            </form>
        </section>

    </main>
</body>
</html>
