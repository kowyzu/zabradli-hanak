<?php
// Set timezone
date_default_timezone_set('Europe/Prague');

// Include Composer's autoloader
require __DIR__ . '/vendor/autoload.php';

// Environmental variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

/////////////////
// FUNCTIONS
/////////////////

// Sanitize input from user
function clean($input): string
{
  $input = trim($input);
  $input = strip_tags($input);
  return $input;
}
;

// Validate e-mail
function validateEmail($input): bool
{
  if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  }
}

// Validate phone
function validatePhone($input): bool
{
  if (str_contains($input, '/[^\d+]/g')) {
    return false;
  }
  $digits = preg_replace('/\D/', '', $input);
  if (strlen($digits) > 12 || strlen($digits) < 9) {
    return false;
  }
  return true;
}

/////////////////
// MAIN PROGRAMM
////////////////

// Headers
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Content-Type");
  header("Access-Control-Allow-Methods: POST, OPTIONS");
  http_response_code(200);
  exit();
}

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");

$username = $_ENV['USERNAME'];
$password = $_ENV['PASSWORD'];
$SMTPServer = $_ENV['SMTP_SERVER'];
$portNumber = $_ENV['PORT_NUMBER'];

// Read JSON input from body
$rawInput = file_get_contents("php://input");
$data = json_decode($rawInput, true);

$name = $data['name'] ?? '';
$email = $data['email'] ?? '';
$message = $data['message'] ?? '';
$phone = $data['phoneNumber'] ?? '';
$token = $data['turnstileToken'] ?? '';
$date = date('d.m.Y H:i');

// Verify the Turnstile token with Cloudflare
$verifyUrl = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
$secretKey = $_ENV['TURNSTILE_SECRET_KEY'];

$context = stream_context_create([
  'http' => [
    'method' => 'POST',
    'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
    'content' => http_build_query([
      'secret' => $secretKey,
      'response' => $token,
      'remoteip' => $_SERVER['REMOTE_ADDR'],
    ]),
  ]
]);

$response = file_get_contents($verifyUrl, false, $context);
if ($response === false) {
  echo json_encode([
    'success' => false,
    'message' => 'Chyba při ověřování CAPTCHA. Zkuste to, prosím, znovu.',
  ]);
  exit;
}

$verification = json_decode($response, true);
if (!is_array($verification) || !$verification['success']) {
  echo json_encode([
    'success' => false,
    'message' => 'Ověření CAPTCHA selhalo. Zkuste to, prosím, znovu.',
  ]);
  exit;
}

// Data validation
if (!$name || !$message || (!$email && !$phone)) {
  echo json_encode([
    'success' => false,
    'message' => 'Některé povinné údaje chybí.',
  ]);
  exit;
}

if ($phone === '' && !validateEmail($email)) {
  echo json_encode([
    'success' => false,
    'message' => 'Zkontrolujte prosím zadaný e-mail.',
  ]);
  exit;
}

if ($email === '' && !validatePhone($phone)) {
  echo json_encode([
    'success' => false,
    'message' => 'Zkontrolujte prosím zadané telefonní číslo.',
  ]);
  exit;
}

if (!is_array($data)) {
  http_response_code(400);
  echo json_encode([
    'success' => false,
    'message' => 'Chybná JSON data – nelze dekódovat.',
  ]);
  exit;
}

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  // Server settings
  $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host = $SMTPServer;                     //Set the SMTP server to send through
  $mail->SMTPAuth = true;                                   //Enable SMTP authentication
  $mail->Username = $username;                     //SMTP username
  $mail->Password = $password;                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port = $portNumber;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  // Recipients
  $mail->setFrom($username, 'Formulář Zábradlí Hanák');
  $mail->addAddress('kowyzu@gmail.com', 'Kowyzu');     //Add a recipient

  // Content
  $mail->CharSet = 'UTF-8';
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Zábradlí Hanák kontaktní formulář ' . $date;

  // Body
  $mail->Body = "<h2>Nová zpráva z kontaktního formuláře z " . $date . ":</h2>";
  $mail->Body .= "<hr style='border-top: 2px solid #a40c24'>";
  $mail->Body .= "<p><strong>Jméno:</strong> " . htmlspecialchars(clean($name)) . "</p>";
  if (!empty($phone)) {
    $mail->Body .= "<p><strong>Telefonní číslo:</strong> " . htmlspecialchars(clean($phone)) . "</p>";
  }
  if (!empty($email)) {
    $mail->Body .= "<p><strong>E-mail:</strong> " . htmlspecialchars(clean($email)) . "</p>";
  }
  $mail->Body .= "<p><strong>Zpráva:</strong><br>" . nl2br(htmlspecialchars(clean($message))) . "</p>";
  $mail->Body .= "<hr><p style='font-size:12px;color:#888;'>Zpráva byla odeslána z kontaktního formuláře na webu Zábradlí Hanák.</p>";


  // Alt Body
  $mail->AltBody = "Nová zpráva z webového formuláře z:" . $date . "\n\n";
  $mail->AltBody .= "Jméno: " . htmlspecialchars(clean($name)) . "\n";
  if (!empty($phone)) {
    $mail->AltBody .= "Telefonní číslo: " . htmlspecialchars(clean($phone)) . "\n";
  }
  if (!empty($email)) {
    $mail->AltBody .= "E-mail: " . htmlspecialchars(clean($email)) . "\n";
  }
  $mail->AltBody .= "Zpráva:\n" . htmlspecialchars(clean($message)) . "\n\n";
  $mail->AltBody .= "Zpráva byla odeslána z webu Zábradlí Hanák.";


  // Handle mail sending
  $mail->send();
  echo json_encode([
    'success' => true,
    'message' => 'Formulář byl úspěšně odeslán.'
  ]);
} catch (Exception $e) {
  http_response_code(400);
  echo json_encode([
    'success' => false,
    'message' => 'Chyba: Data nejsou validní.',
    'debug' => $e->getMessage()
  ]);
}



