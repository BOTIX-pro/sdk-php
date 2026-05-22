# BotixPro\Sdk\MessagesApi

Сообщения (история и отправка)

All URIs are relative to https://api.botix.pro, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**messagesBulkSend()**](MessagesApi.md#messagesBulkSend) | **POST** /public/v1/messages/bulk-send | Массовая отправка сообщений (v1.1) |
| [**messagesList()**](MessagesApi.md#messagesList) | **GET** /public/v1/messages | История сообщений |
| [**messagesSend()**](MessagesApi.md#messagesSend) | **POST** /public/v1/messages | Отправить сообщение |


## `messagesBulkSend()`

```php
messagesBulkSend($messages_bulk_send_request, $idempotency_key): \BotixPro\Sdk\Model\MessagesBulkSend200Response
```

Массовая отправка сообщений (v1.1)

Отправляет до 50 сообщений одним запросом. Каждое — независимо: частичный успех допустим. Результат каждого item — либо `message_id` (успех), либо `error`.  Per-channel rate-limit (Telegram 30 msg/sec и т.п.) **не обходится** — если канал отвергает сообщение из-за своего лимита, item помечается `DELIVERY_FAILED`.  Поддерживает `Idempotency-Key`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\MessagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$messages_bulk_send_request = new \BotixPro\Sdk\Model\MessagesBulkSendRequest(); // \BotixPro\Sdk\Model\MessagesBulkSendRequest
$idempotency_key = 'idempotency_key_example'; // string | Уникальный токен запроса для защиты от дублей при сетевых сбоях. Рекомендация — UUID v4 на каждую логическую операцию. **TTL ключа — 24 часа.** После истечения тот же `Idempotency-Key` создаст новую операцию, кешированный результат не возвращается. Повтор в окне 24 часов вернёт сохранённый ответ + заголовок `Idempotent-Replayed: 1`.

try {
    $result = $apiInstance->messagesBulkSend($messages_bulk_send_request, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagesApi->messagesBulkSend: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **messages_bulk_send_request** | [**\BotixPro\Sdk\Model\MessagesBulkSendRequest**](../Model/MessagesBulkSendRequest.md)|  | |
| **idempotency_key** | **string**| Уникальный токен запроса для защиты от дублей при сетевых сбоях. Рекомендация — UUID v4 на каждую логическую операцию. **TTL ключа — 24 часа.** После истечения тот же &#x60;Idempotency-Key&#x60; создаст новую операцию, кешированный результат не возвращается. Повтор в окне 24 часов вернёт сохранённый ответ + заголовок &#x60;Idempotent-Replayed: 1&#x60;. | [optional] |

### Return type

[**\BotixPro\Sdk\Model\MessagesBulkSend200Response**](../Model/MessagesBulkSend200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `messagesList()`

```php
messagesList($page, $per_page, $cursor, $limit, $contact_id, $chat_id, $channel, $role, $since): \BotixPro\Sdk\Model\MessagesList200Response
```

История сообщений

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\MessagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$per_page = 50; // int
$cursor = 'cursor_example'; // string | v1.1+. Opaque cursor для постраничной выборки. Если передан — параметры `page`/`per_page` игнорируются. Получите следующий cursor из `meta.next_cursor` предыдущего ответа. `null`/отсутствие `next_cursor` = последняя страница.
$limit = 50; // int | v1.1+. Размер cursor-страницы. Используется только в cursor-режиме (`?cursor=...`); для классической page-пагинации применяется `per_page`.
$contact_id = 56; // int
$chat_id = 56; // int | alias для conversation_id
$channel = 'channel_example'; // string
$role = 'role_example'; // string
$since = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime

try {
    $result = $apiInstance->messagesList($page, $per_page, $cursor, $limit, $contact_id, $chat_id, $channel, $role, $since);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagesApi->messagesList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 50] |
| **cursor** | **string**| v1.1+. Opaque cursor для постраничной выборки. Если передан — параметры &#x60;page&#x60;/&#x60;per_page&#x60; игнорируются. Получите следующий cursor из &#x60;meta.next_cursor&#x60; предыдущего ответа. &#x60;null&#x60;/отсутствие &#x60;next_cursor&#x60; &#x3D; последняя страница. | [optional] |
| **limit** | **int**| v1.1+. Размер cursor-страницы. Используется только в cursor-режиме (&#x60;?cursor&#x3D;...&#x60;); для классической page-пагинации применяется &#x60;per_page&#x60;. | [optional] [default to 50] |
| **contact_id** | **int**|  | [optional] |
| **chat_id** | **int**| alias для conversation_id | [optional] |
| **channel** | **string**|  | [optional] |
| **role** | **string**|  | [optional] |
| **since** | **\DateTime**|  | [optional] |

### Return type

[**\BotixPro\Sdk\Model\MessagesList200Response**](../Model/MessagesList200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `messagesSend()`

```php
messagesSend($messages_send_request, $idempotency_key): \BotixPro\Sdk\Model\MessagesSend200Response
```

Отправить сообщение

Реально отправляет сообщение в канал (Telegram/widget/VK) и фиксирует его в истории. Канал выбирается так: 1. явный `channel` в payload (если передан); 2. `last_channel` контакта; 3. иначе 422 `NO_CHANNEL_AVAILABLE`.  Поддерживается заголовок `Idempotency-Key` (стандарт Stripe): повторный запрос с тем же ключом в течение 24 часов вернёт сохранённый ответ без новой отправки. Ответ будет содержать заголовок `Idempotent-Replayed: 1`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\MessagesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$messages_send_request = new \BotixPro\Sdk\Model\MessagesSendRequest(); // \BotixPro\Sdk\Model\MessagesSendRequest
$idempotency_key = 'idempotency_key_example'; // string | Уникальный токен запроса для защиты от дублей при сетевых сбоях. Рекомендация — UUID v4 на каждую логическую операцию. **TTL ключа — 24 часа.** После истечения тот же `Idempotency-Key` создаст новую операцию, кешированный результат не возвращается. Повтор в окне 24 часов вернёт сохранённый ответ + заголовок `Idempotent-Replayed: 1`.

try {
    $result = $apiInstance->messagesSend($messages_send_request, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagesApi->messagesSend: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **messages_send_request** | [**\BotixPro\Sdk\Model\MessagesSendRequest**](../Model/MessagesSendRequest.md)|  | |
| **idempotency_key** | **string**| Уникальный токен запроса для защиты от дублей при сетевых сбоях. Рекомендация — UUID v4 на каждую логическую операцию. **TTL ключа — 24 часа.** После истечения тот же &#x60;Idempotency-Key&#x60; создаст новую операцию, кешированный результат не возвращается. Повтор в окне 24 часов вернёт сохранённый ответ + заголовок &#x60;Idempotent-Replayed: 1&#x60;. | [optional] |

### Return type

[**\BotixPro\Sdk\Model\MessagesSend200Response**](../Model/MessagesSend200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
