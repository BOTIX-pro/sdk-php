# BotixPro\Sdk\WebhooksApi

Подписки на события

All URIs are relative to https://api.botix.pro, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**webhooksCreate()**](WebhooksApi.md#webhooksCreate) | **POST** /public/v1/webhooks | Создать подписку |
| [**webhooksDelete()**](WebhooksApi.md#webhooksDelete) | **DELETE** /public/v1/webhooks/{id} | Удалить подписку |
| [**webhooksList()**](WebhooksApi.md#webhooksList) | **GET** /public/v1/webhooks | Список подписок |
| [**webhooksTest()**](WebhooksApi.md#webhooksTest) | **POST** /public/v1/webhooks/{id}/test | Тестовая отправка |
| [**webhooksUpdate()**](WebhooksApi.md#webhooksUpdate) | **PUT** /public/v1/webhooks/{id} | Обновить подписку |


## `webhooksCreate()`

```php
webhooksCreate($webhooks_create_request): \BotixPro\Sdk\Model\WebhooksCreate201Response
```

Создать подписку

После создания возвращается ОДИН РАЗ поле `data.secret` — для верификации заголовка `X-Botix-Signature` (HMAC-SHA256). Сохраните его на своей стороне.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$webhooks_create_request = new \BotixPro\Sdk\Model\WebhooksCreateRequest(); // \BotixPro\Sdk\Model\WebhooksCreateRequest

try {
    $result = $apiInstance->webhooksCreate($webhooks_create_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **webhooks_create_request** | [**\BotixPro\Sdk\Model\WebhooksCreateRequest**](../Model/WebhooksCreateRequest.md)|  | |

### Return type

[**\BotixPro\Sdk\Model\WebhooksCreate201Response**](../Model/WebhooksCreate201Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksDelete()`

```php
webhooksDelete($id)
```

Удалить подписку

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $apiInstance->webhooksDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksList()`

```php
webhooksList(): \BotixPro\Sdk\Model\WebhooksList200Response
```

Список подписок

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->webhooksList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BotixPro\Sdk\Model\WebhooksList200Response**](../Model/WebhooksList200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksTest()`

```php
webhooksTest($id): \BotixPro\Sdk\Model\WebhooksTest200Response
```

Тестовая отправка

Шлёт фиктивное событие `test` на URL подписки. Удобно для проверки HMAC и доступности endpoint'а на стороне клиента.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->webhooksTest($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksTest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\BotixPro\Sdk\Model\WebhooksTest200Response**](../Model/WebhooksTest200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `webhooksUpdate()`

```php
webhooksUpdate($id, $webhooks_update_request)
```

Обновить подписку

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$webhooks_update_request = new \BotixPro\Sdk\Model\WebhooksUpdateRequest(); // \BotixPro\Sdk\Model\WebhooksUpdateRequest

try {
    $apiInstance->webhooksUpdate($id, $webhooks_update_request);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->webhooksUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **webhooks_update_request** | [**\BotixPro\Sdk\Model\WebhooksUpdateRequest**](../Model/WebhooksUpdateRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
