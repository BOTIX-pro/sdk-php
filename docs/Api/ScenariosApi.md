# BotixPro\Sdk\ScenariosApi

Scenarios (визуальный конструктор)

All URIs are relative to https://api.botix.pro, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**publicV1ScenariosGet()**](ScenariosApi.md#publicV1ScenariosGet) | **GET** /public/v1/scenarios | Список сценариев проекта |
| [**publicV1ScenariosIdRunPost()**](ScenariosApi.md#publicV1ScenariosIdRunPost) | **POST** /public/v1/scenarios/{id}/run | Запустить сценарий для контакта |


## `publicV1ScenariosGet()`

```php
publicV1ScenariosGet(): \BotixPro\Sdk\Model\PublicV1ScenariosGet200Response
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
    $result = $apiInstance->publicV1ScenariosGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScenariosApi->publicV1ScenariosGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BotixPro\Sdk\Model\PublicV1ScenariosGet200Response**](../Model/PublicV1ScenariosGet200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `publicV1ScenariosIdRunPost()`

```php
publicV1ScenariosIdRunPost($id, $public_v1_scenarios_id_run_post_request, $idempotency_key): \BotixPro\Sdk\Model\PublicV1ScenariosIdRunPost200Response
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
$public_v1_scenarios_id_run_post_request = new \BotixPro\Sdk\Model\PublicV1ScenariosIdRunPostRequest(); // \BotixPro\Sdk\Model\PublicV1ScenariosIdRunPostRequest
$idempotency_key = 'idempotency_key_example'; // string

try {
    $result = $apiInstance->publicV1ScenariosIdRunPost($id, $public_v1_scenarios_id_run_post_request, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ScenariosApi->publicV1ScenariosIdRunPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **public_v1_scenarios_id_run_post_request** | [**\BotixPro\Sdk\Model\PublicV1ScenariosIdRunPostRequest**](../Model/PublicV1ScenariosIdRunPostRequest.md)|  | |
| **idempotency_key** | **string**|  | [optional] |

### Return type

[**\BotixPro\Sdk\Model\PublicV1ScenariosIdRunPost200Response**](../Model/PublicV1ScenariosIdRunPost200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
