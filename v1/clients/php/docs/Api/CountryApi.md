# DealMaker\CountryApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getCountryStates()**](CountryApi.md#getCountryStates) | **GET** /country/states | Returns a list of all valid countries and it states |


## `getCountryStates()`

```php
getCountryStates(): \DealMaker\Model\V1EntitiesCountries
```

Returns a list of all valid countries and it states

Get countries and states

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CountryApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getCountryStates();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CountryApi->getCountryStates: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\DealMaker\Model\V1EntitiesCountries**](../Model/V1EntitiesCountries.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
