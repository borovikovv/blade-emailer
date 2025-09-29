<?php

require_once __DIR__ . '/../vendor/autoload.php';

use BladeEmailer\EmailService;

// Load configuration
$config = require __DIR__ . '/../config/email.php';

// Create email service
$emailService = new EmailService($config);

// Example 1: Create a new template
echo "Creating a new template...\n";
$templateContent = <<<'BLADE'
<!DOCTYPE html>
<html>
<head>
    <title>{{ $title ?? 'Email' }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #f0f0f0; padding: 20px; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $title ?? 'Hello' }}</h1>
        </div>
        <div class="content">
            <p>Hello {{ $name ?? 'there' }},</p>
            <p>{{ $message ?? 'This is a custom template.' }}</p>
            
            @if(isset($items) && is_array($items))
                <ul>
                    @foreach($items as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</body>
</html>
BLADE;

$result = $emailService->createTemplate('custom', $templateContent);
if ($result) {
    echo "✓ Template 'custom' created successfully!\n";
} else {
    echo "✗ Failed to create template\n";
}

// Example 2: List all available templates
echo "\nListing available templates...\n";
$templates = $emailService->getAvailableTemplates();
echo "Available templates:\n";
foreach ($templates as $template) {
    echo "  - {$template}\n";
}

// Example 3: Get template content
echo "\nGetting template content...\n";
try {
    $content = $emailService->getTemplateContent('welcome');
    echo "✓ Retrieved template content (length: " . strlen($content) . " characters)\n";
} catch (Exception $e) {
    echo "✗ Failed to get template content: " . $e->getMessage() . "\n";
}

// Example 4: Update a template
echo "\nUpdating template...\n";
$updatedContent = $templateContent . "\n<!-- Updated at " . date('Y-m-d H:i:s') . " -->";
$result = $emailService->updateTemplate('custom', $updatedContent);
if ($result) {
    echo "✓ Template 'custom' updated successfully!\n";
} else {
    echo "✗ Failed to update template\n";
}

// Example 5: Send email using the custom template
echo "\nSending email with custom template...\n";
$result = $emailService->sendEmail([
    'to' => 'recipient@example.com',
    'subject' => 'Custom Template Test',
    'template' => 'custom',
    'data' => [
        'title' => 'Custom Template',
        'name' => 'Jane Doe',
        'message' => 'This email was sent using our custom template!',
        'items' => [
            'Feature 1: Blade templating',
            'Feature 2: Easy customization',
            'Feature 3: Professional design'
        ]
    ]
]);

if ($result) {
    echo "✓ Custom template email sent successfully!\n";
} else {
    echo "✗ Failed to send custom template email\n";
}

// Example 6: Check if template exists
echo "\nChecking template existence...\n";
$exists = $emailService->templateExists('welcome');
echo $exists ? "✓ Template 'welcome' exists\n" : "✗ Template 'welcome' does not exist\n";

$exists = $emailService->templateExists('nonexistent');
echo $exists ? "✓ Template 'nonexistent' exists\n" : "✗ Template 'nonexistent' does not exist\n";

// Example 7: Delete a template
echo "\nDeleting template...\n";
$result = $emailService->deleteTemplate('custom');
if ($result) {
    echo "✓ Template 'custom' deleted successfully!\n";
} else {
    echo "✗ Failed to delete template\n";
}

echo "\nTemplate management examples completed!\n";
