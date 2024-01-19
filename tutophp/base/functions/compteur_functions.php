<?php

function ajouter_vue()
{
  // Verifier si le ficher compteur existe
  // SInon on cree le fichier avec la valeur 1
  $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';

  if (file_exists($fichier)) {
    // Si le fichier existe on incremente
    $compteur = (int) file_get_contents($fichier);
    $compteur++;
    file_put_contents($fichier, $compteur);
  } else {
    file_put_contents($fichier, '1');
  }
}

function nombre_vues(): string
{
  $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
  return file_get_contents($fichier);
}

function nombre_vues_mois(int $annee, int $mois): int
{
  $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
  $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
  $fichiers = glob($fichier);
  $total = 0;
  foreach ($fichiers as $fichier) {
    $total += (int) file_get_contents($fichier);
  }
  return $total;
}

function nombre_vues_details_mois(int $annee, int $mois): array
{
  $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
  $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
  $fichiers = glob($fichier);
  $visites = [];
  foreach ($fichiers as $fichier) {
    $parties = explode('-', basename($fichier));
    $visites[] = [
      'annee' => $parties[1],
      'mois' => $parties[2],
      'jour' => $parties[3],
      'visites' => file_get_contents($fichier)
    ];
  }
  return $visites;
}
