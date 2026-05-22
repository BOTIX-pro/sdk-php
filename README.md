# BOTIX SDK для PHP

Официальная клиентская библиотека для публичного API [BOTIX](https://botix.pro) — платформы визуального конструктора чат-ботов и AI-ассистентов.

[![Packagist Version](https://img.shields.io/packagist/v/botix-pro/sdk.svg)](https://packagist.org/packages/botix-pro/sdk)
[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)
[![Tests](https://github.com/BOTIX-pro/sdk-php/actions/workflows/test.yml/badge.svg)](https://github.com/BOTIX-pro/sdk-php/actions/workflows/test.yml)

## Что это

SDK даёт удобный PHP-клиент над REST API `https://api.botix.pro/public/v1/*`: контакты, сообщения, чаты, сценарии, каналы и webhooks. Авторизация — Bearer-токеном, привязанным к проекту в BOTIX.

Получить ключ: войти в кабинет `app.botix.pro`, открыть **Настройки → API-ключи**, нажать «Создать ключ». Полный ключ (`btx_live_…`) показывается **один раз** — сохраните.

## Установка

```bash
composer require botix-pro/sdk
```

Требования: PHP 8.0+, расширения `curl`, `json`, `mbstring`.

## Первый запрос

Проверка ключа — endpoint `GET /me` возвращает контекст: `project_id`, scopes тариф, остаток rate-limit.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

$client = new \BotixPro\Sdk\Client('btx_live_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');

$me = $client->meta()->publicV1MeGet();
echo "project_id = {$me->getData()->getProjectId()}\n";
echo "plan = {$me->getData()->getPlanKey()}\n";
```

## Отправка сообщения

`POST /messages` — реально шлёт текст в канал (Telegram / виджет / VK). Канал берётся из payload или `last_channel` контакта.

```php
<?php
$body = new \BotixPro\Sdk\Model\PublicV1MessagesPostRequest([
    'contact_id' => 12345,
    'content'    => 'Привет от BOTIX SDK',
    'channel'    => 'telegram', // опционально
]);

$response = $client->messages()->publicV1MessagesPost($body);
echo "message_id = {$response->getData()->getMessageId()}\n";
```

Заголовок `Idempotency-Key` (UUID v4) добавляется автоматически — повтор запроса с тем же ключом в течение 24 часов вернёт сохранённый ответ без новой отправки. Отключить: `new Client($key, ['auto_idempotency_key' => false])`.

## Webhooks: проверка подписи

BOTIX подписывает каждую доставку HMAC-SHA256 от raw body и кладёт результат в заголовок `X-Botix-Signature`. Секрет подписки выдаётся один раз при `POST /webhooks`.

```php
<?php
require __DIR__ . '/vendor/autoload.php';

$rawPayload = file_get_contents('php://input');
$signature  = $_SERVER['HTTP_X_BOTIX_SIGNATURE'] ?? '';
$secret     = getenv('BOTIX_WEBHOOK_SECRET');

if (!\BotixPro\Sdk\Client::verifyWebhook($rawPayload, $signature, $secret)) {
    http_response_code(401);
    exit('invalid signature');
}

$event = json_decode($rawPayload, true);
// обрабатываем $event['event'], $event['data']
http_response_code(200);
```

Сравнение через `hash_equals` — защита от timing-атак.

## Работа с ошибками

API возвращает `{success: false, error: {code, message, details}}`. SDK кидает `\BotixPro\Sdk\ApiException` на не-2xx; код ошибки — внутри тела.

| HTTP | code | Когда |
|---|---|---|
| 401 | `MISSING_API_KEY` / `INVALID_API_KEY` / `KEY_REVOKED` | Ключ отсутствует, поддельный или отозван |
| 403 | `INSUFFICIENT_SCOPE` | У ключа нет нужного scope |
| 403 | `API_NOT_AVAILABLE_ON_PLAN` | Тариф клиента не включает API |
| 403 | `TRIAL_READ_ONLY` | Триал — мутирующие методы запрещены |
| 422 | `NO_CHANNEL_AVAILABLE` / `CHANNEL_NOT_CONNECTED` / `CONTACT_NOT_REACHABLE` | Не удалось определить или достучаться до канала |
| 422 | `CHANNEL_NOT_SUPPORTED_YET` | Канал есть в системе, но интеграция в API ещё не подключена (WhatsApp) |
| 422 | `CONTACT_BUSY` | Контакт в активном сценарии — передайте `force=true` |
| 429 | `RATE_LIMIT_EXCEEDED` | Превышен минутный или суточный лимит |
| 502 | `DELIVERY_FAILED` | Канал отверг отправку |

```php
try {
    $client->messages()->publicV1MessagesPost($body);
} catch (\BotixPro\Sdk\ApiException $e) {
    $payload = json_decode($e->getResponseBody(), true);
    error_log("BOTIX error {$payload['error']['code']}: {$payload['error']['message']}");
}
```

## Ссылки

- Документация API: <https://developers.botix.pro/>
- Маркетинговая страница: <https://botix.pro/developers>
- Этот репозиторий: <https://github.com/BOTIX-pro/sdk-php>
- Issues / поддержка: <https://github.com/BOTIX-pro/sdk-php/issues>
- Email: hello@botix.pro

## Лицензия

[MIT](LICENSE)
