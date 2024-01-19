<?php
require_once 'functions/nav_functions.php';
require_once 'functions/auth_functions.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

  <title>
    <?php
    if (isset($title)) {
      echo $title;
    } else {
      echo 'Mon site';
    }
    ?>
  </title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/starter-template/">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">Mon site</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <?= nav_menu('nav-link'); ?>
      </ul>
      <ul class="navbar-nav">
        <?php if (est_connecte()) : ?>
          <li class="nav-item">
            <a class="nav-link" href="/logout.php">Se Déconnecter</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

  <main class="container-fluid">