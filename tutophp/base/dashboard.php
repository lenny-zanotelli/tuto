<?php
require_once 'functions/compteur_functions.php';
$annee = (int) date('Y');
$annee_selected = empty($_GET['annee']) ? null : (int) $_GET['annee'];
$mois_selected = empty($_GET['mois']) ? null : $_GET['mois'];
if ($annee_selected && $mois_selected) {
  $total_vues = nombre_vues_mois($annee_selected, $mois_selected);
  $detail = nombre_vues_details_mois($annee_selected, $mois_selected);
} else {
  $total_vues = nombre_vues();
}
$mois = [
  '01' => 'Janvier',
  '02' => 'Février',
  '03' => 'Mars',
  '04' => 'Avril',
  '05' => 'Mai',
  '06' => 'Juin',
  '07' => 'Juillet',
  '08' => 'Aout',
  '09' => 'Septembre',
  '10' => 'Octobre',
  '11' => 'Novembre',
  '12' => 'Décembre'
];
require 'elements/header.php';
?>

<div class="row">
  <div class="col-md-8">
    <div class="col-sm-4 list-group">
      <?php for ($i = 0; $i < 5; $i++) : ?>
        <a href="dashboard.php?annee=<?= $annee - $i ?>" class="list-group-item <?= $annee - $i === $annee_selected ? 'active' : '' ?>">
          <?= $annee - $i ?>
        </a>
        <?php if ($annee - $i === $annee_selected) : ?>
          <div class="list-group">
            <?php foreach ($mois as $numero => $nom) : ?>
              <a href="dashboard.php?annee=<?= $annee_selected ?>&mois=<?= $numero ?> " class="list-group-item <?= $numero === $mois_selected ? 'active' : '' ?>"><?= $nom ?></a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      <?php endfor; ?>

    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <strong style="font-size: 2em;"> <?= $total_vues ?></strong> <br>
          Visite<?= $total_vues > 1 ? 's' : '' ?> total
        </div>
      </div>
      <?php if (isset($detail)) : ?>
        <h2>Détails des visistes pour le mois :</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Jour</th>
              <th>mois</th>
              <th>Année</th>
              <th>Nombre de visites</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($detail as $ligne) : ?>
              <tr>
                <td><?= $ligne['jour'] ?></td>
                <td><?= $ligne['mois'] ?></td>
                <td><?= $ligne['annee'] ?></td>
                <td><?= $ligne['visites'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </div>
</div>



<?php require 'elements/footer.php'; ?>