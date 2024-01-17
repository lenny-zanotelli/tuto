<?php
function checkbox(string $name, string $value, array $data): string
{

  $attributes = '';
  if (isset($data[$name]) && in_array($value, $data[$name])) {
    $attributes .= 'checked';
  }

  return '<input type="checkbox" name="' . $name . '[]"   value="' . $value . '" ' . $attributes . '>';
}

function radio(string $name, string $value, array $data): string
{

  $attributes = '';
  if (isset($data[$name]) && $value === $data[$name]) {
    $attributes .= 'checked';
  }

  return '<input type="radio" name="' . $name . '" value="' . $value . '" ' . $attributes . '>';
}

function dump($variable)
{
  echo '<pre>';
  var_dump($variable);
  echo '</pre>';
}

function select(string $name, $value, array $options): string
{
  $html_options = [];
  foreach ($options as $k => $option) {
    $attributes = $k == $value ? 'selected' : '';
    $html_options[] = "<option value='$k' $attributes>$option</option>";
  }
  return "<select class='form-control' name='$name'>" . implode($html_options) . '</select>';
}

function creneaux_html(array $creneaux)
{
  if (empty($creneaux)) {
    return 'Fermé';
  }

  $phrases = [];
  foreach ($creneaux as $creneau) {
    $phrases[] = "de <strong>{$creneau[0]}h</strong> à {$creneau[1]}h";
  };
  return 'Ouvert ' . implode(' et ', $phrases);
}

function in_creneaux(int $heure, array $creneaux): bool
{
  foreach ($creneaux as $creneau) {
    $debut = $creneau[0];
    $fin = $creneau[1];
    if ($heure >= $debut && $heure < $fin) {
      return true;
    }
  }
  return false;
}
