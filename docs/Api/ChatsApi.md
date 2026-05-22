# BotixPro\Sdk\ChatsApi

Чаты (диалоги bot↔контакт)

All URIs are relative to https://api.botix.pro, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**chatsList()**](ChatsApi.md#chatsList) | **GET** /public/v1/chats | Список чатов |
| [**chatsMessages()**](ChatsApi.md#chatsMessages) | **GET** /public/v1/chats/{id}/messages | Сообщения внутри чата |


## `chatsList()`

```php
chatsList($page, $per_page, $cursor, $limit, $status, $channel, $contact_id): \BotixPro\Sdk\Model\ChatsList200Response
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
$cursor = 'cursor_example'; // string | v1.1+. Opaque cursor для постраничной выборки. Если передан — параметры `page`/`per_page` игнорируются. Получите следующий cursor из `meta.next_cursor` предыдущего ответа. `null`/отсутствие `next_cursor` = последняя страница.
$limit = 50; // int | v1.1+. Размер cursor-страницы. Используется только в cursor-режиме (`?cursor=...`); для классической page-пагинации применяется `per_page`.
$status = 'status_example'; // string
$channel = 'channel_example'; // string
$contact_id = 56; // int

try {
    $result = $apiInstance->chatsList($page, $per_page, $cursor, $limit, $status, $channel, $contact_id);
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
| **cursor** | **string**| v1.1+. Opaque cursor для постраничной выборки. Если передан — параметры &#x60;page&#x60;/&#x60;per_page&#x60; игнорируются. Получите следующий cursor из &#x60;meta.next_cursor&#x60; предыдущего ответа. &#x60;null&#x60;/отсутствие &#x60;next_cursor&#x60; &#x3D; последняя страница. | [optional] |
| **limit** | **int**| v1.1+. Размер cursor-страницы. Используется только в cursor-режиме (&#x60;?cursor&#x3D;...&#x60;); для классической page-пагинации применяется &#x60;per_page&#x60;. | [optional] [default to 50] |
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
chatsMessages($id, $page, $per_page, $cursor, $limit): \BotixPro\Sdk\Model\MessagesList200Response
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
$cursor = 'cursor_example'; // string | v1.1+. Opaque cursor для постраничной выборки. Если передан — параметры `page`/`per_page` игнорируются. Получите следующий cursor из `meta.next_cursor` предыдущего ответа. `null`/отсутствие `next_cursor` = последняя страница.
$limit = 50; // int | v1.1+. Размер cursor-страницы. Используется только в cursor-режиме (`?cursor=...`); для классической page-пагинации применяется `per_page`.

try {
    $result = $apiInstance->chatsMessages($id, $page, $per_page, $cursor, $limit);
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
| **cursor** | **string**| v1.1+. Opaque cursor для постраничной выборки. Если передан — параметры &#x60;page&#x60;/&#x60;per_page&#x60; игнорируются. Получите следующий cursor из &#x60;meta.next_cursor&#x60; предыдущего ответа. &#x60;null&#x60;/отсутствие &#x60;next_cursor&#x60; &#x3D; последняя страница. | [optional] |
| **limit** | **int**| v1.1+. Размер cursor-страницы. Используется только в cursor-режиме (&#x60;?cursor&#x3D;...&#x60;); для классической page-пагинации применяется &#x60;per_page&#x60;. | [optional] [default to 50] |

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
