<?php
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


// Read JSON input from body
$rawInput = file_get_contents("php://input");
$data = json_decode($rawInput, true);

$name = $data['name'] ?? '';
$email = $data['email'] ?? '';
$message = $data['message'] ?? '';
$phone = $data['phoneNumber'] ?? '';

if (!$name || !$email || !$message) {
  http_response_code(422); // Unprocessable Entity
  echo json_encode([
    'success' => false,
    'message' => 'Chyba: Některé povinné údaje chybí.',
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


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Custom variables
$username = 'formular@zabradlihanak.cz';
$password = 'UUFJEuTdC976fAHQZJvib_';
$SMTPServer = 'smtp.websupport.cz';
$portNumber = '465';
$security = 'SSL/TLS';

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);




try {
  //Server settings
  $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host = $SMTPServer;                     //Set the SMTP server to send through
  $mail->SMTPAuth = true;                                   //Enable SMTP authentication
  $mail->Username = $username;                     //SMTP username
  $mail->Password = $password;                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port = $portNumber;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom($username, 'Hanak');
  $mail->addAddress('kowyzu@gmail.com', 'Kowyzu');     //Add a recipient

  //Content
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
  http_response_code(400); // Bad request
  echo json_encode([
    'success' => false,
    'message' => 'Chyba: Data nejsou validní.',
    'debug' => $e->getMessage()
  ]);
}



