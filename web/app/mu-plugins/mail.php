<?php

// Looking to send emails in production? Check out our Email API/SMTP product!
function mailtrap($phpmailer) {
  $phpmailer->isSMTP();
  $phpmailer->Host = env('SMTP_HOST', 'sandbox.smtp.mailtrap.io');
  $phpmailer->SMTPAuth = env('SMTP_AUTH', true);
  $phpmailer->Port = env('SMTP_PORT', 587);
  $phpmailer->Username = env('SMTP_USERNAME', 'api');
  $phpmailer->Password = env('SMTP_PASSWORD');
}

add_action('phpmailer_init', 'mailtrap');