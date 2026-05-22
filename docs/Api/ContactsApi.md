# BotixPro\Sdk\ContactsApi

Контакты (CRM-карточка клиента)

All URIs are relative to https://api.botix.pro, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**contactsAddTag()**](ContactsApi.md#contactsAddTag) | **POST** /public/v1/contacts/{id}/tags | Добавить тег контакту |
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
contactsList($page, $per_page, $tag, $channel, $lead_status, $since): \BotixPro\Sdk\Model\ContactsList200Response
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
$tag = 'tag_example'; // string | Фильтр по тегу (точное совпадение)
$channel = 'channel_example'; // string
$lead_status = 'lead_status_example'; // string
$since = new \DateTime('2013-10-20T19:20:30+01:00'); // \DateTime | Фильтр по created_at >= since

try {
    $result = $apiInstance->contactsList($page, $per_page, $tag, $channel, $lead_status, $since);
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
