<?php

require_once __DIR__ . '/vendor/autoload.php';

use BladeEmailer\EmailService;

echo "Blade Emailer Test Script\n";
echo "========================\n\n";

// Load configuration
$config = require __DIR__ . '/config/email.php';

try {
    // Create email service
    $emailService = new EmailService($config);
    
    // Test SMTP connection
    echo "Testing SMTP connection...\n";
    if ($emailService->testConnection()) {
        echo "✓ SMTP connection successful!\n\n";
    } else {
        echo "✗ SMTP connection failed!\n";
        echo "Please check your SMTP settings in .env file.\n\n";
        exit(1);
    }
    
    // List available templates
    echo "Available templates:\n";
    $templates = $emailService->getAvailableTemplates();
    if (empty($templates)) {
        echo "  No templates found.\n";
    } else {
        foreach ($templates as $template) {
            echo "  - {$template}\n";
        }
    }
    
    echo "\nTest completed successfully!\n";
    echo "\nYou can now use the email runner:\n";
    echo "  ./bin/email-runner send oleksii.borovykov@scrumlaunch.com 'Subject' --text 'Message'\n";
    echo "  ./bin/email-runner template list\n";
    echo "  ./bin/email-runner test\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    exit(1);
}
