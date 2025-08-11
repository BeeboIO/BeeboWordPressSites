<?php

// Looking to send emails in production? Check out our Email API/SMTP product!
function mailtrap($phpmailer) {
  $phpmailer->isSMTP();
  $phpmailer->Host = SMTP_HOST;
  $phpmailer->SMTPAuth = SMTP_AUTH;
  $phpmailer->Port = SMTP_PORT;
  $phpmailer->Username = SMTP_USERNAME;
  $phpmailer->Password = SMTP_PASSWORD;
}

add_action('phpmailer_init', 'mailtrap');