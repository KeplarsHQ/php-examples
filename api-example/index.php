<?php

require_once __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiClient = new Client([
    'base_uri' => $_ENV['API_BASE_URL'],
    'headers' => [
        'Authorization' => 'Bearer ' . $_ENV['API_KEY'],
        'Content-Type' => 'application/json'
    ]
]);

function sendInstantEmail($client) {
    try {
        $response = $client->post('/send-email/instant', [
            'json' => [
                'to' => [$_ENV['TO_EMAIL']],
                'subject' => "Welcome {$_ENV['USER_NAME']}!",
                'body' => "<h1>Welcome {$_ENV['USER_NAME']}!</h1><p>Thank you for joining our platform.</p>",
                'is_html' => true
            ]
        ]);

        echo "Email sent successfully!\n";
        echo "Response: " . $response->getBody() . "\n";
    } catch (RequestException $e) {
        echo "Error sending email:\n";
        if ($e->hasResponse()) {
            echo "Status: " . $e->getResponse()->getStatusCode() . "\n";
            echo "Data: " . $e->getResponse()->getBody() . "\n";
        } else {
            echo $e->getMessage() . "\n";
        }
    }
}

function main() {
    global $apiClient;
    echo "=== Sending Simple Email ===\n";
    sendInstantEmail($apiClient);
}

main();
