# BotixPro\Sdk\MetaApi

Meta эндпоинты

All URIs are relative to https://api.botix.pro, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**publicV1MeGet()**](MetaApi.md#publicV1MeGet) | **GET** /public/v1/me | Контекст текущего ключа |


## `publicV1MeGet()`

```php
publicV1MeGet(): \BotixPro\Sdk\Model\MeResponse
```

Контекст текущего ключа

Возвращает project_id, scopes, plan_key, остаток rate-limit

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\MetaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->publicV1MeGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MetaApi->publicV1MeGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BotixPro\Sdk\Model\MeResponse**](../Model/MeResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
