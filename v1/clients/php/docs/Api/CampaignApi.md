# DealMaker\CampaignApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getTtwCampaign()**](CampaignApi.md#getTtwCampaign) | **GET** /ttw/campaigns/{id} | Gets a TTW campaign for a given company |
| [**getTtwCampaigns()**](CampaignApi.md#getTtwCampaigns) | **GET** /ttw/companies/{company_id}/campaigns | Gets a list TTW campaigns for a given company |
| [**getUserTtwReservation()**](CampaignApi.md#getUserTtwReservation) | **GET** /ttw/campaign/{id}/reservation/{reservation_id}/user_id | Gets User ID for a TTW reservation |


## `getTtwCampaign()`

```php
getTtwCampaign($id): \DealMaker\Model\V1EntitiesTtwCampaignResponse
```

Gets a TTW campaign for a given company

Gets a TTW campaign for a given company

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CampaignApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->getTtwCampaign($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->getTtwCampaign: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesTtwCampaignResponse**](../Model/V1EntitiesTtwCampaignResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTtwCampaigns()`

```php
getTtwCampaigns($company_id): \DealMaker\Model\V1EntitiesTtwCampaignList
```

Gets a list TTW campaigns for a given company

Gets a list TTW campaigns for a given company

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CampaignApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_id = 56; // int

try {
    $result = $apiInstance->getTtwCampaigns($company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->getTtwCampaigns: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesTtwCampaignList**](../Model/V1EntitiesTtwCampaignList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUserTtwReservation()`

```php
getUserTtwReservation($id, $reservation_id): \DealMaker\Model\V1EntitiesTtwReservationUserId
```

Gets User ID for a TTW reservation

Gets a TTW reservation

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CampaignApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$reservation_id = 56; // int

try {
    $result = $apiInstance->getUserTtwReservation($id, $reservation_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->getUserTtwReservation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **reservation_id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesTtwReservationUserId**](../Model/V1EntitiesTtwReservationUserId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
