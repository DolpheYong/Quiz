```php
<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = trim($_POST['nom'] ?? '');

    if ($nom === '') {

        $erreur = "Veuillez saisir votre nom.";

    } else {

        $_SESSION['nom'] = $nom;

        // Nettoyer les anciennes données du quiz
        unset(
            $_SESSION['matiere'],
            $_SESSION['questions'],
            $_SESSION['score'],
            $_SESSION['total'],
            $_SESSION['pourcentage'],
            $_SESSION['correction']
        );

        header('Location: matiere.php');
        exit;
    }
}

?>

<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Quiz | Génie Logic</title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>

<body>

    <!-- HEADER -->

    <header class="header">

        <div class="header-content">

            <div class="logo">
                GÉNIE <span>LOGIC</span>
            </div>

            <div class="header-title">
                Centre de formation
            </div>

        </div>

    </header>


    <!-- CONTENU -->

    <main class="main">

        <section class="welcome-card">

            <div class="welcome-icon">
                ?
            </div>

            <h1>
                Quiz Génie Logic
            </h1>

            <h2>
                Testez vos connaissances
            </h2>

            <p class="description">
                Bienvenue sur la plateforme de quiz de
                Génie Logic.
                Choisissez votre matière et évaluez
                vos connaissances à travers une série
                de questions.
            </p>


            <?php if (isset($erreur)): ?>

                <div class="error">

                    <?= htmlspecialchars($erreur) ?>

                </div>

            <?php endif; ?>


            <form method="POST">

                <div class="form-group">

                    <label for="nom">
                        Nom de l'apprenant
                    </label>

                    <input
                        type="text"
                        id="nom"
                        name="nom"
                        placeholder="Entrez votre nom"
                        autocomplete="name"
                        required
                        autofocus
                    >

                </div>


                <button
                    type="submit"
                    class="btn-primary"
                >
                    Commencer le quiz
                </button>

            </form>

        </section>

    </main>


    <!-- FOOTER -->

    <footer class="footer">

        © <?= date('Y') ?> Génie Logic
        — Plateforme de quiz

    </footer>

</body>

</html>
```
