<?php
/**
 * Пример 2 — отправка сообщения контакту через канал.
 *
 *     BOTIX_API_KEY=btx_live_... CONTACT_ID=12345 php examples/02-send-message.php
 *
 * Канал берётся из payload, иначе — из last_channel контакта. SDK сам
 * добавит заголовок Idempotency-Key (UUID v4) — повторный запуск с тем
 * же ключом не пошлёт второе сообщение в течение 24 часов.
 */

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$apiKey    = getenv('BOTIX_API_KEY') ?: 'btx_live_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
$contactId = (int) (getenv('CONTACT_ID') ?: 0);
if ($contactId === 0) {
    fwrite(STDERR, "Установите переменную окружения CONTACT_ID\n");
    exit(1);
}

$client = new \BotixPro\Sdk\Client($apiKey);

$body = new \BotixPro\Sdk\Model\PublicV1MessagesPostRequest([
    'contact_id' => $contactId,
    'content'    => 'Привет от BOTIX SDK!',
    // 'channel'  => 'telegram', // опционально
]);

try {
    $response = $client->messages()->publicV1MessagesPost($body);
    $data = $response->getData();
    echo "Отправлено\n";
    echo "  message_id      = {$data->getMessageId()}\n";
    echo "  conversation_id = {$data->getConversationId()}\n";
    echo "  channel         = {$data->getChannel()}\n";
    echo "  status          = {$data->getStatus()}\n";
} catch (\BotixPro\Sdk\ApiException $e) {
    echo "Ошибка API: " . $e->getResponseBody() . "\n";
    exit(1);
}
