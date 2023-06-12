# DealMaker\DealApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAnalyticsDashboardInfo()**](DealApi.md#getAnalyticsDashboardInfo) | **GET** /deals/{id}/analytics_dashboard_info | Get Analytics Dashboard Info |
| [**getDeal()**](DealApi.md#getDeal) | **GET** /deals/{id} | Get deal by Deal ID |
| [**listDeals()**](DealApi.md#listDeals) | **GET** /deals | List available deals |


## `getAnalyticsDashboardInfo()`

```php
getAnalyticsDashboardInfo($id, $dashboard_key): object
```

Get Analytics Dashboard Info

Get Analytics Dashboard Info

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DealApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$dashboard_key = 'dashboard_key_example'; // string | The dashboard key.

try {
    $result = $apiInstance->getAnalyticsDashboardInfo($id, $dashboard_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealApi->getAnalyticsDashboardInfo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **dashboard_key** | **string**| The dashboard key. | [optional] |

### Return type

**object**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDeal()`

```php
getDeal($id): \DealMaker\Model\V1EntitiesDeal
```

Get deal by Deal ID

Gets a single deal using the Deal ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DealApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.

try {
    $result = $apiInstance->getDeal($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealApi->getDeal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |

### Return type

[**\DealMaker\Model\V1EntitiesDeal**](../Model/V1EntitiesDeal.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listDeals()`

```php
listDeals($page, $per_page, $offset): \DealMaker\Model\V1EntitiesDeals
```

List available deals

List available deals

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DealApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page offset to fetch.
$per_page = 25; // int | Number of results to return per page.
$offset = 0; // int | Pad a number of results.

try {
    $result = $apiInstance->listDeals($page, $per_page, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealApi->listDeals: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page offset to fetch. | [optional] [default to 1] |
| **per_page** | **int**| Number of results to return per page. | [optional] [default to 25] |
| **offset** | **int**| Pad a number of results. | [optional] [default to 0] |

### Return type

[**\DealMaker\Model\V1EntitiesDeals**](../Model/V1EntitiesDeals.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
