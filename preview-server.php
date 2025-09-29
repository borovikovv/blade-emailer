<?php

require_once __DIR__ . '/vendor/autoload.php';

// Manually include our classes
require_once __DIR__ . '/src/BladeEmailer/TemplateManager.php';
require_once __DIR__ . '/src/BladeEmailer/EmailRunner.php';
require_once __DIR__ . '/src/BladeEmailer/EmailService.php';

use BladeEmailer\EmailService;

// Load configuration
$config = require __DIR__ . '/config/email.php';
$emailService = new EmailService($config);

// Get the request URI and method
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Remove query string from URI
$path = parse_url($requestUri, PHP_URL_PATH);

// Route handling
switch ($path) {
    case '/':
        showTemplateList();
        break;
    case '/preview':
        if ($requestMethod === 'POST') {
            handlePreviewRequest();
        } else {
            showPreviewForm();
        }
        break;
    case '/template':
        if ($requestMethod === 'GET') {
            showTemplateForm();
        }
        break;
    default:
        if (preg_match('/^\/template\/(.+)$/', $path, $matches)) {
            $templateName = $matches[1];
            showTemplatePreview($templateName);
        } else {
            http_response_code(404);
            echo "Page not found";
        }
        break;
}

function showTemplateList() {
    global $emailService;
    
    $templates = $emailService->getAvailableTemplates();
    
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blade Emailer - Template Preview</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .template-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .template-card {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 20px;
            text-align: center;
            transition: all 0.2s;
            cursor: pointer;
        }
        .template-card:hover {
            border-color: #007cba;
            box-shadow: 0 2px 8px rgba(0,124,186,0.2);
        }
        .template-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }
        .template-actions {
            margin-top: 15px;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            margin: 0 5px;
            background: #007cba;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            transition: background 0.2s;
        }
        .btn:hover {
            background: #005a87;
        }
        .btn-secondary {
            background: #6c757d;
        }
        .btn-secondary:hover {
            background: #545b62;
        }
        .no-templates {
            text-align: center;
            color: #666;
            font-style: italic;
            padding: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📧 Blade Emailer - Template Preview</h1>
        
        <div class="template-grid">';
        
    if (empty($templates)) {
        echo '<div class="no-templates">No templates found. Create some templates first!</div>';
    } else {
        foreach ($templates as $template) {
            echo '<div class="template-card">
                <div class="template-name">' . htmlspecialchars($template) . '</div>
                <div class="template-actions">
                    <a href="/template/' . urlencode($template) . '" class="btn">Preview</a>
                    <a href="/template?name=' . urlencode($template) . '" class="btn btn-secondary">Edit Data</a>
                </div>
            </div>';
        }
    }
    
    echo '</div>
        
        <div style="text-align: center; margin-top: 30px;">
            <a href="/preview" class="btn">Custom Preview</a>
        </div>
    </div>
</body>
</html>';
}

function showTemplatePreview($templateName) {
    global $emailService;
    
    try {
        // Get sample data for the template
        $sampleData = getSampleDataForTemplate($templateName);
        
        // Render the template - wrap data in $data array for template access
        $templateData = ['data' => $sampleData];
        $html = $emailService->getTemplateManager()->render($templateName, $templateData);
        
        // Output the rendered HTML
        echo $html;
        
    } catch (Exception $e) {
        http_response_code(500);
        echo '<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .error { color: #d32f2f; background: #ffebee; padding: 15px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="error">
        <h2>Template Error</h2>
        <p>' . htmlspecialchars($e->getMessage()) . '</p>
        <a href="/">← Back to Template List</a>
    </div>
</body>
</html>';
    }
}

function showTemplateForm() {
    $templateName = $_GET['name'] ?? '';
    
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Template Data - Blade Emailer</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #333;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        .btn {
            background: #007cba;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 10px;
        }
        .btn:hover {
            background: #005a87;
        }
        .btn-secondary {
            background: #6c757d;
        }
        .btn-secondary:hover {
            background: #545b62;
        }
        .json-editor {
            font-family: "Monaco", "Menlo", "Ubuntu Mono", monospace;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Template Data</h1>
        
        <form method="post" action="/preview">
            <input type="hidden" name="template" value="' . htmlspecialchars($templateName) . '">
            
            <div class="form-group">
                <label for="data">Template Data (JSON):</label>
                <textarea id="data" name="data" class="json-editor" placeholder="Enter JSON data for the template...">' . htmlspecialchars(getDefaultDataForTemplate($templateName)) . '</textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn">Preview Template</button>
                <a href="/" class="btn btn-secondary">Back to List</a>
            </div>
        </form>
    </div>
</body>
</html>';
}

function showPreviewForm() {
    global $emailService;
    
    $templates = $emailService->getAvailableTemplates();
    
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Preview - Blade Emailer</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            color: #333;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        .btn {
            background: #007cba;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 10px;
        }
        .btn:hover {
            background: #005a87;
        }
        .btn-secondary {
            background: #6c757d;
        }
        .btn-secondary:hover {
            background: #545b62;
        }
        .json-editor {
            font-family: "Monaco", "Menlo", "Ubuntu Mono", monospace;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Custom Template Preview</h1>
        
        <form method="post" action="/preview">
            <div class="form-group">
                <label for="template">Template:</label>
                <select id="template" name="template" required>
                    <option value="">Select a template...</option>';
                    
    foreach ($templates as $template) {
        echo '<option value="' . htmlspecialchars($template) . '">' . htmlspecialchars($template) . '</option>';
    }
    
    echo '</select>
            </div>
            
            <div class="form-group">
                <label for="data">Template Data (JSON):</label>
                <textarea id="data" name="data" class="json-editor" placeholder="Enter JSON data for the template...">{}</textarea>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn">Preview Template</button>
                <a href="/" class="btn btn-secondary">Back to List</a>
            </div>
        </form>
    </div>
</body>
</html>';
}

function handlePreviewRequest() {
    global $emailService;
    
    $template = $_POST['template'] ?? '';
    $dataJson = $_POST['data'] ?? '{}';
    
    try {
        $data = json_decode($dataJson, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Invalid JSON data: ' . json_last_error_msg());
        }
        
        // Render the template
        $html = $emailService->getTemplateManager()->render($template, $data);
        
        // Output the rendered HTML
        echo $html;
        
    } catch (Exception $e) {
        http_response_code(500);
        echo '<!DOCTYPE html>
<html>
<head>
    <title>Preview Error</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .error { color: #d32f2f; background: #ffebee; padding: 15px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="error">
        <h2>Preview Error</h2>
        <p>' . htmlspecialchars($e->getMessage()) . '</p>
        <a href="/preview">← Back to Preview Form</a>
    </div>
</body>
</html>';
    }
}

function getSampleDataForTemplate($templateName) {
    $sampleData = [
        'welcome' => [
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
        ],
        'notification' => [
            'title' => 'System Notification',
            'name' => 'John Doe',
            'message' => 'This is an important system notification.',
            'type' => 'success',
            'details' => [
                'project' => 'New Feature Launch',
                'status' => 'Completed',
                'launch_date' => '2024-01-15'
            ],
            'actionUrl' => 'https://example.com/action',
            'actionText' => 'View Details'
        ],
        'newsletter' => [
            'title' => 'Weekly Newsletter',
            'name' => 'John Doe',
            'date' => 'January 15, 2024',
            'intro' => 'Welcome to our weekly newsletter with the latest updates!',
            'articles' => [
                ['title' => 'New Feature Release', 'summary' => 'Check out our latest features'],
                ['title' => 'User Spotlight', 'summary' => 'Meet our amazing community members']
            ],
            'highlights' => [
                '1000+ new users this week',
                'New integrations available',
                'Upcoming events'
            ],
            'ctaUrl' => 'https://example.com/newsletter',
            'ctaText' => 'Read More'
        ],
        'test' => [
            'request_id' => 'AR-1365',
            'trip_type' => 1,
            'is_urgent' => true,
            'priority' => 'urgent',
            'agent' => [
                'name' => 'Agent Name',
                'email' => 'agent@example.com',
            ],
            'passenger' => [
                'name' => 'GUTTZEITT/LIANNAMARIE',
                'document' => '12345678900',
                'date_of_birth' => '1988-01-15',
                'email' => '3CTCE/LGZ/SMARTFLYER.COM',
                'phone' => '3CTCM1/251966115167',
            ],
            'trip_overview' => [
                [
                    'leg' => 1,
                    'from' => ['JFK', 'EWR', 'LGA'],
                    'to' => ['LHR'],
                    'date' => '2025-05-20',
                    'departure_time_range' => '00:00 - 10:00',
                    'preferred_cabin' => ['PREMIUM ECONOMY', 'BUSINESS', 'FIRST'],
                    'trip_type' => 'LEISURE',
                ],
                [
                    'leg' => 2,
                    'from' => ['LHR'],
                    'to' => ['JFK', 'EWR', 'LGA'],
                    'date' => '2025-05-30',
                    'departure_time_range' => '00:00 - 18:00',
                    'preferred_cabin' => ['PREMIUM ECONOMY', 'BUSINESS', 'FIRST'],
                    'trip_type' => 'LEISURE',
                ],
            ],
            'travel_preferences' => [
                'pricing_quote' => 'REFUNDABLE',
                'airlines' => ['ALASKA AIRLINES', 'JETBLUE AIRWAYS', 'SOUTHWEST AIRLINES'],
                'aircraft' => [
                    'AIRBUS 330-900 NEO',
                    'BOEING DREAMLINER',
                    'BOEING 777',
                    'AIRBUS A380',
                    'AIRBUS 350-100',
                ],
                'requests' => ['NO RED-EYE FLIGHTS', 'EXTRA LEGROOM', 'LIE-FLAT SEATING'],
            ],
            'special_requests' => ['GFML'],
            'documents' => [
                [
                    'name' => 'Passport_Jonathan_Ellington.pdf',
                    'type' => 'passport',
                    'primary' => true,
                ],
                [
                    'name' => 'BoardingPass_JFK-WAS.jpg',
                    'type' => 'boarding_pass',
                    'primary' => true,
                ],
                [
                    'name' => 'Visa_USA_2025.pdf',
                    'type' => 'visa',
                    'primary' => true,
                ],
                [
                    'name' => 'MedicalCertificate.pdf',
                    'type' => 'medical_certificate',
                    'primary' => true,
                ],
            ],
        ]
    ];
    
    return $sampleData[$templateName] ?? [
        'title' => 'Sample Email',
        'name' => 'John Doe',
        'message' => 'This is a sample email for preview.',
        'data' => [
            'template' => $templateName,
            'preview' => true
        ]
    ];
}

function getDefaultDataForTemplate($templateName) {
    $sampleData = getSampleDataForTemplate($templateName);
    return json_encode($sampleData, JSON_PRETTY_PRINT);
}
