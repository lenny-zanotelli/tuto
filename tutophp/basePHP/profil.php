<?php
$nom = null;
if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter') {
  unset($_COOKIE['utilisateur']);
  setcookie('utilisateur', '', time() - 10);
}
if (!empty($_COOKIE['utilisateur'])) {
  $nom = $_COOKIE['utilisateur'];
}

if (!empty($_POST['nom'])) {
  setcookie('utilisateur', $_POST['nom']);
  $nom = $_POST['nom'];
}
require 'elements/header.php';
?>
<?php if ($nom) : ?>
  <h1>Bonjour <?= htmlentities($nom) ?></h1>
  <a href="profil.php?action=deconnecter">Se decconecter</a>
  <form action="" method="POST">
    <div class="form-group">
      <input type="text" name="nom" class="form-control" placeholder="Entrez votre nom">
    </div>
    <button class="btn btn-primary">Se connecter</button>
  </form>
<?php endif; ?>

<?php require 'elements/footer.php'; ?>