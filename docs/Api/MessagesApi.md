# BotixPro\Sdk\MessagesApi

Messages (история и отправка)

All URIs are relative to https://api.botix.pro, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**publicV1MessagesGet()**](MessagesApi.md#publicV1MessagesGet) | **GET** /public/v1/messages | История сообщений |
| [**publicV1MessagesPost()**](MessagesApi.md#publicV1MessagesPost) | **POST** /public/v1/messages | Отправить сообщение |


## `publicV1MessagesGet()`

```php
publicV1MessagesGet($page, $per_page, $contact_id, $chat_id, $channel, $role, $since): \BotixPro\Sdk\Model\PublicV1MessagesGet200Response
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
$contact_id = 56; // int
$chat_id = 56; // int | alias для conversation_id
$channel = 'channel_example'; // string
$role = 'role_example'; // string
$since = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime

try {
    $result = $apiInstance->publicV1MessagesGet($page, $per_page, $contact_id, $chat_id, $channel, $role, $since);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagesApi->publicV1MessagesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 50] |
| **contact_id** | **int**|  | [optional] |
| **chat_id** | **int**| alias для conversation_id | [optional] |
| **channel** | **string**|  | [optional] |
| **role** | **string**|  | [optional] |
| **since** | **\DateTime**|  | [optional] |

### Return type

[**\BotixPro\Sdk\Model\PublicV1MessagesGet200Response**](../Model/PublicV1MessagesGet200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `publicV1MessagesPost()`

```php
publicV1MessagesPost($public_v1_messages_post_request, $idempotency_key): \BotixPro\Sdk\Model\PublicV1MessagesPost200Response
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
$public_v1_messages_post_request = new \BotixPro\Sdk\Model\PublicV1MessagesPostRequest(); // \BotixPro\Sdk\Model\PublicV1MessagesPostRequest
$idempotency_key = 'idempotency_key_example'; // string | Уникальный токен запроса для защиты от дублей при сетевых сбоях.

try {
    $result = $apiInstance->publicV1MessagesPost($public_v1_messages_post_request, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagesApi->publicV1MessagesPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **public_v1_messages_post_request** | [**\BotixPro\Sdk\Model\PublicV1MessagesPostRequest**](../Model/PublicV1MessagesPostRequest.md)|  | |
| **idempotency_key** | **string**| Уникальный токен запроса для защиты от дублей при сетевых сбоях. | [optional] |

### Return type

[**\BotixPro\Sdk\Model\PublicV1MessagesPost200Response**](../Model/PublicV1MessagesPost200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
