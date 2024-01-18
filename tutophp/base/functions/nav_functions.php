<?php
require_once 'menu_functions.php';
if (!function_exists('nav_menu')) {

  function nav_menu(string $linkClass = ''): string
  {
    return
      nav_item('/index.php', 'Accueil', $linkClass) .
      nav_item('/contact.php', 'Contact', $linkClass) .
      nav_item('/jeu.php', 'Jeu', $linkClass);
  }
}
