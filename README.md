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

### Automated Verification
Run the security verification script:
```bash
bash verify-security.sh
```

### Manual Verification Commands
```bash
# Check for .env files
find . -name ".env" -type f

# Check for hardcoded credentials in PHP files
grep -r "kms_[a-zA-Z0-9]{20,}" --include="*.php" .
grep -r "password\s*=\s*['\"][^'\"]*['\"]" --include="*.php" .

# Verify .env files are in .gitignore
git status

# Check git history for accidentally committed secrets
git log --all --full-history -- "*.env"
```

### Safe to Commit
- ✅ `.env.example` files with placeholder values only
- ✅ All PHP files use `$_ENV` variables
- ✅ Documentation files with no personal information
- ✅ `composer.json` files without author details
- ✅ `.gitignore` configured to exclude sensitive files

### Not Safe to Commit
- ❌ `.env` files with real credentials
- ❌ Hardcoded API keys or passwords
- ❌ Personal email addresses
- ❌ `vendor/` directory
- ❌ Files containing actual SMTP credentials

## Support

For more information about Keplers.email, visit the official documentation.
