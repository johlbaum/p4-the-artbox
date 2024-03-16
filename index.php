<?php
  require 'header.php';
  require 'bdd.php';

  $db = connexion();
  $artWorks = $db->query('SELECT * FROM oeuvres ORDER BY id ASC');
?>

<div id="liste-oeuvres">
  <?php foreach ($artWorks as $artWork) : ?>
  <article class="oeuvre">
    <a href="oeuvre.php?id=<?= $artWork['id'] ?>">
      <img src="<?= $artWork['image'] ?>" alt="<?= $artWork['titre'] ?>">
      <h2><?= $artWork['titre'] ?></h2>
      <p class="description"><?= $artWork['artiste'] ?></p>
    </a>
  </article>
  <?php endforeach; ?>
</div>

<?php require 'footer.php'; ?>