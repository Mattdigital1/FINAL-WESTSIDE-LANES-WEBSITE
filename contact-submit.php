<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
    exit;
}

$name    = trim(strip_tags($_POST['name']    ?? ''));
$phone   = trim(strip_tags($_POST['phone']   ?? ''));
$email   = trim(strip_tags($_POST['email']   ?? ''));
$subject = trim(strip_tags($_POST['subject'] ?? ''));
$date    = trim(strip_tags($_POST['date']    ?? ''));
$message = trim(strip_tags($_POST['message'] ?? ''));

if (!$name || !$email || !$message) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Required fields missing']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Invalid email address']);
    exit;
}

$to      = 'westsidelanesnola@gmail.com';
$headers = implode("\r\n", [
    "From: Westside Lanes Website <noreply@westsidebowlinglanes.com>",
    "Reply-To: $name <$email>",
    "X-Mailer: PHP/" . phpversion(),
    "MIME-Version: 1.0",
    "Content-Type: text/plain; charset=UTF-8",
]);

$body = "New message from the Westside Lanes website\n";
$body .= str_repeat("-", 48) . "\n\n";
$body .= "Name:    $name\n";
$body .= "Email:   $email\n";
if ($phone)   $body .= "Phone:   $phone\n";
if ($subject) $body .= "About:   $subject\n";
if ($date)    $body .= "Date:    $date\n";
$body .= "\nMessage:\n$message\n";

$sent = mail($to, "Website inquiry: $subject", $body, $headers);

if ($sent) {
    echo json_encode(['ok' => true]);
} else {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => 'Mail delivery failed']);
}
