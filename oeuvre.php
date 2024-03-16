<?php
  require 'header.php';
  require 'bdd.php';

  $db = connexion();

  if (empty($_GET['id'])) {
    header('Location: index.php');
  }

  $sqlQuery = 'SELECT * FROM oeuvres WHERE id = ?';
  $artWorkStatement = $db->prepare($sqlQuery);
  $artWorkStatement->execute([$_GET['id']]);
  $artWork = $artWorkStatement->fetch();

  if (!$artWork) {
    header('Location: index.php');
  }
?>

<article id="detail-oeuvre">
  <div id="img-oeuvre">
    <img src="<?= $artWork['image'] ?>" alt="<?= $artWork['titre'] ?>">
  </div>
  <div id="contenu-oeuvre">
    <h1><?= $artWork['titre'] ?></h1>
    <p class="description"><?= $artWork['artiste'] ?></p>
    <p class="description-complete">
      <?= $artWork['description'] ?>
    </p>
  </div>
</article>

<?php require 'footer.php'; ?>