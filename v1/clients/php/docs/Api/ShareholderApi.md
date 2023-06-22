# DealMaker\ShareholderApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getShareholders()**](ShareholderApi.md#getShareholders) | **GET** /companies/{id}/shareholders | Get a company shareholders list |
| [**getShareholdersTags()**](ShareholderApi.md#getShareholdersTags) | **GET** /companies/{id}/shareholders/tags | Get a company shareholders list grouped by tags |


## `getShareholders()`

```php
getShareholders($id): \DealMaker\Model\V1EntitiesShareholders
```

Get a company shareholders list

Gets a list of company shareholders.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\ShareholderApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The company id.

try {
    $result = $apiInstance->getShareholders($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShareholderApi->getShareholders: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The company id. | |

### Return type

[**\DealMaker\Model\V1EntitiesShareholders**](../Model/V1EntitiesShareholders.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getShareholdersTags()`

```php
getShareholdersTags($id): \DealMaker\Model\V1EntitiesShareholdersTags
```

Get a company shareholders list grouped by tags

Gets a list of company shareholders grouped by tags.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\ShareholderApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The company id.

try {
    $result = $apiInstance->getShareholdersTags($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ShareholderApi->getShareholdersTags: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The company id. | |

### Return type

[**\DealMaker\Model\V1EntitiesShareholdersTags**](../Model/V1EntitiesShareholdersTags.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
