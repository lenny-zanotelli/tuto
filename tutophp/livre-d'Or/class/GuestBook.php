<?php
class GuestBook
{
  private $file;

  /**
   * __construct
   *
   * @param  mixed $file
   * @return void
   */
  public function __construct(string $file)
  {
    $directory = dirname($file);
    if (!is_dir($directory)) {
      mkdir($directory, 0777, true);
    }
    if (!file_exists($file)) {
      touch($file);
    }
    $this->file = $file;
  }

  /**
   * Ajouter un message dans le fichier texte
   *
   * @param  mixed $message
   * @return void
   */
  public function addMessage(Message $message)
  {
    file_put_contents($this->file, $message->toJSON() . PHP_EOL, FILE_APPEND);
  }

  /**
   * Renvoit les messages stockées dans le fichier texte
   *
   * @return array
   */
  public function getMessages(): array
  {
    $content = trim(file_get_contents($this->file));
    $lines = explode(PHP_EOL, $content);
    $messages = [];
    foreach ($lines as $line) {
      $messages[] = Message::fromJSON($line);
    }
    return array_reverse($messages);
  }
}
