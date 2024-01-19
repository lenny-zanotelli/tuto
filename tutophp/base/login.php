<?php
$erreur = null;
if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
  if ($_POST['pseudo'] === 'John' && $_POST['password'] === 'Doe') {
    session_start();
    $_SESSION['connecte'] = 1;
    header('Location: /dashboard.php');
  } else {
    $erreur = "Identifiants incorrects";
  }
}

require_once 'functions/auth_functions.php';
if (est_connecte()) {
  header('Location: /dashboard.php');
  exit();
}

require 'elements/header.php';
?>

<?php if ($erreur) : ?>
  <div class="alert alert-danger"><?= $erreur ?> </div>
<?php endif; ?>

<form action="" method="POST">
  <div class="form-group">
    <input class="form-control" type="text" name="pseudo" placeholder="Username">
  </div>
  <div class="form-grooup">
    <input class="form-control" type="password" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php require 'elements/footer.php'; ?>