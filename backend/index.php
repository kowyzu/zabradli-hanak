<?php
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

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Content-Type");
  header("Access-Control-Allow-Methods: POST, OPTIONS");
  http_response_code(200);
  exit();
}
;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");


// Include Composer's autoloader
require __DIR__ . '/vendor/autoload.php';


// Environmental variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

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

if (!$name || !$message || (!$email && !$phone)) {
  echo json_encode([
    'success' => false,
    'message' => 'Některé povinné údaje chybí.',
  ]);
  exit;
}

if ($email && !validateEmail($email)) {
  echo json_encode([
    'success' => false,
    'message' => 'Zkontrolujte prosím zadaný e-mail.',
  ]);
  exit;
}

if ($phone && !validatePhone($phone)) {
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

// Data validation and sanitization


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
  $mail->setFrom($username, 'Hanak');
  $mail->addAddress('kowyzu@gmail.com', 'Kowyzu');     //Add a recipient

  // Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = $data['name'];
  $mail->Body = $data['message'];
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  // $mail->send();
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



