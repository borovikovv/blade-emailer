<?php

require_once __DIR__ . '/../vendor/autoload.php';

use BladeEmailer\EmailService;

// Load configuration
$config = require __DIR__ . '/../config/email.php';

// Create email service
$emailService = new EmailService($config);

// Example 1: Send a simple text email
echo "Sending simple text email...\n";
$result = $emailService->sendEmail([
    'to' => 'recipient@example.com',
    'subject' => 'Hello from Blade Emailer',
    'text' => 'This is a simple text email sent using Blade Emailer!'
]);

if ($result) {
    echo "✓ Text email sent successfully!\n";
} else {
    echo "✗ Failed to send text email\n";
}

// Example 2: Send an HTML email
echo "\nSending HTML email...\n";
$result = $emailService->sendEmail([
    'to' => 'recipient@example.com',
    'subject' => 'HTML Email Test',
    'html' => '<h1>Hello World!</h1><p>This is an <strong>HTML email</strong> with <em>formatting</em>.</p>',
    'text' => 'Hello World! This is an HTML email with formatting.'
]);

if ($result) {
    echo "✓ HTML email sent successfully!\n";
} else {
    echo "✗ Failed to send HTML email\n";
}

// Example 3: Send email using a template
echo "\nSending template email...\n";
$result = $emailService->sendEmail([
    'to' => 'recipient@example.com',
    'subject' => 'Welcome to Our Service',
    'template' => 'welcome',
    'data' => [
        'name' => 'John Doe',
        'company' => 'Acme Corp',
        'features' => [
            'Send unlimited emails',
            'Use beautiful templates',
            'Track email performance'
        ],
        'nextSteps' => [
            'Complete your profile',
            'Upload your logo',
            'Send your first email'
        ],
        'ctaUrl' => 'https://example.com/dashboard',
        'ctaText' => 'Get Started'
    ]
]);

if ($result) {
    echo "✓ Template email sent successfully!\n";
} else {
    echo "✗ Failed to send template email\n";
}

// Example 4: Send email with multiple recipients
echo "\nSending email to multiple recipients...\n";
$result = $emailService->sendEmail([
    'to' => [
        ['email' => 'user1@example.com', 'name' => 'User One'],
        ['email' => 'user2@example.com', 'name' => 'User Two']
    ],
    'cc' => ['manager@example.com'],
    'bcc' => ['admin@example.com'],
    'subject' => 'Team Update',
    'template' => 'notification',
    'data' => [
        'title' => 'Team Update',
        'message' => 'We have some exciting news to share!',
        'type' => 'success',
        'details' => [
            'project' => 'New Feature Launch',
            'status' => 'Completed',
            'launch_date' => '2024-01-15'
        ]
    ]
]);

if ($result) {
    echo "✓ Multi-recipient email sent successfully!\n";
} else {
    echo "✗ Failed to send multi-recipient email\n";
}

echo "\nAll examples completed!\n";
