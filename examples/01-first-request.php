<?php
/**
 * Пример 1 — первый запрос к BOTIX Public API.
 *
 * Перед запуском: composer install и подставьте свой ключ в переменную $apiKey
 * (получить в кабинете app.botix.pro → Настройки → API-ключи).
 *
 *     php examples/01-first-request.php
 */

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$apiKey = getenv('BOTIX_API_KEY') ?: 'btx_live_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';

$client = new \BotixPro\Sdk\Client($apiKey);

try {
    $me = $client->system()->meGet();
    $data = $me->getData();
    echo "OK\n";
    echo "  project_id = {$data->getProjectId()}\n";
    echo "  api_key_id = {$data->getApiKeyId()}\n";
    echo "  plan_key   = {$data->getPlanKey()}\n";
    echo "  scopes     = " . implode(', ', $data->getScopes() ?? []) . "\n";
} catch (\BotixPro\Sdk\ApiException $e) {
    echo "API error " . $e->getCode() . ": " . $e->getResponseBody() . "\n";
    exit(1);
}
