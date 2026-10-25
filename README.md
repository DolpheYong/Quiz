# Quiz Génie Logic

Application web de quiz développée en PHP avec une base de données MySQL/MariaDB. Elle permet à un apprenant de saisir son nom, de choisir une matière, de répondre aux questions, puis de consulter son résultat et la correction.

> **Note :** ce README est basé sur les informations disponibles sur le projet. Vérifie les noms des tables et des colonnes dans le code avant d'importer un schéma SQL.

## Fonctionnalités

- Saisie du nom de l'apprenant.
- Choix d'une matière : Anglais, Français ou Informatique.
- Affichage des questions et des choix de réponses.
- Affichage du résultat et de la correction.
- Pages de leçons HTML/CSS.
- Exécution en local avec XAMPP.

## Technologies

- PHP
- MySQL ou MariaDB
- HTML et CSS
- Apache via XAMPP

## Structure du projet

```text
quiz-local/
├── assets/
│   ├── css/
│   │   ├── style.css
│   │   ├── lecon.css
│   │   ├── matiere.css
│   │   ├── quiz.css
│   │   └── menu.css
│   └── js/
│       └── menu.js
├── config/
│   └── database.php
├── lecons/
│   └── developpement/
│       ├── historique.html
│       ├── introduction-html.html
│       └── lecons-html.html
├── index.php
├── matiere.php
├── quiz.php
├── resultat.php
├── correction.php
└── README.md
```

Les fichiers `matiere.css`, `quiz.css`, `menu.css` et `menu.js` sont à garder dans cette liste uniquement s'ils existent réellement dans ton projet.

## Installation sur Windows avec XAMPP

1. Installe et ouvre XAMPP.
2. Démarre **Apache** et **MySQL**.
3. Place ou clone le projet dans le dossier `htdocs`, par exemple :

   ```text
   C:\xampp\htdocs\quiz-local
   ```

4. Ouvre phpMyAdmin : <http://localhost/phpmyadmin/>
5. Crée la base de données utilisée par le projet, ou importe le fichier `.sql` fourni avec celui-ci.
6. Configure les paramètres de connexion dans `config/database.php`.
7. Ouvre le site dans le navigateur : <http://localhost/quiz-local/>

## Configuration de la base de données

Exemple de connexion PDO pour une installation XAMPP locale standard :

```php
<?php
$host = 'localhost';
$dbname = 'quiz_genie_logic';
$username = 'root';
$password = '';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données.');
}
```

Adapte `dbname`, `username` et `password` à ta configuration réelle. Ne publie pas de mot de passe réel dans Git.

## Base de données

Le code du quiz doit utiliser les mêmes noms de tables et de colonnes que le schéma SQL. La table `questions` peut notamment contenir un identifiant, la matière, le texte de la question, quatre propositions et la bonne réponse.

Vérifie les noms exacts dans la requête SQL de `quiz.php` avant d'importer les données. Si un fichier `.sql` existe dans le dépôt, vérifie son contenu avant de l'importer.

## Utilisation

1. Ouvre la page d'accueil.
2. Saisis le nom de l'apprenant.
3. Sélectionne une matière.
4. Réponds aux questions.
5. Consulte le résultat et la correction.

## Dépannage

- **Apache ou MySQL ne démarre pas :** vérifie si un autre programme utilise le port nécessaire.
- **Erreur de connexion SQL :** vérifie que MySQL fonctionne et que les paramètres de `config/database.php` sont corrects.
- **Table inexistante :** vérifie que le bon schéma SQL a été importé.
- **Page introuvable :** vérifie que le projet se trouve dans `C:\xampp\htdocs\quiz-local` et que l'URL est correcte.
- **CSS ou JavaScript non chargé :** vérifie les chemins et les noms des fichiers.

## Git

Avant de modifier le projet :

```bash
git status
git pull
```

Après tes changements, vérifie les fichiers modifiés avant de créer un commit :

```bash
git add README.md
git commit -m "Documente le projet Quiz Génie Logic"
git push
```

N'ajoute pas de mots de passe, de secrets ou d'exports de base de données contenant des données personnelles au dépôt.

## Auteur

Projet pédagogique : **Génie Logic**.
