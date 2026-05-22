<?php
/**
 * Пример 3 — приёмник webhook-событий от BOTIX.
 *
 * Положите этот файл на ваш сервер по публично доступному URL (HTTPS)
 * и укажите этот URL при создании подписки через POST /webhooks.
 * Секрет (`data.secret` из ответа) — сохраните в env-переменной.
 *
 * BOTIX подписывает каждую доставку HMAC-SHA256 от raw body, кладёт в
 * заголовок X-Botix-Signature. Сравнение через hash_equals защищает
 * от timing-атак.
 *
 * Тестовая отправка: POST /webhooks/{id}/test — придёт событие "test".
 */

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$secret = getenv('BOTIX_WEBHOOK_SECRET') ?: '';
if ($secret === '') {
    http_response_code(500);
    error_log('BOTIX_WEBHOOK_SECRET не задан');
    exit;
}

$rawPayload = (string) file_get_contents('php://input');
$signature  = (string) ($_SERVER['HTTP_X_BOTIX_SIGNATURE'] ?? '');

if (!\BotixPro\Sdk\Client::verifyWebhook($rawPayload, $signature, $secret)) {
    http_response_code(401);
    exit('invalid signature');
}

$event = json_decode($rawPayload, true);
if (!is_array($event)) {
    http_response_code(400);
    exit('invalid json');
}

// Например: contact.created, message.sent, scenario.started, test
error_log("BOTIX event: {$event['event']} request_id={$_SERVER['HTTP_X_BOTIX_REQUEST_ID']}");

// Обработайте событие — записать в очередь, обновить CRM и т.п.
// switch ($event['event']) { ... }

http_response_code(200);
echo 'ok';
