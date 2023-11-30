# DealMaker\IncentivePlanApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getDealIncentivePlansTime()**](IncentivePlanApi.md#getDealIncentivePlansTime) | **GET** /deals/{id}/incentive_plans/time | Get incentive plans by deal id |


## `getDealIncentivePlansTime()`

```php
getDealIncentivePlansTime($id, $page, $per_page, $offset): \DealMaker\Model\V1EntitiesDealsPriceDetails
```

Get incentive plans by deal id

Gets incentive plans with time tiers from the deal given deal id.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\IncentivePlanApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$page = 1; // int | Page offset to fetch.
$per_page = 25; // int | Number of results to return per page.
$offset = 0; // int | Pad a number of results.

try {
    $result = $apiInstance->getDealIncentivePlansTime($id, $page, $per_page, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling IncentivePlanApi->getDealIncentivePlansTime: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **page** | **int**| Page offset to fetch. | [optional] [default to 1] |
| **per_page** | **int**| Number of results to return per page. | [optional] [default to 25] |
| **offset** | **int**| Pad a number of results. | [optional] [default to 0] |

### Return type

[**\DealMaker\Model\V1EntitiesDealsPriceDetails**](../Model/V1EntitiesDealsPriceDetails.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
