# DealMaker\DealSetupApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createDealSetup()**](DealSetupApi.md#createDealSetup) | **POST** /deal_setups | Create deal setup |


## `createDealSetup()`

```php
createDealSetup($create_deal_setup_request): \DealMaker\Model\V1EntitiesDealSetup
```

Create deal setup

Create deal setup

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DealSetupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_deal_setup_request = new \DealMaker\Model\CreateDealSetupRequest(); // \DealMaker\Model\CreateDealSetupRequest

try {
    $result = $apiInstance->createDealSetup($create_deal_setup_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealSetupApi->createDealSetup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_deal_setup_request** | [**\DealMaker\Model\CreateDealSetupRequest**](../Model/CreateDealSetupRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesDealSetup**](../Model/V1EntitiesDealSetup.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
