<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    exit;
}

$name    = strip_tags(trim($_POST['name']    ?? ''));
$email   = filter_var(trim($_POST['email']   ?? ''), FILTER_SANITIZE_EMAIL);
$phone   = strip_tags(trim($_POST['phone']   ?? ''));
$subject = strip_tags(trim($_POST['subject'] ?? ''));
$message = strip_tags(trim($_POST['message'] ?? ''));

// Validation
if (!$name) {
    echo json_encode(['success' => false, 'message' => 'Name is required.']); exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Valid email is required.']); exit;
}
if (!$subject) {
    echo json_encode(['success' => false, 'message' => 'Subject is required.']); exit;
}
if (strlen($message) < 5) {
    echo json_encode(['success' => false, 'message' => 'Message is too short.']); exit;
}

$to      = 'contact@misgro.com';
$headers = implode("\r\n", [
    "From: {$name} <{$email}>",
    "Reply-To: {$email}",
    "MIME-Version: 1.0",
    "Content-Type: text/plain; charset=UTF-8",
]);

$body  = "You have a new message from the Misgro website contact form.\n\n";
$body .= "Name:    {$name}\n";
$body .= "Email:   {$email}\n";
if ($phone) $body .= "Phone:   {$phone}\n";
$body .= "Subject: {$subject}\n\n";
$body .= "Message:\n{$message}\n";

$sent = mail($to, "New Contact: {$subject}", $body, $headers);

echo json_encode([
    'success' => $sent,
    'message' => $sent ? 'Message sent successfully.' : 'Mail failed. Please try again.',
]);
