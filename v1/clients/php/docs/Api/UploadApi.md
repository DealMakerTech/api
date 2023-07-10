# DealMaker\UploadApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**generateUrl()**](UploadApi.md#generateUrl) | **POST** /uploads/generate_url | Create a presigned URL for Amazon S3 |


## `generateUrl()`

```php
generateUrl($generate_url_request)
```

Create a presigned URL for Amazon S3

Create a presigned URL for Amazon S3

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\UploadApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$generate_url_request = new \DealMaker\Model\GenerateUrlRequest(); // \DealMaker\Model\GenerateUrlRequest

try {
    $apiInstance->generateUrl($generate_url_request);
} catch (Exception $e) {
    echo 'Exception when calling UploadApi->generateUrl: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **generate_url_request** | [**\DealMaker\Model\GenerateUrlRequest**](../Model/GenerateUrlRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
