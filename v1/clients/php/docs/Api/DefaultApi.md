# DealMaker\DefaultApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getWebhooks()**](DefaultApi.md#getWebhooks) | **GET** /webhooks | Returns a list of webhook subscription which is associated to the user |
| [**getWebhooksDealId()**](DefaultApi.md#getWebhooksDealId) | **GET** /webhooks/deal/{id} | Finds a deal using the id |
| [**getWebhooksDealsSearch()**](DefaultApi.md#getWebhooksDealsSearch) | **GET** /webhooks/deals/search | Searches for deals for a given user |
| [**getWebhooksSecurityToken()**](DefaultApi.md#getWebhooksSecurityToken) | **GET** /webhooks/security_token | Creates a new security token for webhook subscription |
| [**postWebhooks()**](DefaultApi.md#postWebhooks) | **POST** /webhooks | Creates a webhook subscription which is associated to the user |
| [**putWebhooksId()**](DefaultApi.md#putWebhooksId) | **PUT** /webhooks/{id} | Updates webhook subscription and webhooks subcription deals |


## `getWebhooks()`

```php
getWebhooks($page, $per_page, $offset): \DealMaker\Model\V1EntitiesWebhooksSubscription
```

Returns a list of webhook subscription which is associated to the user

Returns a list of webhook subscription

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page offset to fetch.
$per_page = 25; // int | Number of results to return per page.
$offset = 0; // int | Pad a number of results.

try {
    $result = $apiInstance->getWebhooks($page, $per_page, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getWebhooks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page offset to fetch. | [optional] [default to 1] |
| **per_page** | **int**| Number of results to return per page. | [optional] [default to 25] |
| **offset** | **int**| Pad a number of results. | [optional] [default to 0] |

### Return type

[**\DealMaker\Model\V1EntitiesWebhooksSubscription**](../Model/V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebhooksDealId()`

```php
getWebhooksDealId($id): \DealMaker\Model\V1EntitiesWebhooksDeal
```

Finds a deal using the id

Returns a deal

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->getWebhooksDealId($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getWebhooksDealId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesWebhooksDeal**](../Model/V1EntitiesWebhooksDeal.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebhooksDealsSearch()`

```php
getWebhooksDealsSearch(): \DealMaker\Model\V1EntitiesWebhooksSecurityToken
```

Searches for deals for a given user

Searches for deals for a given user

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getWebhooksDealsSearch();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getWebhooksDealsSearch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\DealMaker\Model\V1EntitiesWebhooksSecurityToken**](../Model/V1EntitiesWebhooksSecurityToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebhooksSecurityToken()`

```php
getWebhooksSecurityToken(): \DealMaker\Model\V1EntitiesWebhooksSecurityToken
```

Creates a new security token for webhook subscription

Creates a new security token for webhook subscription

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getWebhooksSecurityToken();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getWebhooksSecurityToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\DealMaker\Model\V1EntitiesWebhooksSecurityToken**](../Model/V1EntitiesWebhooksSecurityToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postWebhooks()`

```php
postWebhooks($post_webhooks_request): \DealMaker\Model\V1EntitiesWebhooksSubscription
```

Creates a webhook subscription which is associated to the user

Creates new webhook subscription

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$post_webhooks_request = new \DealMaker\Model\PostWebhooksRequest(); // \DealMaker\Model\PostWebhooksRequest

try {
    $result = $apiInstance->postWebhooks($post_webhooks_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->postWebhooks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **post_webhooks_request** | [**\DealMaker\Model\PostWebhooksRequest**](../Model/PostWebhooksRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesWebhooksSubscription**](../Model/V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putWebhooksId()`

```php
putWebhooksId($id, $put_webhooks_id_request): \DealMaker\Model\V1EntitiesWebhooksSubscription
```

Updates webhook subscription and webhooks subcription deals

Updates webhook subscription

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$put_webhooks_id_request = new \DealMaker\Model\PutWebhooksIdRequest(); // \DealMaker\Model\PutWebhooksIdRequest

try {
    $result = $apiInstance->putWebhooksId($id, $put_webhooks_id_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->putWebhooksId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **put_webhooks_id_request** | [**\DealMaker\Model\PutWebhooksIdRequest**](../Model/PutWebhooksIdRequest.md)|  | [optional] |

### Return type

[**\DealMaker\Model\V1EntitiesWebhooksSubscription**](../Model/V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
