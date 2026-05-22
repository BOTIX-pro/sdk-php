# BotixPro\Sdk\ChannelsApi

Channels связи (Telegram, виджет, …)

All URIs are relative to https://api.botix.pro, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**publicV1ChannelsGet()**](ChannelsApi.md#publicV1ChannelsGet) | **GET** /public/v1/channels | Channels проекта |


## `publicV1ChannelsGet()`

```php
publicV1ChannelsGet(): \BotixPro\Sdk\Model\PublicV1ChannelsGet200Response
```

Channels проекта

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\ChannelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->publicV1ChannelsGet();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ChannelsApi->publicV1ChannelsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\BotixPro\Sdk\Model\PublicV1ChannelsGet200Response**](../Model/PublicV1ChannelsGet200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
