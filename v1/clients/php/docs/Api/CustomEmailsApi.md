# DealMaker\CustomEmailsApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getAccessToken()**](CustomEmailsApi.md#getAccessToken) | **POST** /custom_emails/get_access_token | Generate authorization token information for initializing Beefree editor |


## `getAccessToken()`

```php
getAccessToken($get_access_token_request): \DealMaker\Model\V1EntitiesBeefreeAccessToken
```

Generate authorization token information for initializing Beefree editor

Generate authorization token information

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CustomEmailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$get_access_token_request = new \DealMaker\Model\GetAccessTokenRequest(); // \DealMaker\Model\GetAccessTokenRequest

try {
    $result = $apiInstance->getAccessToken($get_access_token_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomEmailsApi->getAccessToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **get_access_token_request** | [**\DealMaker\Model\GetAccessTokenRequest**](../Model/GetAccessTokenRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesBeefreeAccessToken**](../Model/V1EntitiesBeefreeAccessToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
