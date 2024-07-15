# DealMaker\TtwCampaignsApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getTtwCampaignPage()**](TtwCampaignsApi.md#getTtwCampaignPage) | **GET** /ttw/campaigns/{id}/page | Get ttw campaign page |
| [**publishTtwCampaignPage()**](TtwCampaignsApi.md#publishTtwCampaignPage) | **PATCH** /ttw/campaigns/{id}/page/publish | Publish ttw campaign page |


## `getTtwCampaignPage()`

```php
getTtwCampaignPage($id): \DealMaker\Model\V1EntitiesPage
```

Get ttw campaign page

Get ttw campaign page

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\TtwCampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->getTtwCampaignPage($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TtwCampaignsApi->getTtwCampaignPage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesPage**](../Model/V1EntitiesPage.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `publishTtwCampaignPage()`

```php
publishTtwCampaignPage($id): \DealMaker\Model\V1EntitiesPage
```

Publish ttw campaign page

Publish ttw campaign page

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\TtwCampaignsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->publishTtwCampaignPage($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TtwCampaignsApi->publishTtwCampaignPage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesPage**](../Model/V1EntitiesPage.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
