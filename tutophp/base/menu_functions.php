<?php
if (!function_exists('nav_item')) {


  function nav_item (string $lien, string $titre, string $linkClass = ''): string 
  {
    $class = 'nav-item';
    if ($_SERVER['SCRIPT_NAME'] === $lien) {
      $class .= ' active';
    }
    return <<<HTML
      <li class="$class">
        <a class="$linkClass" href="$lien">$titre</a>
      </li>
HTML;
  }
}
?>