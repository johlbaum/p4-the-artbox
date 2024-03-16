<?php
  if (
    empty($_POST['titre'])
    || empty($_POST['artiste'])
    || empty($_POST['description'])
    || empty($_POST['image'])
    || strlen($_POST['description']) < 3
    || !filter_var($_POST['image'], FILTER_VALIDATE_URL)
  ) {
    header('Location: ajouter.php?erreur=true');
  } else {
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $image = htmlspecialchars($_POST['image']);

    require "bdd.php";
    $db = connexion();

    $sqlQuery = 'INSERT INTO oeuvres(titre, artiste, image, description) VALUES (:titre, :artiste, :image, :description)';
    $workArtStatement = $db->prepare($sqlQuery);
    $workArtStatement->execute([
      'titre' => $titre,
      'artiste' => $artiste,
      'image' => $image,
      'description' => $description,
    ]);

    header('Location: oeuvre.php?id=' . $db->lastInsertId());
  }