<?php
date_default_timezone_set('Europe/Paris');
require_once 'functions/form_functions.php';
$title = 'Nous contacter';
$nav = 'contact';
require_once 'functions/config.php';
$heure = (int)($_GET['heure'] ?? date('G'));
$jour = (int)($_GET['jour'] ?? date('N') - 1);
$creneaux = CRENEAUX[date('N') - 1];
$ouvert = in_creneaux($heure, $creneaux);
$color = $ouvert ? "green" : "red";
require 'elements/header.php';
?>

<div class="row">
  <div class="col-md-8">
    <h2>Nous contacter</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam cum expedita ipsum natus culpa voluptatem ea. Mollitia similique at necessitatibus, temporibus distinctio aspernatur. Laboriosam adipisci, iste eos architecto ullam eaque.</p>
  </div>
  <div class="col-md-4">
    <h2>Horraire d'Ouvertures</h2>
    <?php if ($ouvert) : ?>
      <div class="alert alert-success">
        Le magasin est ouvert
      </div>
    <?php else : ?>
      <div class="alert alert-danger">
        Le Magasin est fermé
      </div>
    <?php endif; ?>

    <form action="" method="GET">

      <div class="from-group">
        <?= select('jour', $jour, JOURS) ?>
      </div>

      <div class="form-group">
        <input type="number" name="heure" value="<?= $heure ?>">
      </div>
      <button type="submit" class="btn btn-primary">Voir si le magasin est ouvert</button>
    </form>


    <ul>
      <?php foreach (JOURS as $k => $jour) : ?>
        <li>
          <strong>
            <?= $jour ?>
          </strong>
          <?= creneaux_html(CRENEAUX[$k]) ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

<?php require 'elements/footer.php' ?>