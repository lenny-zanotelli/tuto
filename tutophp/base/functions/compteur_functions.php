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
