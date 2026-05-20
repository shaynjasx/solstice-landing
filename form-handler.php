<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullName = htmlspecialchars(trim($_POST['fullName'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $inquiryType = htmlspecialchars(trim($_POST['inquiryType'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    $basePath = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $redirectBase = $basePath === '' ? '/index.html' : $basePath . '/index.html';

    if (empty($fullName) || empty($email) || empty($inquiryType) || empty($message)) {
        header("Location: {$redirectBase}?error=1");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: {$redirectBase}?error=email");
        exit();
    }

    $to = 'info@sheahomes.com';
    $subject = "New contact form submission: {$inquiryType}";
    $body = "Name: {$fullName}\n" .
            "Email: {$email}\n" .
            "Inquiry Type: {$inquiryType}\n\n" .
            "Message:\n{$message}\n";

    // SMTP configuration - replace with your provider details when available.
    // Until SMTP credentials are provided, the form will still submit successfully
    // and can be extended to send real email later.
    $emailEnabled = false;
    $smtpHost = 'smtp.example.com';
    $smtpPort = 587;
    $smtpUsername = 'your-smtp-username';
    $smtpPassword = 'your-smtp-password';
    $smtpSecure = PHPMailer::ENCRYPTION_STARTTLS; // or PHPMailer::ENCRYPTION_SMTPS for port 465
    $fromEmail = 'noreply@yourdomain.com';
    $fromName = 'Solstice Website';

    if ($emailEnabled) {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = $smtpHost;
            $mail->SMTPAuth = true;
            $mail->Username = $smtpUsername;
            $mail->Password = $smtpPassword;
            $mail->SMTPSecure = $smtpSecure;
            $mail->Port = $smtpPort;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom($fromEmail, $fromName);
            $mail->addAddress($to);
            $mail->addReplyTo($email, $fullName);

            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = $body;

            $mail->send();
        } catch (Exception $e) {
            header("Location: {$redirectBase}?error=mail");
            exit();
        }
    } else {
        $logFile = __DIR__ . '/submissions.log';
        $logEntry = "[" . date('Y-m-d H:i:s') . "] " . $body . "\n---\n";
        @file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
    }

    header("Location: {$redirectBase}?success=1");
    exit();
}

header('Location: /index.html');
exit();
