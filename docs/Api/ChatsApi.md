# BotixPro\Sdk\ChatsApi

Chats (диалоги bot↔контакт)

All URIs are relative to https://api.botix.pro, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**publicV1ChatsGet()**](ChatsApi.md#publicV1ChatsGet) | **GET** /public/v1/chats | Список чатов |
| [**publicV1ChatsIdMessagesGet()**](ChatsApi.md#publicV1ChatsIdMessagesGet) | **GET** /public/v1/chats/{id}/messages | Messages внутри чата |


## `publicV1ChatsGet()`

```php
publicV1ChatsGet($page, $per_page, $status, $channel, $contact_id): \BotixPro\Sdk\Model\PublicV1ChatsGet200Response
```

Список чатов

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\ChatsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$per_page = 50; // int
$status = 'status_example'; // string
$channel = 'channel_example'; // string
$contact_id = 56; // int

try {
    $result = $apiInstance->publicV1ChatsGet($page, $per_page, $status, $channel, $contact_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ChatsApi->publicV1ChatsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 50] |
| **status** | **string**|  | [optional] |
| **channel** | **string**|  | [optional] |
| **contact_id** | **int**|  | [optional] |

### Return type

[**\BotixPro\Sdk\Model\PublicV1ChatsGet200Response**](../Model/PublicV1ChatsGet200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `publicV1ChatsIdMessagesGet()`

```php
publicV1ChatsIdMessagesGet($id, $page, $per_page): \BotixPro\Sdk\Model\PublicV1MessagesGet200Response
```

Messages внутри чата

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\ChatsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$page = 1; // int
$per_page = 50; // int

try {
    $result = $apiInstance->publicV1ChatsIdMessagesGet($id, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ChatsApi->publicV1ChatsIdMessagesGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 50] |

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
