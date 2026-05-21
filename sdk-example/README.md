# Keplars PHP SDK Example

Slim 4 web server demonstrating the [Keplars](https://keplars.com) PHP email SDK.

## Requirements

- PHP 8.0+
- Composer
- A Keplars API key ([get one here](https://dash.keplars.com))

## Setup

```bash
cd sdk-example
composer install
cp .env.example .env
```

Set your credentials in `.env`:

```bash
KEPLARS_API_KEY=kms_your_key_here
KEPLARS_WEBHOOK_SECRET=your_webhook_secret
```

Run:

```bash
php -S localhost:8080 -t public
```

Server starts on `http://localhost:8080`.

## Endpoints

### Transactional Emails

```bash
curl -X POST http://localhost:8080/api/emails/welcome \
  -H "Content-Type: application/json" \
  -d '{"email":"user@example.com","firstName":"Jane"}'

curl -X POST http://localhost:8080/api/emails/otp \
  -H "Content-Type: application/json" \
  -d '{"email":"user@example.com","otp":"847291"}'

curl -X POST http://localhost:8080/api/emails/password-reset \
  -H "Content-Type: application/json" \
  -d '{"email":"user@example.com","resetLink":"https://yourapp.com/reset/abc123"}'
```

### Marketing Emails

```bash
curl -X POST http://localhost:8080/api/emails/newsletter \
  -H "Content-Type: application/json" \
  -d '{"recipients":["a@example.com","b@example.com"],"subject":"Monthly Update","html":"<h1>Hello!</h1>"}'

curl -X POST http://localhost:8080/api/emails/newsletter/schedule \
  -H "Content-Type: application/json" \
  -d '{"recipients":["a@example.com"],"subject":"Weekend Deal","html":"<h1>Special offer!</h1>","scheduledFor":"2026-06-01T09:00:00Z","timezone":"UTC"}'
```

### Webhooks

```
POST http://localhost:8080/webhooks/keplars
```

## Priority Reference

| Use Case | Method | Priority |
|---|---|---|
| OTP, auth codes | `sendInstant` | Instant |
| Password reset | `sendHigh` | High |
| Welcome emails | `sendAsync` | Async |
| Newsletters | `sendBulk` | Bulk |

## License

MIT
