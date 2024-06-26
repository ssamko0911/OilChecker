<?php

require '../vendor/autoload.php';
require 'functions.php';

use App\Exception\OpenAiException;
use Dotenv\Dotenv;
use GuzzleHttp\Client;

session_start();

$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$model = $_ENV['GPT_MODEL'];
$apiKey = $_ENV['GPT_API_KEY'];
$apiUrl = $_ENV['GPT_API_URL'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $oilGrade = htmlspecialchars($_POST['oilGrade']);
    $engineType = htmlspecialchars($_POST['engineType']);

//    $errors = [];
//
//    if (!strlen(checkString($oilGrade))) {
//        $errors['oilGrade'] = 'Wrong input value, it\'s not a valid oil grade, max 10 letters/numbers!';
//    }
//
//    if (!empty($errors)) {
//        getIndexView($errors);
//    } else {
    $data = [
        'model' => $model,
        'messages' => [
            [
                'role' => 'system',
                'content' => "Is this {$oilGrade} compatible with the engine {$engineType}? Provide some precise examples if the given grade is not compatible with the engine",
                //'content' => "Write me, please, 10000 words",
            ]
        ],
    ];

    $httpClient = new Client();

    try {
        $response = $httpClient->request('POST', $apiUrl, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $apiKey,
            ],
            'json' => $data,
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new OpenAiException($apiUrl, $response->getStatusCode(), $response->getBody()->getContents(), null);
        }

        $body = $response->getBody();
        $_SESSION['result'] = json_decode($body, true)['choices'][0]['message']['content'];
    } catch (Throwable $e) {
        // log + throw

        $_SESSION['result'] = 'Sorry, our service is unavailable, try later';

        throw new OpenAiException($apiUrl, '500', $e->getMessage(), $e);

    } finally {
        basicRedirect();
    }
//    }
}
