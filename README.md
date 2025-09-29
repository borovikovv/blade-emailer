# Blade Emailer

A powerful PHP email runner with Laravel Blade templating support. Send beautiful, templated emails with ease using PHPMailer and Laravel's Blade templating engine.

## Features

- 🚀 **Easy Email Sending**: Send HTML and text emails with simple API
- 🎨 **Blade Templates**: Use Laravel Blade templating for beautiful, dynamic emails
- 📧 **Multiple Recipients**: Support for TO, CC, BCC recipients
- 📎 **Attachments**: Send files with your emails
- 🛠️ **Template Management**: Create, update, delete, and manage email templates
- 💻 **CLI Interface**: Command-line tool for easy email operations
- 🌐 **Localhost Preview**: Preview templates in your browser before sending
- ⚙️ **Configurable**: Flexible configuration system
- 🔧 **SMTP Support**: Full SMTP configuration support

## Installation

1. Clone or download this repository
2. Install dependencies using Composer:

```bash
composer install
```

3. Copy the environment configuration:

```bash
cp env.example .env
```

4. Configure your email settings in `.env`:

```env
SMTP_HOST=smtp.gmail.com
SMTP_PORT=587
SMTP_USERNAME=your-email@gmail.com
SMTP_PASSWORD=your-app-password
SMTP_ENCRYPTION=tls
FROM_EMAIL=noreply@example.com
FROM_NAME=Email Runner
```

## Quick Start

### Using the CLI

Test your email configuration:

```bash
./bin/email-runner test
```

Send a simple email:

```bash
./bin/email-runner send recipient@example.com "Hello World" --text "This is a test email"
```

Send an email using a template:

```bash
./bin/email-runner send recipient@example.com "Welcome" --template welcome --data '{"name":"John","company":"Acme Corp"}'
```

## Localhost Preview

Preview your email templates in the browser before sending them! This is perfect for testing and designing your email templates.

### Starting the Preview Server

Start the localhost preview server:

```bash
./bin/email-runner preview
```

This will start a web server at `http://localhost:8080` where you can:

- Browse all available templates
- Preview templates with sample data
- Edit template data and see live previews
- Test templates before sending emails

### Preview Server Options

```bash
# Use a different port
./bin/email-runner preview --port 3000

# Use a different host
./bin/email-runner preview --host 0.0.0.0 --port 8080
```

### Using the Preview Interface

1. **Template List**: View all available templates in a grid layout
2. **Quick Preview**: Click "Preview" to see a template with sample data
3. **Custom Data**: Click "Edit Data" to modify the template data and see live updates
4. **Custom Preview**: Use the "Custom Preview" option to select any template and enter custom JSON data

The preview server automatically provides sample data for each template, making it easy to see how your templates will look with real content.

### Using PHP Code

```php
<?php
require_once 'vendor/autoload.php';

use BladeEmailer\EmailService;

// Load configuration
$config = require 'config/email.php';

// Create email service
$emailService = new EmailService($config);

// Send a simple email
$emailService->sendEmail([
    'to' => 'recipient@example.com',
    'subject' => 'Hello World',
    'text' => 'This is a test email!'
]);

// Send email with template
$emailService->sendEmail([
    'to' => 'recipient@example.com',
    'subject' => 'Welcome',
    'template' => 'welcome',
    'data' => [
        'name' => 'John Doe',
        'company' => 'Acme Corp'
    ]
]);
```

## Template Management

### Creating Templates

Templates are stored in the `templates/` directory and use the `.blade.php` extension.

```php
// Create a new template
$emailService->createTemplate('my-template', '
<!DOCTYPE html>
<html>
<head><title>{{ $title }}</title></head>
<body>
    <h1>{{ $title }}</h1>
    <p>Hello {{ $name }},</p>
    <p>{{ $message }}</p>
</body>
</html>
');
```

### Using Templates

```php
$emailService->sendEmail([
    'to' => 'recipient@example.com',
    'subject' => 'Template Email',
    'template' => 'my-template',
    'data' => [
        'title' => 'Welcome',
        'name' => 'John',
        'message' => 'Thanks for joining!'
    ]
]);
```

### CLI Template Management

List all templates:

```bash
./bin/email-runner template list
```

Create a template:

```bash
./bin/email-runner template create my-template --content '<h1>{{ $title }}</h1>'
```

Show template content:

```bash
./bin/email-runner template show welcome
```

Update a template:

```bash
./bin/email-runner template update my-template --content '<h1>{{ $title }}</h1><p>Updated content</p>'
```

Delete a template:

```bash
./bin/email-runner template delete my-template
```

## Available Templates

The package comes with several pre-built templates:

### Welcome Template (`welcome.blade.php`)
Perfect for welcome emails with features, next steps, and call-to-action buttons.

**Variables:**
- `$name` - Recipient name
- `$company` - Company name
- `$features` - Array of features to highlight
- `$nextSteps` - Array of next steps
- `$ctaUrl` - Call-to-action URL
- `$ctaText` - Call-to-action text

### Notification Template (`notification.blade.php`)
Great for system notifications and alerts.

**Variables:**
- `$title` - Notification title
- `$name` - Recipient name
- `$message` - Main message
- `$type` - Alert type (success, warning, error)
- `$details` - Array of additional details
- `$actionUrl` - Action button URL
- `$actionText` - Action button text

### Newsletter Template (`newsletter.blade.php`)
Ideal for newsletters and regular updates.

**Variables:**
- `$title` - Newsletter title
- `$name` - Recipient name
- `$date` - Newsletter date
- `$intro` - Introduction text
- `$articles` - Array of articles
- `$highlights` - Array of highlights
- `$ctaUrl` - Call-to-action URL
- `$ctaText` - Call-to-action text

## Advanced Usage

### Multiple Recipients

```php
$emailService->sendEmail([
    'to' => [
        ['email' => 'user1@example.com', 'name' => 'User One'],
        ['email' => 'user2@example.com', 'name' => 'User Two']
    ],
    'cc' => ['manager@example.com'],
    'bcc' => ['admin@example.com'],
    'subject' => 'Team Update',
    'template' => 'notification',
    'data' => ['message' => 'Important update for the team']
]);
```

### Attachments

```php
$emailService->sendEmail([
    'to' => 'recipient@example.com',
    'subject' => 'Document Attached',
    'text' => 'Please find the attached document.',
    'attachments' => [
        '/path/to/document.pdf',
        [
            'path' => '/path/to/image.jpg',
            'name' => 'photo.jpg',
            'type' => 'image/jpeg'
        ]
    ]
]);
```

### HTML and Text Versions

```php
$emailService->sendEmail([
    'to' => 'recipient@example.com',
    'subject' => 'Rich Content Email',
    'html' => '<h1>Hello!</h1><p>This is <strong>HTML</strong> content.</p>',
    'text' => 'Hello! This is plain text content.'
]);
```

## Configuration

The email configuration is stored in `config/email.php`. You can customize:

- SMTP settings (host, port, username, password, encryption)
- Default from address and name
- Template and cache paths
- Default character set and encoding

## Examples

Check the `examples/` directory for complete usage examples:

- `basic-usage.php` - Basic email sending examples
- `template-management.php` - Template management examples

## Requirements

- PHP 7.4 or higher
- Composer
- SMTP server access

## Dependencies

- `illuminate/view` - Laravel Blade templating
- `illuminate/filesystem` - File system operations
- `illuminate/support` - Laravel support utilities
- `phpmailer/phpmailer` - Email sending
- `symfony/console` - CLI interface

## License

This project is open-sourced software licensed under the MIT license.

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## Support

If you encounter any issues or have questions, please open an issue on the project repository.
# blade-emailer
