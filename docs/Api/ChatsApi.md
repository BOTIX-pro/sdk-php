# BotixPro\Sdk\ChatsApi

Чаты (диалоги bot↔контакт)

All URIs are relative to https://api.botix.pro, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**chatsList()**](ChatsApi.md#chatsList) | **GET** /public/v1/chats | Список чатов |
| [**chatsMessages()**](ChatsApi.md#chatsMessages) | **GET** /public/v1/chats/{id}/messages | Сообщения внутри чата |


## `chatsList()`

```php
chatsList($page, $per_page, $status, $channel, $contact_id): \BotixPro\Sdk\Model\ChatsList200Response
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
    $result = $apiInstance->chatsList($page, $per_page, $status, $channel, $contact_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ChatsApi->chatsList: ', $e->getMessage(), PHP_EOL;
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

[**\BotixPro\Sdk\Model\ChatsList200Response**](../Model/ChatsList200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `chatsMessages()`

```php
chatsMessages($id, $page, $per_page): \BotixPro\Sdk\Model\MessagesList200Response
```

Сообщения внутри чата

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
    $result = $apiInstance->chatsMessages($id, $page, $per_page);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ChatsApi->chatsMessages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 50] |

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
