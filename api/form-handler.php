<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit();
}

// Get and sanitize input
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

// Database connection
$host     = 'localhost';
$dbname   = 'solstice_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
    exit();
}

// Save to database + log
try {
    $stmt = $pdo->prepare("
        INSERT INTO contact_submissions (full_name, email, inquiry_type, message)
        VALUES (:full_name, :email, :inquiry_type, :message)
    ");

    $stmt->execute([
        ':full_name'    => $fullName,
        ':email'        => $email,
        ':inquiry_type' => $inquiryType,
        ':message'      => $message
    ]);

    // Log to file
    $logFile  = __DIR__ . '/../submissions.log';
    $logEntry = "[" . date('Y-m-d H:i:s') . "]\n" .
                "Name: {$fullName}\n" .
                "Email: {$email}\n" .
                "Inquiry: {$inquiryType}\n" .
                "Message: {$message}\n" .
                "---\n";
    file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);

    echo json_encode([
        'success' => true,
        'message' => 'Thank you! Your inquiry has been submitted.'
    ]);

} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to save submission. Please try again.'
    ]);
}
?>