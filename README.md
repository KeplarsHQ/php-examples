# Keplers.email PHP Examples

Production-ready examples for integrating Keplers.email service into your PHP applications. Choose between SMTP or REST API based on your requirements.

## Examples Overview

### 1. SMTP Example (`smtp-example/`)
Send emails using the traditional SMTP protocol with PHPMailer. Best for applications already using SMTP or requiring direct mail server integration.

**Features:**
- PHPMailer integration
- Secure SMTP connection (port 2525)
- Send plain text and HTML emails
- Message tracking and error handling

**Use When:**
- Migrating from existing SMTP providers
- Need compatibility with legacy systems
- Prefer traditional email sending methods

[View SMTP Example →](./smtp-example/)

### 2. API Example (`api-example/`)
Send emails using Keplers.email REST API with Guzzle. Recommended for modern applications requiring instant delivery and API-first integration.

**Features:**
- Instant email delivery via `/send-email/instant` endpoint
- Bearer token authentication
- HTML email support
- Variable substitution for personalization
- Comprehensive error handling with detailed status codes

**Use When:**
- Building modern web applications
- Need instant email delivery
- Prefer RESTful API integration
- Require detailed delivery tracking

[View API Example →](./api-example/)

## Quick Start

1. Navigate to the example directory:
```bash
cd smtp-example
```
or
```bash
cd api-example
```

2. Install dependencies:
```bash
composer install
```

3. Configure environment variables:
```bash
cp .env.example .env
```

4. Edit `.env` with your credentials

5. Run the example:
```bash
php index.php
```

## Prerequisites

- PHP 7.4 or higher
- Composer
- Keplers.email account with SMTP or API credentials

## Security Checklist (Before Making Repository Public)

Before publishing this repository, verify the following:

### Files to Check
- [ ] No `.env` files exist (only `.env.example` should be present)
- [ ] No `vendor/` directories are committed
- [ ] No `composer.lock` files contain sensitive data
- [ ] `.gitignore` is properly configured

## Support

For more information about [Keplers.email](https://keplers.email/), visit the official documentation.
