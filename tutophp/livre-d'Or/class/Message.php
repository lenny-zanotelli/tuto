<?php
class Message
{
  const LIMIT_USERNAME = 3;
  const LIMIT_MESSAGE = 20;
  private $username;
  private $message;
  private $date;

  /**
   * fromJSON
   *
   * @param  mixed $json
   * @return Message
   */
  public static function fromJSON(string $json): Message
  {
    $data = json_decode($json, true);
    return new self($data['username'], $data['message'], new DateTime("@" . $data['date']));
  }

  /**
   * __construct
   *
   * @param  mixed $username
   * @param  mixed $message
   * @param  mixed $date
   * @return void
   */
  public function __construct(string $username, string $message, ?DateTime $date = null)
  {
    $this->username = $username;
    $this->message = $message;
    $this->date = $date ?: new DateTime();
  }

  /**
   * Renvoit un booléen si le message enregistrer est validde
   *
   * @return bool
   */
  public function isValid(): bool
  {
    return empty($this->getErrors());
  }

  /**
   * Validation des messages et pseudonymes
   *
   * @return array
   */
  public function getErrors(): array
  {
    $errors = [];
    if (strlen($this->username) < self::LIMIT_USERNAME) {
      $errors['username'] = 'Votre pseudo est trop court';
    }
    if (strlen($this->message) > self::LIMIT_MESSAGE) {
      $errors['message'] = 'Votre message est trop long';
    }
    return $errors;
  }

  /**
   * toHTML
   *
   * @return string
   */
  public function toHTML(): string
  {
    $username = htmlentities($this->username);
    $date = $this->date->format('d/m/Y à H:i');
    $message = nl2br(htmlentities($this->message));
    return '<p><strong>' . $username . '</strong> <em>le ' . $date . '</em> <br>' . $message . '</p>';
  }

  /**
   * toJSON
   *
   * @return string
   */
  public function toJSON(): string
  {
    return json_encode([
      'username' => $this->username,
      'message' => $this->message,
      'date' => $this->date->getTimestamp(),
    ]);
  }
}
