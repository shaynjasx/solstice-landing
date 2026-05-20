<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit();
}

$fullName    = htmlspecialchars(trim($_POST['fullName'] ?? ''));
$email       = htmlspecialchars(trim($_POST['email'] ?? ''));
$inquiryType = htmlspecialchars(trim($_POST['inquiryType'] ?? ''));
$message     = htmlspecialchars(trim($_POST['message'] ?? ''));

// Server-side validation
if (empty($fullName) || empty($email) || empty($inquiryType) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
    exit();
}

$to      = 'shayna.goles31@gmail.com';
$subject = "New Contact Form Submission: {$inquiryType}";
$body    = "Name: {$fullName}\n" .
           "Email: {$email}\n" .
           "Inquiry Type: {$inquiryType}\n\n" .
           "Message:\n{$message}\n";

// SMTP configuration
$emailEnabled   = false;
$smtpHost       = 'smtp.example.com';
$smtpPort       = 587;
$smtpUsername   = 'your-smtp-username';
$smtpPassword   = 'your-smtp-password';
$smtpSecure     = PHPMailer::ENCRYPTION_STARTTLS;
$fromEmail      = 'noreply@yourdomain.com';
$fromName       = 'Solstice Website';

if ($emailEnabled) {
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = $smtpHost;
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtpUsername;
        $mail->Password   = $smtpPassword;
        $mail->SMTPSecure = $smtpSecure;
        $mail->Port       = $smtpPort;
        $mail->CharSet    = 'UTF-8';

        $mail->setFrom($fromEmail, $fromName);
        $mail->addAddress($to);
        $mail->addReplyTo($email, $fullName);

        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $body;

        $mail->send();

    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Mail error: ' . $mail->ErrorInfo]);
        exit();
    }
} else {
    // Log fallback when SMTP not configured
    $logFile  = __DIR__ . '/../submissions.log';
    $logEntry = "[" . date('Y-m-d H:i:s') . "]\n" . $body . "\n---\n";
    @file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
}

echo json_encode(['success' => true, 'message' => 'Submission received.']);
exit();