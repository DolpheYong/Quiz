
const menu = document.createElement("nav");
menu.className = "menu-principal";

menu.innerHTML = `
  <a class="logo" href="/quiz-local/">Génie Logic</a>
  <a href="/quiz-local/">Accueil</a>
  <a href="/quiz-local/index.php">Cours</a>
  <a href="/quiz-local/matiere.php">Matières</a>
  <a href="/quiz-local/quiz.php">Quiz</a>
`;

document.addEventListener("DOMContentLoaded", () => {
  document.body.prepend(menu);
});
