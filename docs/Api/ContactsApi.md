# BotixPro\Sdk\ContactsApi

Контакты (CRM-карточка клиента)

All URIs are relative to https://api.botix.pro, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**contactsAddTag()**](ContactsApi.md#contactsAddTag) | **POST** /public/v1/contacts/{id}/tags | Добавить тег контакту |
| [**contactsBulkCreate()**](ContactsApi.md#contactsBulkCreate) | **POST** /public/v1/contacts/bulk-create | Массовое создание контактов (v1.1) |
| [**contactsBulkUpdate()**](ContactsApi.md#contactsBulkUpdate) | **POST** /public/v1/contacts/bulk-update | Массовое обновление контактов (v1.1) |
| [**contactsCreate()**](ContactsApi.md#contactsCreate) | **POST** /public/v1/contacts | Создать контакт |
| [**contactsDelete()**](ContactsApi.md#contactsDelete) | **DELETE** /public/v1/contacts/{id} | Удалить контакт (soft delete) |
| [**contactsGet()**](ContactsApi.md#contactsGet) | **GET** /public/v1/contacts/{id} | Карточка контакта |
| [**contactsList()**](ContactsApi.md#contactsList) | **GET** /public/v1/contacts | Список контактов |
| [**contactsRemoveTag()**](ContactsApi.md#contactsRemoveTag) | **DELETE** /public/v1/contacts/{id}/tags/{tag} | Снять тег с контакта |
| [**contactsUpdate()**](ContactsApi.md#contactsUpdate) | **PUT** /public/v1/contacts/{id} | Обновить контакт |


## `contactsAddTag()`

```php
contactsAddTag($id, $contacts_add_tag_request): \BotixPro\Sdk\Model\ContactsAddTag200Response
```

Добавить тег контакту

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\ContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$contacts_add_tag_request = new \BotixPro\Sdk\Model\ContactsAddTagRequest(); // \BotixPro\Sdk\Model\ContactsAddTagRequest

try {
    $result = $apiInstance->contactsAddTag($id, $contacts_add_tag_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->contactsAddTag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **contacts_add_tag_request** | [**\BotixPro\Sdk\Model\ContactsAddTagRequest**](../Model/ContactsAddTagRequest.md)|  | |

### Return type

[**\BotixPro\Sdk\Model\ContactsAddTag200Response**](../Model/ContactsAddTag200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `contactsBulkCreate()`

```php
contactsBulkCreate($contacts_bulk_create_request, $idempotency_key): \BotixPro\Sdk\Model\BulkResult
```

Массовое создание контактов (v1.1)

Создаёт до 100 контактов одним запросом. Каждый item — в своей мини-транзакции, частичный успех допустим (см. поля `created`/`failed`/`results`).  Bulk-операция в rate-limit считается как **1 запрос** (а не 100) — это сознательное послабление для поощрения bulk-вызовов.  Поддерживает `Idempotency-Key` (24ч).

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\ContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$contacts_bulk_create_request = new \BotixPro\Sdk\Model\ContactsBulkCreateRequest(); // \BotixPro\Sdk\Model\ContactsBulkCreateRequest
$idempotency_key = 'idempotency_key_example'; // string | Уникальный токен запроса для защиты от дублей при сетевых сбоях. Рекомендация — UUID v4 на каждую логическую операцию. **TTL ключа — 24 часа.** После истечения тот же `Idempotency-Key` создаст новую операцию, кешированный результат не возвращается. Повтор в окне 24 часов вернёт сохранённый ответ + заголовок `Idempotent-Replayed: 1`.

try {
    $result = $apiInstance->contactsBulkCreate($contacts_bulk_create_request, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->contactsBulkCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **contacts_bulk_create_request** | [**\BotixPro\Sdk\Model\ContactsBulkCreateRequest**](../Model/ContactsBulkCreateRequest.md)|  | |
| **idempotency_key** | **string**| Уникальный токен запроса для защиты от дублей при сетевых сбоях. Рекомендация — UUID v4 на каждую логическую операцию. **TTL ключа — 24 часа.** После истечения тот же &#x60;Idempotency-Key&#x60; создаст новую операцию, кешированный результат не возвращается. Повтор в окне 24 часов вернёт сохранённый ответ + заголовок &#x60;Idempotent-Replayed: 1&#x60;. | [optional] |

### Return type

[**\BotixPro\Sdk\Model\BulkResult**](../Model/BulkResult.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `contactsBulkUpdate()`

```php
contactsBulkUpdate($contacts_bulk_update_request, $idempotency_key): \BotixPro\Sdk\Model\BulkResult
```

Массовое обновление контактов (v1.1)

Обновляет до 100 контактов одним запросом. Каждый item — `{id, fields:{...}}`. Частичный успех допустим. Поддерживает `Idempotency-Key`.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\ContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$contacts_bulk_update_request = new \BotixPro\Sdk\Model\ContactsBulkUpdateRequest(); // \BotixPro\Sdk\Model\ContactsBulkUpdateRequest
$idempotency_key = 'idempotency_key_example'; // string | Уникальный токен запроса для защиты от дублей при сетевых сбоях. Рекомендация — UUID v4 на каждую логическую операцию. **TTL ключа — 24 часа.** После истечения тот же `Idempotency-Key` создаст новую операцию, кешированный результат не возвращается. Повтор в окне 24 часов вернёт сохранённый ответ + заголовок `Idempotent-Replayed: 1`.

try {
    $result = $apiInstance->contactsBulkUpdate($contacts_bulk_update_request, $idempotency_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->contactsBulkUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **contacts_bulk_update_request** | [**\BotixPro\Sdk\Model\ContactsBulkUpdateRequest**](../Model/ContactsBulkUpdateRequest.md)|  | |
| **idempotency_key** | **string**| Уникальный токен запроса для защиты от дублей при сетевых сбоях. Рекомендация — UUID v4 на каждую логическую операцию. **TTL ключа — 24 часа.** После истечения тот же &#x60;Idempotency-Key&#x60; создаст новую операцию, кешированный результат не возвращается. Повтор в окне 24 часов вернёт сохранённый ответ + заголовок &#x60;Idempotent-Replayed: 1&#x60;. | [optional] |

### Return type

[**\BotixPro\Sdk\Model\BulkResult**](../Model/BulkResult.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `contactsCreate()`

```php
contactsCreate($contact_writable): \BotixPro\Sdk\Model\SuccessContact
```

Создать контакт

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\ContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$contact_writable = new \BotixPro\Sdk\Model\ContactWritable(); // \BotixPro\Sdk\Model\ContactWritable

try {
    $result = $apiInstance->contactsCreate($contact_writable);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->contactsCreate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **contact_writable** | [**\BotixPro\Sdk\Model\ContactWritable**](../Model/ContactWritable.md)|  | |

### Return type

[**\BotixPro\Sdk\Model\SuccessContact**](../Model/SuccessContact.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `contactsDelete()`

```php
contactsDelete($id)
```

Удалить контакт (soft delete)

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\ContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $apiInstance->contactsDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->contactsDelete: ', $e->getMessage(), PHP_EOL;
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

## `contactsGet()`

```php
contactsGet($id): \BotixPro\Sdk\Model\SuccessContact
```

Карточка контакта

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\ContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->contactsGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->contactsGet: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\BotixPro\Sdk\Model\SuccessContact**](../Model/SuccessContact.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `contactsList()`

```php
contactsList($page, $per_page, $cursor, $limit, $tag, $channel, $lead_status, $since): \BotixPro\Sdk\Model\ContactsList200Response
```

Список контактов

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\ContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int
$per_page = 50; // int
$cursor = 'cursor_example'; // string | v1.1+. Opaque cursor для постраничной выборки. Если передан — параметры `page`/`per_page` игнорируются. Получите следующий cursor из `meta.next_cursor` предыдущего ответа. `null`/отсутствие `next_cursor` = последняя страница.
$limit = 50; // int | v1.1+. Размер cursor-страницы. Используется только в cursor-режиме (`?cursor=...`); для классической page-пагинации применяется `per_page`.
$tag = 'tag_example'; // string | Фильтр по тегу (точное совпадение)
$channel = 'channel_example'; // string
$lead_status = 'lead_status_example'; // string
$since = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Фильтр по created_at >= since

try {
    $result = $apiInstance->contactsList($page, $per_page, $cursor, $limit, $tag, $channel, $lead_status, $since);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->contactsList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**|  | [optional] [default to 1] |
| **per_page** | **int**|  | [optional] [default to 50] |
| **cursor** | **string**| v1.1+. Opaque cursor для постраничной выборки. Если передан — параметры &#x60;page&#x60;/&#x60;per_page&#x60; игнорируются. Получите следующий cursor из &#x60;meta.next_cursor&#x60; предыдущего ответа. &#x60;null&#x60;/отсутствие &#x60;next_cursor&#x60; &#x3D; последняя страница. | [optional] |
| **limit** | **int**| v1.1+. Размер cursor-страницы. Используется только в cursor-режиме (&#x60;?cursor&#x3D;...&#x60;); для классической page-пагинации применяется &#x60;per_page&#x60;. | [optional] [default to 50] |
| **tag** | **string**| Фильтр по тегу (точное совпадение) | [optional] |
| **channel** | **string**|  | [optional] |
| **lead_status** | **string**|  | [optional] |
| **since** | **\DateTime**| Фильтр по created_at &gt;&#x3D; since | [optional] |

### Return type

[**\BotixPro\Sdk\Model\ContactsList200Response**](../Model/ContactsList200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `contactsRemoveTag()`

```php
contactsRemoveTag($id, $tag): \BotixPro\Sdk\Model\ContactsRemoveTag200Response
```

Снять тег с контакта

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\ContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$tag = 'tag_example'; // string

try {
    $result = $apiInstance->contactsRemoveTag($id, $tag);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->contactsRemoveTag: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **tag** | **string**|  | |

### Return type

[**\BotixPro\Sdk\Model\ContactsRemoveTag200Response**](../Model/ContactsRemoveTag200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `contactsUpdate()`

```php
contactsUpdate($id, $contact_writable): \BotixPro\Sdk\Model\SuccessContact
```

Обновить контакт

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer (btx_live_<40-char-alnum>) authorization: bearerAuth
$config = BotixPro\Sdk\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new BotixPro\Sdk\Api\ContactsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$contact_writable = new \BotixPro\Sdk\Model\ContactWritable(); // \BotixPro\Sdk\Model\ContactWritable

try {
    $result = $apiInstance->contactsUpdate($id, $contact_writable);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->contactsUpdate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **contact_writable** | [**\BotixPro\Sdk\Model\ContactWritable**](../Model/ContactWritable.md)|  | |

### Return type

[**\BotixPro\Sdk\Model\SuccessContact**](../Model/SuccessContact.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
