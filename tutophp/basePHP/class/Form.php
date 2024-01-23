<?php
class Form
{

  public static $class = "form-control";

  public static function checkbox(string $name, string $value, array $data): string
  {

    $attributes = '';
    if (isset($data[$name]) && in_array($value, $data[$name])) {
      $attributes .= 'checked';
    }
    $class = self::$class;

    return '<input type="checkbox" name="' . $name . '[]"   value="' . $value . '" ' . $attributes . ' . class="' . $class . '">';
  }
}
