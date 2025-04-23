<?php 
  $to = 'zuza250@seznam.cz';
  $subject = 'test zabradli';
  $message = 'hello test';
  $header = 'From: webmaster@yourdomain.cz';
  $success = mail($to, $subject, $message, $header);

  var_dump($success);

  if ($success === true) {
    echo 'E‑mail byl odeslán!';  // Email was sent
  } else {
    echo 'Odeslání e‑mailu se nezdařilo.';  // Failed to send
  }
?>
