<?php

/**
 * PDF Generation Example using Blade Templates
 * 
 * This script demonstrates how to generate PDFs from Blade templates.
 * 
 * Prerequisites:
 * 1. Install DomPDF: composer require dompdf/dompdf
 * 2. Create your Blade template in the templates/ directory
 * 3. Run this script with your template name and data
 */

require_once __DIR__ . '/vendor/autoload.php';

// Explicitly require BladeEmailer classes (autoloader may not be working)
require_once __DIR__ . '/src/BladeEmailer/TemplateManager.php';

use BladeEmailer\TemplateManager;
use Dompdf\Dompdf;
use Dompdf\Options;

// Load configuration
$config = require __DIR__ . '/config/email.php';

// Create template manager directly
$templateManager = new TemplateManager(
    $config['templates']['path'],
    $config['templates']['cache']
);

// Example: Generate PDF from ar-pdf template
echo "Generating PDF from Blade template...\n";

// Template data matching the API data structure
$data = [
    'id' => 12849,
    'is_primary' => true,
    'client_identity' => 'CLIENT-12345',
    'first_name' => 'Jonathan',
    'middle_name' => 'Jackson',
    'last_name' => 'Ellington',
    'dob' => 'October 14, 1972',
    'email' => 'jonhellington@gmail.com',
    'phone' => '+1 (915) 894–1972',
    'gender' => 'Male',
    'is_specific_flight' => false,
    'is_international_flight' => true,
    'trip_type' => 3, // 1 = One-way, 2 = Round-trip, 3 = Multi-city
    'trip_purpose' => [
        'id' => 'business',
        'name' => 'Business',
    ],
    'additional_trip_notes' => 'Kosher meals for all passengers. Assistance with stroller for Passenger 2.',
    
    'passport_files' => [
        [
            'id' => 1,
            'path' => '/uploads/passports/passport_jonathan.pdf',
            'thumbnail' => '/uploads/passports/thumb_passport_jonathan.jpg',
            'file_type' => 1,
        ],
    ],
    
    'flights' => [
        [
            'id' => 1,
            'passenger_id' => 12849,
            'departure_date' => 'Wed 16 Jul, 2025',
            'departure_date_end' => 'Wed 16 Jul, 2025',
            'departure_time_details' => ['Evening: 6PM – 12AM'],
            'is_flexible_date' => false,
            'flexible_date_description' => null,
            'departure' => [
                'cities' => ['NYC', 'ATL', 'LAS'],
                'airports' => [],
            ],
            'arrival' => [
                'cities' => ['London'],
                'airports' => ['LHR'],
            ],
            'cabin_classes' => [
                ['id' => 'premium', 'name' => 'Premium economy'],
                ['id' => 'business', 'name' => 'Business'],
                ['id' => 'economy', 'name' => 'Economy'],
                ['id' => 'first', 'name' => 'First'],
            ],
        ],
        [
            'id' => 2,
            'passenger_id' => 12849,
            'departure_date' => 'Thu 17 Jul, 2025',
            'departure_date_end' => 'Thu 17 Jul, 2025',
            'departure_time_details' => [],
            'is_flexible_date' => false,
            'flexible_date_description' => null,
            'departure' => [
                'cities' => ['London'],
                'airports' => ['LHR'],
            ],
            'arrival' => [
                'cities' => ['Paris'],
                'airports' => ['CDG'],
            ],
            'cabin_classes' => [
                ['id' => 'business', 'name' => 'Business'],
            ],
        ],
        [
            'id' => 3,
            'passenger_id' => 12849,
            'departure_date' => 'Fri 18 Jul, 2025',
            'departure_date_end' => 'Fri 18 Jul, 2025',
            'departure_time_details' => [],
            'is_flexible_date' => false,
            'flexible_date_description' => null,
            'departure' => [
                'cities' => ['Paris'],
                'airports' => ['CDG'],
            ],
            'arrival' => [
                'cities' => ['Dubai'],
                'airports' => ['DXB'],
            ],
            'cabin_classes' => [
                ['id' => 'business', 'name' => 'Business'],
            ],
        ],
        [
            'id' => 4,
            'passenger_id' => 12849,
            'departure_date' => 'Sat 19 Jul, 2025',
            'departure_date_end' => 'Sat 19 Jul, 2025',
            'departure_time_details' => [],
            'is_flexible_date' => false,
            'flexible_date_description' => null,
            'departure' => [
                'cities' => ['Dubai'],
                'airports' => ['DXB'],
            ],
            'arrival' => [
                'cities' => ['Tokyo'],
                'airports' => ['HND'],
            ],
            'cabin_classes' => [
                ['id' => 'business', 'name' => 'Business'],
            ],
        ],
    ],
    
    'flight_details' => 'Multi-city business trip across Europe and Asia. Prefer non-stop flights when available.',
    
    'flight_files' => [
        [
            'id' => 1,
            'path' => '/uploads/flights/flight_preference.pdf',
            'thumbnail' => '/uploads/flights/thumb_flight_preference.jpg',
            'file_type' => 1,
        ],
    ],
    
    'frequent_flyers' => [
        ['American Airlines AAdvantage: 123456789'],
        ['United MileagePlus: 987654321'],
    ],
];

// Render Blade template to HTML
$templateName = 'ar-pdf';
$templateData = ['data' => $data];

if (!$templateManager->templateExists($templateName)) {
    die("Error: Template '{$templateName}' not found!\n");
}

$html = $templateManager->render($templateName, $templateData);

// Configure DomPDF options
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$options->set('isPhpEnabled', false);
$options->set('defaultFont', 'DejaVu Sans');

// Create DomPDF instance
$dompdf = new Dompdf($options);

// Load HTML content
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render PDF
$dompdf->render();

// Output PDF
$outputPath = __DIR__ . '/output.pdf';
file_put_contents($outputPath, $dompdf->output());

echo "✓ PDF generated successfully: {$outputPath}\n";

// Optional: Stream PDF to browser
// $dompdf->stream("document.pdf", ["Attachment" => false]);

// Optional: Get PDF as string
// $pdfString = $dompdf->output();

