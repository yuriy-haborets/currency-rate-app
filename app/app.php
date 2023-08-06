<?php

require 'vendor/autoload.php'; // Підключаємо автозавантаження класів з Composer
use GuzzleHttp\Client;

// URL API НБУ для отримання курсу валют
$apiUrl = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=USD&json';

// Виконуємо запит до API НБУ
$client = new Client();
$response = $client->get($apiUrl);
$data = json_decode($response->getBody(), true);

// Отримуємо значення курсу валюти USD
$usdRate = isset($data[0]['rate']) ? $data[0]['rate'] : null;

if ($usdRate) {
    // Записуємо значення курсу в файл
    file_put_contents('public/usd_rate.txt', $usdRate);
    echo "Курс валюти USD успішно оновлено!\n";
} else {
    echo "Не вдалося отримати курс валюти USD з API НБУ.\n";
}