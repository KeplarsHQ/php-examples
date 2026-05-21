<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/api/emails/welcome', function (Request $request, Response $response) use ($keplars) {
    $body = $request->getParsedBody();
    $email = $body['email'] ?? '';
    $firstName = $body['firstName'] ?? 'there';

    $result = $keplars->emails->sendAsync([
        'to' => [$email],
        'from' => $_ENV['FROM_EMAIL'] ?? 'hello@yourdomain.com',
        'subject' => "Welcome {$firstName}!",
        'body' => "<h1>Welcome {$firstName}!</h1><p>Thank you for joining our platform.</p>",
        'is_html' => true,
    ]);

    $response->getBody()->write(json_encode($result));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/api/emails/otp', function (Request $request, Response $response) use ($keplars) {
    $body = $request->getParsedBody();
    $email = $body['email'] ?? '';
    $otp = $body['otp'] ?? '';

    $result = $keplars->emails->sendInstant([
        'to' => [$email],
        'from' => $_ENV['FROM_EMAIL'] ?? 'hello@yourdomain.com',
        'subject' => "Your verification code: {$otp}",
        'body' => "<p>Your one-time password is <strong>{$otp}</strong>. It expires in 10 minutes.</p>",
        'is_html' => true,
    ]);

    $response->getBody()->write(json_encode($result));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/api/emails/password-reset', function (Request $request, Response $response) use ($keplars) {
    $body = $request->getParsedBody();
    $email = $body['email'] ?? '';
    $resetLink = $body['resetLink'] ?? '';

    $result = $keplars->emails->sendHigh([
        'to' => [$email],
        'from' => $_ENV['FROM_EMAIL'] ?? 'hello@yourdomain.com',
        'subject' => 'Reset your password',
        'body' => "<p>Click <a href=\"{$resetLink}\">here</a> to reset your password. This link expires in 1 hour.</p>",
        'is_html' => true,
    ]);

    $response->getBody()->write(json_encode($result));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/api/emails/order-confirmation', function (Request $request, Response $response) use ($keplars) {
    $body = $request->getParsedBody();
    $email = $body['email'] ?? '';
    $orderId = $body['orderId'] ?? '';
    $total = $body['total'] ?? '';

    $result = $keplars->emails->sendHigh([
        'to' => [$email],
        'from' => $_ENV['FROM_EMAIL'] ?? 'hello@yourdomain.com',
        'subject' => "Order confirmed: {$orderId}",
        'body' => "<h1>Order Confirmed</h1><p>Order {$orderId} totalling {$total} has been confirmed.</p>",
        'is_html' => true,
    ]);

    $response->getBody()->write(json_encode($result));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/api/emails/newsletter', function (Request $request, Response $response) use ($keplars) {
    $body = $request->getParsedBody();
    $recipients = $body['recipients'] ?? [];
    $subject = $body['subject'] ?? '';
    $html = $body['html'] ?? '';

    $result = $keplars->emails->sendBulk([
        'to' => $recipients,
        'from' => $_ENV['FROM_EMAIL'] ?? 'hello@yourdomain.com',
        'subject' => $subject,
        'body' => $html,
        'is_html' => true,
    ]);

    $response->getBody()->write(json_encode($result));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->post('/api/emails/newsletter/schedule', function (Request $request, Response $response) use ($keplars) {
    $body = $request->getParsedBody();
    $recipients = $body['recipients'] ?? [];
    $subject = $body['subject'] ?? '';
    $html = $body['html'] ?? '';
    $scheduledFor = $body['scheduledFor'] ?? '';
    $timezone = $body['timezone'] ?? 'UTC';

    $result = $keplars->emails->schedule([
        'to' => $recipients,
        'from' => $_ENV['FROM_EMAIL'] ?? 'hello@yourdomain.com',
        'subject' => $subject,
        'body' => $html,
        'is_html' => true,
        'scheduled_for' => $scheduledFor,
        'timezone' => $timezone,
    ]);

    $response->getBody()->write(json_encode($result));
    return $response->withHeader('Content-Type', 'application/json');
});
