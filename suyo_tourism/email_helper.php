<?php
function sendVisitorNotification(string $email, string $full_name, string $subject, string $message): bool
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    $headers = [
        'From: Suyo Tourism <no-reply@suyo-tourism.local>',
        'Reply-To: tourism@suyo.ilocossur.gov.ph',
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8'
    ];

    $mail_sent = @mail(
        $email,
        $subject,
        "Hello {$full_name},\n\n{$message}\n\nThank you,\nSuyo Tourism",
        implode("\r\n", $headers)
    );

    if (!$mail_sent) {
        error_log("Suyo Tourism email could not be sent to {$email}. Check the PHP SMTP configuration.");
    }

    return $mail_sent;
}
