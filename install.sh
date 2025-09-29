#!/bin/bash

echo "Installing Blade Emailer..."

# Check if composer is installed
if ! command -v composer &> /dev/null; then
    echo "Composer is not installed. Please install Composer first."
    exit 1
fi

# Install dependencies
echo "Installing dependencies..."
composer install

# Create necessary directories
echo "Creating directories..."
mkdir -p storage/cache
mkdir -p templates
mkdir -p config

# Set permissions
echo "Setting permissions..."
chmod +x bin/email-runner

# Copy environment file if it doesn't exist
if [ ! -f .env ]; then
    echo "Creating .env file from template..."
    cp env.example .env
    echo "Please edit .env file with your email configuration."
fi

echo "Installation complete!"
echo ""
echo "Next steps:"
echo "1. Edit .env file with your SMTP settings"
echo "2. Test your configuration: ./bin/email-runner test"
echo "3. Send a test email: ./bin/email-runner send your-email@example.com 'Test' --text 'Hello World'"
echo ""
echo "For more information, see README.md"
