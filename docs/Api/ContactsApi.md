# BotixPro\Sdk\ContactsApi

Contacts (CRM-карточка клиента)

All URIs are relative to https://api.botix.pro, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**publicV1ContactsGet()**](ContactsApi.md#publicV1ContactsGet) | **GET** /public/v1/contacts | Список контактов |
| [**publicV1ContactsIdDelete()**](ContactsApi.md#publicV1ContactsIdDelete) | **DELETE** /public/v1/contacts/{id} | Удалить контакт (soft delete) |
| [**publicV1ContactsIdGet()**](ContactsApi.md#publicV1ContactsIdGet) | **GET** /public/v1/contacts/{id} | Карточка контакта |
| [**publicV1ContactsIdPut()**](ContactsApi.md#publicV1ContactsIdPut) | **PUT** /public/v1/contacts/{id} | Обновить контакт |
| [**publicV1ContactsIdTagsPost()**](ContactsApi.md#publicV1ContactsIdTagsPost) | **POST** /public/v1/contacts/{id}/tags | Добавить тег контакту |
| [**publicV1ContactsIdTagsTagDelete()**](ContactsApi.md#publicV1ContactsIdTagsTagDelete) | **DELETE** /public/v1/contacts/{id}/tags/{tag} | Снять тег с контакта |
| [**publicV1ContactsPost()**](ContactsApi.md#publicV1ContactsPost) | **POST** /public/v1/contacts | Создать контакт |


## `publicV1ContactsGet()`

```php
publicV1ContactsGet($page, $per_page, $tag, $channel, $lead_status, $since): \BotixPro\Sdk\Model\PublicV1ContactsGet200Response
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
    $result = $apiInstance->publicV1ContactsGet($page, $per_page, $tag, $channel, $lead_status, $since);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->publicV1ContactsGet: ', $e->getMessage(), PHP_EOL;
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

[**\BotixPro\Sdk\Model\PublicV1ContactsGet200Response**](../Model/PublicV1ContactsGet200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `publicV1ContactsIdDelete()`

```php
publicV1ContactsIdDelete($id)
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
    $apiInstance->publicV1ContactsIdDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->publicV1ContactsIdDelete: ', $e->getMessage(), PHP_EOL;
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

## `publicV1ContactsIdGet()`

```php
publicV1ContactsIdGet($id): \BotixPro\Sdk\Model\SuccessContact
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
    $result = $apiInstance->publicV1ContactsIdGet($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->publicV1ContactsIdGet: ', $e->getMessage(), PHP_EOL;
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

## `publicV1ContactsIdPut()`

```php
publicV1ContactsIdPut($id, $contact_writable): \BotixPro\Sdk\Model\SuccessContact
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
    $result = $apiInstance->publicV1ContactsIdPut($id, $contact_writable);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->publicV1ContactsIdPut: ', $e->getMessage(), PHP_EOL;
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

## `publicV1ContactsIdTagsPost()`

```php
publicV1ContactsIdTagsPost($id, $public_v1_contacts_id_tags_post_request): \BotixPro\Sdk\Model\PublicV1ContactsIdTagsPost200Response
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
$public_v1_contacts_id_tags_post_request = new \BotixPro\Sdk\Model\PublicV1ContactsIdTagsPostRequest(); // \BotixPro\Sdk\Model\PublicV1ContactsIdTagsPostRequest

try {
    $result = $apiInstance->publicV1ContactsIdTagsPost($id, $public_v1_contacts_id_tags_post_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->publicV1ContactsIdTagsPost: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **public_v1_contacts_id_tags_post_request** | [**\BotixPro\Sdk\Model\PublicV1ContactsIdTagsPostRequest**](../Model/PublicV1ContactsIdTagsPostRequest.md)|  | |

### Return type

[**\BotixPro\Sdk\Model\PublicV1ContactsIdTagsPost200Response**](../Model/PublicV1ContactsIdTagsPost200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `publicV1ContactsIdTagsTagDelete()`

```php
publicV1ContactsIdTagsTagDelete($id, $tag): \BotixPro\Sdk\Model\PublicV1ContactsIdTagsTagDelete200Response
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
    $result = $apiInstance->publicV1ContactsIdTagsTagDelete($id, $tag);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->publicV1ContactsIdTagsTagDelete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **tag** | **string**|  | |

### Return type

[**\BotixPro\Sdk\Model\PublicV1ContactsIdTagsTagDelete200Response**](../Model/PublicV1ContactsIdTagsTagDelete200Response.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `publicV1ContactsPost()`

```php
publicV1ContactsPost($contact_writable): \BotixPro\Sdk\Model\SuccessContact
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
    $result = $apiInstance->publicV1ContactsPost($contact_writable);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ContactsApi->publicV1ContactsPost: ', $e->getMessage(), PHP_EOL;
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
