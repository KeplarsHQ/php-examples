# Keplers.email API Example

This example demonstrates how to send emails using Keplers.email REST API with PHP and Guzzle.

## Prerequisites

- PHP 7.4 or higher
- Composer
- Keplers.email account with API key

## Setup

1. Install dependencies:
```bash
composer install
```

2. Create `.env` file from template:
```bash
cp .env.example .env
```

3. Configure your Keplers.email API credentials in `.env`:
```env
API_BASE_URL=https://api.keplers.email/api/v1
API_KEY=kms_xxxx
TO_EMAIL=recipient@example.com
USER_NAME=your-username
```

## Usage

Run the example:
```bash
php index.php
```

The script will send an instant email and display the results in the console.

## Environment Variables

| Variable | Description | Example |
|----------|-------------|---------|
| `API_BASE_URL` | Keplers.email API base URL | `https://api.keplers.email/api/v1` |
| `API_KEY` | Your Keplers.email API key (starts with `kms_`) | `kms_xxxx` |
| `TO_EMAIL` | Recipient email address | `recipient@example.com` |
| `USER_NAME` | Username for personalization | `your-username` |

## API Endpoint

The example uses the `/send-email/instant` endpoint which sends emails immediately.

### Request Format

```json
{
  "to": ["recipient@example.com"],
  "subject": "Email Subject",
  "body": "<h1>HTML content</h1><p>Email body</p>",
  "is_html": true
}
```

### Request Parameters

| Parameter | Type | Required | Description |
|-----------|------|----------|-------------|
| `to` | array | Yes | Array of recipient email addresses |
| `subject` | string | Yes | Email subject line |
| `body` | string | Yes | Email body content (HTML or plain text) |
| `is_html` | boolean | No | Set to `true` for HTML emails, `false` for plain text |

## Features

- Instant email delivery via REST API
- HTML email support
- Bearer token authentication
- Comprehensive error handling with status codes
- Variable substitution in subject and body

## Authentication

The API uses Bearer token authentication. Include your API key in the Authorization header:

```
Authorization: Bearer kms_xxxx
```

## Error Handling

The example includes comprehensive error handling that displays:
- HTTP status codes
- Detailed error response data
- Network errors

## Troubleshooting

- **401 Unauthorized**: Check that your `API_KEY` is correct and starts with `kms_`
- **400 Bad Request**: Verify request payload format matches the API specification
- **Network errors**: Ensure `API_BASE_URL` is correct and you have internet connectivity
