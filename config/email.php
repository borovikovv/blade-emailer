<?php

// Simple configuration without env() helper
$config = [
    'smtp' => [
        'host' => 'smtp.gmail.com',
        'port' => 587,
        'username' => '',
        'password' => '',
        'encryption' => 'tls',
        'timeout' => 30,
    ],
    
    'from' => [
        'email' => 'noreply@example.com',
        'name' => 'Email Runner',
    ],
    
    'templates' => [
        'path' => __DIR__ . '/../templates',
        'cache' => __DIR__ . '/../storage/cache',
    ],
    
    'defaults' => [
        'charset' => 'UTF-8',
        'encoding' => '8bit',
    ],
];

// Load environment variables if .env file exists
if (file_exists(__DIR__ . '/../.env')) {
    $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            
            switch ($key) {
                case 'SMTP_HOST':
                    $config['smtp']['host'] = $value;
                    break;
                case 'SMTP_PORT':
                    $config['smtp']['port'] = (int)$value;
                    break;
                case 'SMTP_USERNAME':
                    $config['smtp']['username'] = $value;
                    break;
                case 'SMTP_PASSWORD':
                    $config['smtp']['password'] = $value;
                    break;
                case 'SMTP_ENCRYPTION':
                    $config['smtp']['encryption'] = $value;
                    break;
                case 'SMTP_TIMEOUT':
                    $config['smtp']['timeout'] = (int)$value;
                    break;
                case 'FROM_EMAIL':
                    $config['from']['email'] = $value;
                    break;
                case 'FROM_NAME':
                    $config['from']['name'] = $value;
                    break;
            }
        }
    }
}

return $config;
