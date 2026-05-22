# BotixPro\Sdk\ScenariosApi

Сценарии (визуальный конструктор)

All URIs are relative to https://api.botix.pro, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**scenariosList()**](ScenariosApi.md#scenariosList) | **GET** /public/v1/scenarios | Список сценариев проекта |
| [**scenariosRun()**](ScenariosApi.md#scenariosRun) | **POST** /public/v1/scenarios/{id}/run | Запустить сценарий для контакта |


## `scenariosList()`

```php
scenariosList(): \BotixPro\Sdk\Model\ScenariosList200Response
```

Список сценариев проекта

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\ScenariosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->scenariosList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScenariosApi->scenariosList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BotixPro\Sdk\Model\ScenariosList200Response**](../Model/ScenariosList200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `scenariosRun()`

```php
scenariosRun($id, $scenarios_run_request, $idempotency_key): \BotixPro\Sdk\Model\ScenariosRun200Response
```

Запустить сценарий для контакта

Запускает сценарий синхронно: создаёт conversation, отправляет первый блок в канал, возвращает 200 OK c результатом. Для widget-канала первый блок возвращается прямо в ответе (`first_block`/`first_blocks`); для остальных каналов он уходит сразу пользователю, в ответе остаётся пустым.  Поддерживает `Idempotency-Key` (24ч). Если контакт сейчас в другом сценарии — вернётся 422 `CONTACT_BUSY`; передайте `force=true`, чтобы прервать предыдущий диалог.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\ScenariosApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$scenarios_run_request = new \BotixPro\Sdk\Model\ScenariosRunRequest(); // \BotixPro\Sdk\Model\ScenariosRunRequest
$idempotency_key = 'idempotency_key_example'; // string | Уникальный токен запроса для защиты от дублей при сетевых сбоях. Рекомендация — UUID v4 на каждую логическую операцию. **TTL ключа — 24 часа.** После истечения тот же `Idempotency-Key` создаст новую операцию, кешированный результат не возвращается. Повтор в окне 24 часов вернёт сохранённый ответ + заголовок `Idempotent-Replayed: 1`.

try {
    $result = $apiInstance->scenariosRun($id, $scenarios_run_request, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScenariosApi->scenariosRun: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **scenarios_run_request** | [**\BotixPro\Sdk\Model\ScenariosRunRequest**](../Model/ScenariosRunRequest.md)|  | |
| **idempotency_key** | **string**| Уникальный токен запроса для защиты от дублей при сетевых сбоях. Рекомендация — UUID v4 на каждую логическую операцию. **TTL ключа — 24 часа.** После истечения тот же &#x60;Idempotency-Key&#x60; создаст новую операцию, кешированный результат не возвращается. Повтор в окне 24 часов вернёт сохранённый ответ + заголовок &#x60;Idempotent-Replayed: 1&#x60;. | [optional] |

### Return type

[**\BotixPro\Sdk\Model\ScenariosRun200Response**](../Model/ScenariosRun200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
