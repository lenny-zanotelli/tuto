<?php
$url = 'https://samples.openweathermap.org/data/2.5/weather?q=London&appid=b1b15e88fa797225412429c1c50c122a1';
$curl = curl_init($url);
curl_setopt_array($curl, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 1
]);
$response = curl_exec($curl);

if ($response === false) {
  var_dump(curl_error($curl));
} else {
  var_dump(curl_getinfo($curl, CURLINFO_HTTP_CODE));
  $response = json_decode($response, true);
  echo '<pre>';
  var_dump($response['main']['temp']);
  echo '</pre>';
}
curl_close($curl);
