# Keplars PHP Examples

Example projects showing how to send email with [Keplars](https://keplars.com) from PHP.

## Examples

| Directory | Description |
|---|---|
| [`api-example`](./api-example) | Raw HTTP via Guzzle - no SDK required |
| [`sdk-example`](./sdk-example) | Full Slim 4 web server using the Keplars PHP SDK |
| [`smtp-example`](./smtp-example) | SMTP relay via PHPMailer |

## SDK Install

```bash
composer require keplars/email-sdk
```

## Quick Start

```php
use Keplars\Email\Client;

$keplars = new Client('kms_your_api_key');

$response = $keplars->emails->sendInstant([
    'to' => ['user@example.com'],
    'from' => 'hello@yourdomain.com',
    'subject' => 'Hello!',
    'body' => '<h1>Hello World</h1>',
    'is_html' => true,
]);
```

## Prerequisites

- PHP 8.0+
- Composer
- A Keplars API key ([get one here](https://dash.keplars.com))

## License

MIT
