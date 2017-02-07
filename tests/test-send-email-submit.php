<?php

/**
 * Form submission script for test-send-email.php
 */

require_once __DIR__ . '/../models/Message.php';
require_once __DIR__ . '/../messaging/MessagingService.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "This page must be requested using POST.";
    die();
}

$message = new Message();
$message->recipientId = (int) $_POST['recipientId'];
$message->subject = $_POST['subject'];
$message->body = $_POST['body'];

$svc = MessagingService::getInstance();
$svc->emailMessage($message);

echo "Done.";