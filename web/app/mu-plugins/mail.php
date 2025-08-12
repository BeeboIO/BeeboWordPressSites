<?php

add_action('phpmailer_init', function ($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = constant('SMTP_HOST');
    $phpmailer->SMTPAuth = constant('SMTP_AUTH');
    $phpmailer->Port = constant('SMTP_PORT');
    $phpmailer->Username = constant('SMTP_USERNAME');
    $phpmailer->Password = constant('SMTP_PASSWORD');
});
