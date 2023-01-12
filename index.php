<!DOCTYPE html>
<html>
<head>
  <title>ToDoList</title>
  <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>

  <form method="post">
    <label for="input">A faire :</label>
    <input type="text" id="input" name="input">
    <input type="submit" value="Envoyer">
  </form>

  <!-- Cette partie ajoute une balise de formulaire qui envoie les données avec "post". 
  On créer un label pour le formulaire avec le texte "A faire :". 
  On ajoute une zone de saisie de texte avec un id et "input" pour l'identifier dans le script PHP.
  On créer un bouton d'envoi pour envoyer le formulaire.-->

  
  <?php
  session_start();
  if(isset($_POST['input'])){
    if(isset($_SESSION['inputs'])){
      $_SESSION['inputs'][] = $_POST['input'];
    }else{
      $_SESSION['inputs'] = array($_POST['input']);
    }
  }
  ?>

<!-- Cette partie ajoute une section de code PHP qui démarre une session pour stocker les données envoyées, 
vérifie si les données ont été envoyées via le formulaire avec "post", vérifie si des données ont déjà été 
stockées dans la session, ajoute les données envoyées via le formulaire et stocke les données envoyées via 
le formulaire -->

  <div id="todolist">
    <h2>Ce que vous avez à faire :</h2>
    <ul>
      <?php
      if(isset($_SESSION['inputs'])){
        foreach($_SESSION['inputs'] as $input) {
          echo "<li>".$input."</li>";
        }
      }
      ?>
    </ul>
  </div>

  <!-- Cette partie ajoute une section pour afficher la liste d'éléments à faire qui ont été rentrées via le formulaire, 
  ajoute un titre, ouvre une liste non ordonnée pour afficher ces éléments, vérifie si des données ont été stockées dans 
  la session, utilise une boucle pour ajouter chaque élément à la liste en utilisant la balise "li". -->