# DealMaker\DealsApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**postDealsIdEmailCampaignEmailCampaignIdSendEmail()**](DealsApi.md#postDealsIdEmailCampaignEmailCampaignIdSendEmail) | **POST** /deals/{id}/email_campaign/{email_campaign_id}/send_email | Send emails to all the investors invited to the material change campaign |
| [**putDealsIdScriptTagEnvironment()**](DealsApi.md#putDealsIdScriptTagEnvironment) | **PUT** /deals/{id}/script_tag_environment | Update script tag environment for the deal. |


## `postDealsIdEmailCampaignEmailCampaignIdSendEmail()`

```php
postDealsIdEmailCampaignEmailCampaignIdSendEmail($id, $email_campaign_id)
```

Send emails to all the investors invited to the material change campaign

Send material campaign emails

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DealsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$email_campaign_id = 56; // int | The email campaign id.

try {
    $apiInstance->postDealsIdEmailCampaignEmailCampaignIdSendEmail($id, $email_campaign_id);
} catch (Exception $e) {
    echo 'Exception when calling DealsApi->postDealsIdEmailCampaignEmailCampaignIdSendEmail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **email_campaign_id** | **int**| The email campaign id. | |

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

## `putDealsIdScriptTagEnvironment()`

```php
putDealsIdScriptTagEnvironment($id, $put_deals_id_script_tag_environment_request)
```

Update script tag environment for the deal.

Update script tag environment for the deal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DealsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$put_deals_id_script_tag_environment_request = new \DealMaker\Model\PutDealsIdScriptTagEnvironmentRequest(); // \DealMaker\Model\PutDealsIdScriptTagEnvironmentRequest

try {
    $apiInstance->putDealsIdScriptTagEnvironment($id, $put_deals_id_script_tag_environment_request);
} catch (Exception $e) {
    echo 'Exception when calling DealsApi->putDealsIdScriptTagEnvironment: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **put_deals_id_script_tag_environment_request** | [**\DealMaker\Model\PutDealsIdScriptTagEnvironmentRequest**](../Model/PutDealsIdScriptTagEnvironmentRequest.md)|  | |

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
