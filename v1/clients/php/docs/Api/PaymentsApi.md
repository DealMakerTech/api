# DealMaker\PaymentsApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**postDealInvestorPaymentsIra()**](PaymentsApi.md#postDealInvestorPaymentsIra) | **POST** /deals/{id}/investors/{investor_id}/payments/ira | Creates a payment intent for express wire and mail its instructions. |


## `postDealInvestorPaymentsIra()`

```php
postDealInvestorPaymentsIra($id, $investor_id)
```

Creates a payment intent for express wire and mail its instructions.

Creates a payment intent for express wire

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\PaymentsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$investor_id = 56; // int | The investor id.

try {
    $apiInstance->postDealInvestorPaymentsIra($id, $investor_id);
} catch (Exception $e) {
    echo 'Exception when calling PaymentsApi->postDealInvestorPaymentsIra: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **investor_id** | **int**| The investor id. | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
