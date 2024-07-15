# DealMaker\DealApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**achBankAccountSetupIntent()**](DealApi.md#achBankAccountSetupIntent) | **GET** /deals/{id}/investor/{investor_id}/subscription/{subscription_id}/payments/ach/bank_account_setup_intent | Prepares an investor for payment |
| [**acssBankAccountSetupIntent()**](DealApi.md#acssBankAccountSetupIntent) | **GET** /deals/{id}/investor/{investor_id}/subscription/{subscription_id}/payments/acss/bank_account_setup_intent | Prepares an investor for payment |
| [**createDealSetup()**](DealApi.md#createDealSetup) | **POST** /deal_setups | Create deal setup |
| [**getDeal()**](DealApi.md#getDeal) | **GET** /deals/{id} | Get deal by Deal ID |
| [**getDealIncentivePlan()**](DealApi.md#getDealIncentivePlan) | **GET** /deals/{id}/incentive_plan | Get incentive plan by deal id |
| [**getPlatformEmailPage()**](DealApi.md#getPlatformEmailPage) | **GET** /deals/{id}/platform_emails/{platform_email_id}/page | Get the Page for a given Platform Email |
| [**listDeals()**](DealApi.md#listDeals) | **GET** /deals | List available deals |
| [**listPlatformEmails()**](DealApi.md#listPlatformEmails) | **GET** /deals/{id}/platform_emails | Get a list of platform emails for the deal |
| [**patchPlatformEmail()**](DealApi.md#patchPlatformEmail) | **PATCH** /deals/{id}/platform_emails/{kind}/update | Patch platform email by kind and deal. |


## `achBankAccountSetupIntent()`

```php
achBankAccountSetupIntent($id, $investor_id, $subscription_id): \DealMaker\Model\V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent
```

Prepares an investor for payment

Prepare investor for payment

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DealApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The deal id
$investor_id = 56; // int | The investor id
$subscription_id = 56; // int | The subscription id

try {
    $result = $apiInstance->achBankAccountSetupIntent($id, $investor_id, $subscription_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealApi->achBankAccountSetupIntent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The deal id | |
| **investor_id** | **int**| The investor id | |
| **subscription_id** | **int**| The subscription id | |

### Return type

[**\DealMaker\Model\V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent**](../Model/V1EntitiesDealsInvestorsPaymentAchBankAccountSetupIntent.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `acssBankAccountSetupIntent()`

```php
acssBankAccountSetupIntent($id, $investor_id, $subscription_id): \DealMaker\Model\V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent
```

Prepares an investor for payment

Prepare investor for payment

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DealApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The deal id
$investor_id = 56; // int | The investor id
$subscription_id = 56; // int | The subscription id

try {
    $result = $apiInstance->acssBankAccountSetupIntent($id, $investor_id, $subscription_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealApi->acssBankAccountSetupIntent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The deal id | |
| **investor_id** | **int**| The investor id | |
| **subscription_id** | **int**| The subscription id | |

### Return type

[**\DealMaker\Model\V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent**](../Model/V1EntitiesDealsInvestorsPaymentAcssBankAccountSetupIntent.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

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



$apiInstance = new DealMaker\Api\DealApi(
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
    echo 'Exception when calling DealApi->createDealSetup: ', $e->getMessage(), PHP_EOL;
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

## `getDeal()`

```php
getDeal($id): \DealMaker\Model\V1EntitiesDeal
```

Get deal by Deal ID

Gets a single deal using the Deal ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DealApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.

try {
    $result = $apiInstance->getDeal($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealApi->getDeal: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |

### Return type

[**\DealMaker\Model\V1EntitiesDeal**](../Model/V1EntitiesDeal.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDealIncentivePlan()`

```php
getDealIncentivePlan($id, $investment_amount): \DealMaker\Model\V1EntitiesDealsPriceDetails
```

Get incentive plan by deal id

Gets the current active incentive plan for the given deal id.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DealApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 56; // int | The deal id.
$investment_amount = 3.4; // float | The investment amount to get the security price for.

try {
    $result = $apiInstance->getDealIncentivePlan($id, $investment_amount);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealApi->getDealIncentivePlan: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **investment_amount** | **float**| The investment amount to get the security price for. | [optional] |

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

## `getPlatformEmailPage()`

```php
getPlatformEmailPage($id, $platform_email_id): \DealMaker\Model\V1EntitiesPage
```

Get the Page for a given Platform Email

Get the Page for a given Platform Email

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DealApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$platform_email_id = 56; // int | The platform email id.

try {
    $result = $apiInstance->getPlatformEmailPage($id, $platform_email_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealApi->getPlatformEmailPage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **platform_email_id** | **int**| The platform email id. | |

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

## `listDeals()`

```php
listDeals($page, $per_page, $offset): \DealMaker\Model\V1EntitiesDeals
```

List available deals

List available deals

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DealApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page offset to fetch.
$per_page = 25; // int | Number of results to return per page.
$offset = 0; // int | Pad a number of results.

try {
    $result = $apiInstance->listDeals($page, $per_page, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealApi->listDeals: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page offset to fetch. | [optional] [default to 1] |
| **per_page** | **int**| Number of results to return per page. | [optional] [default to 25] |
| **offset** | **int**| Pad a number of results. | [optional] [default to 0] |

### Return type

[**\DealMaker\Model\V1EntitiesDeals**](../Model/V1EntitiesDeals.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPlatformEmails()`

```php
listPlatformEmails($id): \DealMaker\Model\V1EntitiesDealsPlatformEmails
```

Get a list of platform emails for the deal

Get a list of platform emails for the deal

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DealApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.

try {
    $result = $apiInstance->listPlatformEmails($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealApi->listPlatformEmails: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |

### Return type

[**\DealMaker\Model\V1EntitiesDealsPlatformEmails**](../Model/V1EntitiesDealsPlatformEmails.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchPlatformEmail()`

```php
patchPlatformEmail($id, $kind, $patch_platform_email_request): \DealMaker\Model\V1EntitiesDealsPlatformEmail
```

Patch platform email by kind and deal.

Patch platform email by kind and deal.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DealApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$kind = 56; // int
$patch_platform_email_request = new \DealMaker\Model\PatchPlatformEmailRequest(); // \DealMaker\Model\PatchPlatformEmailRequest

try {
    $result = $apiInstance->patchPlatformEmail($id, $kind, $patch_platform_email_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DealApi->patchPlatformEmail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **kind** | **int**|  | |
| **patch_platform_email_request** | [**\DealMaker\Model\PatchPlatformEmailRequest**](../Model/PatchPlatformEmailRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesDealsPlatformEmail**](../Model/V1EntitiesDealsPlatformEmail.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
