
const menu = document.createElement("nav");
menu.className = "menu-principal";

menu.innerHTML = `
  <a class="logo" href="/quiz-local/">Génie Logic</a>
  <a href="/quiz-local/">Accueil</a>
  <a href="/quiz-local/matiere.php">Matières</a>
  <a href="/quiz-local/quiz.php">Quiz</a>
  <a href="/quiz-local/lecons/developpement/introduction-html.html">Introduction HTML</a>
  <a href="/quiz-local/lecons/developpement/lecons-html.html">Leçon HTML</a>
  <a href="/quiz-local/lecons/developpement/historique.html">Historique du Web</a>
`;

document.addEventListener("DOMContentLoaded", () => {
  document.body.prepend(menu);
});
