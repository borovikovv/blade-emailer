<?php

require_once __DIR__ . '/vendor/autoload.php';

// Manually include our classes
require_once __DIR__ . '/src/BladeEmailer/TemplateManager.php';
require_once __DIR__ . '/src/BladeEmailer/EmailRunner.php';
require_once __DIR__ . '/src/BladeEmailer/EmailService.php';

use BladeEmailer\EmailService;

echo "Sending email to oleksii.borovykov@scrumlaunch.com...\n";

try {
    // Load configuration
    $config = require __DIR__ . '/config/email.php';
    
    // Create email service
    $emailService = new EmailService($config);
    
    // Send email with template
    $result = $emailService->sendEmail([
        'to' => 'oleksii.borovykov@scrumlaunch.com',
        'subject' => 'Welcome to Blade Emailer!',
        'template' => 'test',
'data' => [
    'request_id' => 'AR-1365',
    'trip_type' => 1,
    'is_urgent' => true,
    'agent' => [
        'name' => 'Sabrina Guttzeitt',
        'email' => 'sabrina.guttzeitt@smartflyer.com',
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
            'name' => 'Passport_Jonathan.pdf',
            'type' => 'passport',
            'primary' => true,
        ],
        [
            'name' => 'BoardingPass_JFK-WAS.jpg',
            'type' => 'boarding_pass',
            'url' => 'https://smartflyer-cdn.s3.us-east-1.amazonaws.com/emails/society/images/sf-logo.png',
            'primary' => true,
        ],
        [
            'name' => 'Visa_USA_2025.pdf',
            'type' => 'visa',   
            'url' => 'https://smartflyer-cdn.s3.us-east-1.amazonaws.com/emails/society/images/sf-logo.png',
            'primary' => true,
        ],
        [
            'name' => 'MedicalCertificate.pdf',
            'type' => 'medical_certificate',
            'url' => 'https://smartflyer-cdn.s3.us-east-1.amazonaws.com/emails/society/images/sf-logo.png',
            'primary' => true,
        ],
    ],
]

    ]);
    
    if ($result) {
        echo "✅ Email sent successfully to oleksii.borovykov@scrumlaunch.com!\n";
    } else {
        echo "❌ Failed to send email\n";
    }
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "\nMake sure you have configured your SMTP settings in the .env file.\n";
}

