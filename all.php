<?php
header('Content-Type: application/json');
require_once './sms.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['phone'])) {
        $smsSender = new SmsSender($_GET['phone']);
        $smsSender->sendAll();
        echo json_encode(['status' => 'success', 'message' => 'SMS sent successfully.']);
    } else {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Phone number is required.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
