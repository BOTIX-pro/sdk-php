# BotixPro\Sdk\WebhooksApi

Подписки на события

All URIs are relative to https://api.botix.pro, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**publicV1WebhooksGet()**](WebhooksApi.md#publicV1WebhooksGet) | **GET** /public/v1/webhooks | Список подписок |
| [**publicV1WebhooksIdDelete()**](WebhooksApi.md#publicV1WebhooksIdDelete) | **DELETE** /public/v1/webhooks/{id} | Удалить подписку |
| [**publicV1WebhooksIdPut()**](WebhooksApi.md#publicV1WebhooksIdPut) | **PUT** /public/v1/webhooks/{id} | Обновить подписку |
| [**publicV1WebhooksIdTestPost()**](WebhooksApi.md#publicV1WebhooksIdTestPost) | **POST** /public/v1/webhooks/{id}/test | Тестовая отправка |
| [**publicV1WebhooksPost()**](WebhooksApi.md#publicV1WebhooksPost) | **POST** /public/v1/webhooks | Создать подписку |


## `publicV1WebhooksGet()`

```php
publicV1WebhooksGet(): \BotixPro\Sdk\Model\PublicV1WebhooksGet200Response
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
    $result = $apiInstance->publicV1WebhooksGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->publicV1WebhooksGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BotixPro\Sdk\Model\PublicV1WebhooksGet200Response**](../Model/PublicV1WebhooksGet200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `publicV1WebhooksIdDelete()`

```php
publicV1WebhooksIdDelete($id)
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
    $apiInstance->publicV1WebhooksIdDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->publicV1WebhooksIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `publicV1WebhooksIdPut()`

```php
publicV1WebhooksIdPut($id, $public_v1_webhooks_id_put_request)
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
$public_v1_webhooks_id_put_request = new \BotixPro\Sdk\Model\PublicV1WebhooksIdPutRequest(); // \BotixPro\Sdk\Model\PublicV1WebhooksIdPutRequest

try {
    $apiInstance->publicV1WebhooksIdPut($id, $public_v1_webhooks_id_put_request);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->publicV1WebhooksIdPut: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **public_v1_webhooks_id_put_request** | [**\BotixPro\Sdk\Model\PublicV1WebhooksIdPutRequest**](../Model/PublicV1WebhooksIdPutRequest.md)|  | |

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

## `publicV1WebhooksIdTestPost()`

```php
publicV1WebhooksIdTestPost($id): \BotixPro\Sdk\Model\PublicV1WebhooksIdTestPost200Response
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
    $result = $apiInstance->publicV1WebhooksIdTestPost($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->publicV1WebhooksIdTestPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\BotixPro\Sdk\Model\PublicV1WebhooksIdTestPost200Response**](../Model/PublicV1WebhooksIdTestPost200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `publicV1WebhooksPost()`

```php
publicV1WebhooksPost($public_v1_webhooks_post_request): \BotixPro\Sdk\Model\PublicV1WebhooksPost201Response
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
$public_v1_webhooks_post_request = new \BotixPro\Sdk\Model\PublicV1WebhooksPostRequest(); // \BotixPro\Sdk\Model\PublicV1WebhooksPostRequest

try {
    $result = $apiInstance->publicV1WebhooksPost($public_v1_webhooks_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->publicV1WebhooksPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **public_v1_webhooks_post_request** | [**\BotixPro\Sdk\Model\PublicV1WebhooksPostRequest**](../Model/PublicV1WebhooksPostRequest.md)|  | |

### Return type

[**\BotixPro\Sdk\Model\PublicV1WebhooksPost201Response**](../Model/PublicV1WebhooksPost201Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
