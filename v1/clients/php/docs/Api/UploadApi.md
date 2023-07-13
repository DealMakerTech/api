# DealMaker\UploadApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**generateUrl()**](UploadApi.md#generateUrl) | **POST** /uploads/generate_url | Create a presigned URL for Amazon S3 |


## `generateUrl()`

```php
generateUrl($generate_url_request): \DealMaker\Model\V1EntitiesPresignedUrlResult
```

Create a presigned URL for Amazon S3

Create a presigned URL for uploading file to Amazon S3 bucket

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
    $result = $apiInstance->generateUrl($generate_url_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UploadApi->generateUrl: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **generate_url_request** | [**\DealMaker\Model\GenerateUrlRequest**](../Model/GenerateUrlRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesPresignedUrlResult**](../Model/V1EntitiesPresignedUrlResult.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
