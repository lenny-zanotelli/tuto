<?php
require_once 'functions/form_functions.php';

//Checkbox
$parfums = [
  'fraise' => 4,
  'chocolat' => 5,
  'vanille' => 3
];

// Radio
$cornets = [
  'pot' => 2,
  'cornet' => 3

];
// Checkbox
$supplements = [
  'pepites de chocolat' => 1,
  'chantilly' => 0.5
];
$title = "Composer votre glace";
$ingredients = [];
$total = 0;

foreach (['parfum', 'supplement', 'cornet'] as $name) {
  if (isset($_GET[$name])) {

    $list = $name . 's';
    $choices = $_GET[$name];

    if (is_array($choices)) {

      foreach ($choices as $value) {

        if (isset($$list[$value])) {
          $ingredients[] = $value;
          $total += $$list[$value];
        }
      }
    } else {
      if (isset($cornet[$value])) {
        $ingredients[] = $value;
        $total += $cornet[$value];
      }
    }
  }
}
dump($ingredients);

require 'elements/header.php';
?>

<h1>Composer ma glace</h1>

<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Votre Glace</h5>
        <ul>
          <?php foreach ($ingredients as $ingredient) : ?>
            <li> <?= $ingredient ?> </li>
          <?php endforeach; ?>
        </ul>
        <p>
          <strong>Prix : <?= $total ?> euros</strong>
        </p>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <form action="/jeu.php" method="GET">
      <h2>Choisissez vos parfums</h2>
      <?php foreach ($parfums as $parfum => $prix) : ?>
        <div class="checkbox">
          <label>
            <?= checkbox('parfum', $parfum, $_GET) ?>
            <?= $parfum ?> - <?= $prix ?> euros
          </label>
        </div>
      <?php endforeach; ?>

      <h2>Choisissez votre cornet</h2>
      <?php foreach ($cornets as $cornet => $prix) : ?>
        <div class="checkbox">
          <label>
            <?= radio('cornet', $cornet, $_GET) ?>
            <?= $cornet ?> - <?= $prix ?> euros
          </label>
        </div>
      <?php endforeach; ?>

      <h2>Choisissez vos supplements</h2>

      <?php foreach ($supplements as $supplement => $prix) : ?>
        <div class="checkbox">
          <label>
            <?= checkbox('supplement', $supplement, $_GET) ?>
            <?= $supplement ?> - <?= $prix ?> euros
          </label>
        </div>
      <?php endforeach; ?>


      <button type="submit" class="btn btn-primary">Composer ma glace</button>
    </form>

  </div>
</div>


<h2>$_GET</h2>
<pre>
  <?php
  var_dump($_GET)
  ?>
  </pre>
<h2>$_POST</h2>
<pre>
  <?php
  var_dump($_POST);
  ?>
</pre>


<?php require 'elements/footer.php'; ?>