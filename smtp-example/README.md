# Keplers.email SMTP Example

This example demonstrates how to send emails using Keplers.email SMTP service with PHP and PHPMailer.

## Setup

1. Install dependencies:
```bash
composer install
```

2. Copy `.env.example` to `.env` and configure your credentials:
```bash
cp .env.example .env
```

3. Edit `.env` with your Keplers.email SMTP credentials:
```env
SMTP_HOST=smtp.keplers.email
SMTP_PORT=2525
SMTP_USER=your-username
SMTP_PASSWORD=your-password
FROM_EMAIL=noreply@yourdomain.com
TO_EMAIL=recipient@example.com
```

## Usage

Run the example:
```bash
php index.php
```

The script will send a test email and display the results in the console.

## Environment Variables

| Variable | Description | Example |
|----------|-------------|---------|
| `SMTP_HOST` | Keplers.email SMTP server hostname | `smtp.keplers.email` |
| `SMTP_PORT` | SMTP port number | `2525` |
| `SMTP_USER` | Your Keplers.email username | `your-username` |
| `SMTP_PASSWORD` | Your Keplers.email password | `your-password` |
| `FROM_EMAIL` | Sender email address | `noreply@yourdomain.com` |
| `TO_EMAIL` | Recipient email address | `recipient@example.com` |

## Features

- Send plain text and HTML emails
- Secure connection configuration
- Comprehensive error handling
- Message ID and response tracking

## Troubleshooting

- **Connection timeout**: Verify `SMTP_HOST` and `SMTP_PORT` are correct
- **Authentication failed**: Check `SMTP_USER` and `SMTP_PASSWORD`
- **Email not delivered**: Ensure `FROM_EMAIL` is authorized in your Keplers.email account
