<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/webhooks/keplars', function (Request $request, Response $response) {
    $webhookSecret = $_ENV['KEPLARS_WEBHOOK_SECRET'] ?? '';
    $signature = $request->getHeaderLine('X-Keplars-Signature');
    $rawBody = (string) $request->getBody();

    if (!empty($webhookSecret)) {
        $expected = 'sha256=' . hash_hmac('sha256', $rawBody, $webhookSecret);
        if (!hash_equals($expected, $signature)) {
            $response->getBody()->write(json_encode(['error' => 'Invalid signature']));
            return $response->withStatus(401)->withHeader('Content-Type', 'application/json');
        }
    }

    $payload = json_decode($rawBody, true);
    $eventType = $payload['event'] ?? 'unknown';

    switch ($eventType) {
        case 'email.delivered':
            error_log("Email delivered: " . ($payload['data']['email_id'] ?? ''));
            break;
        case 'email.bounced':
            error_log("Email bounced: " . ($payload['data']['email_id'] ?? ''));
            break;
        case 'email.complained':
            error_log("Spam complaint: " . ($payload['data']['email_id'] ?? ''));
            break;
        case 'email.opened':
            error_log("Email opened: " . ($payload['data']['email_id'] ?? ''));
            break;
        case 'email.clicked':
            error_log("Link clicked: " . ($payload['data']['url'] ?? ''));
            break;
        case 'email.failed':
            error_log("Email failed: " . ($payload['data']['reason'] ?? ''));
            break;
    }

    $response->getBody()->write(json_encode(['received' => true]));
    return $response->withHeader('Content-Type', 'application/json');
});
