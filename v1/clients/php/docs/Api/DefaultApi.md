# DealMaker\DefaultApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData()**](DefaultApi.md#getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData) | **GET** /deals/{deal_id}/payment_onboarding/questionnaire/digital_payments_connection/data | Load data for the digital payments connection stage |
| [**getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData()**](DefaultApi.md#getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData) | **GET** /deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/data | Get payout account data |
| [**getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions()**](DefaultApi.md#getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions) | **GET** /deals/{id}/investors/{investor_id}/payments/express_wire/instructions | Displays the express wire instructions for an investor on a deal |
| [**getDealsIdInvestorsPaymentsExpressWireInstructions()**](DefaultApi.md#getDealsIdInvestorsPaymentsExpressWireInstructions) | **GET** /deals/{id}/investors/payments/express_wire/instructions | Displays the express wire instructions for all the investors on a deal |
| [**getDealsIdPlatformEmailsDomain()**](DefaultApi.md#getDealsIdPlatformEmailsDomain) | **GET** /deals/{id}/platform_emails/domain | Get the email domain settings for the deal |
| [**getDealsIdProgressPage()**](DefaultApi.md#getDealsIdProgressPage) | **GET** /deals/{id}/progress_page | Get deal progress |
| [**getDealsIdProgressPageSummary()**](DefaultApi.md#getDealsIdProgressPageSummary) | **GET** /deals/{id}/progress_page/summary | Get the deal progress summary |
| [**getDealsIdSummary()**](DefaultApi.md#getDealsIdSummary) | **GET** /deals/{id}/summary | Get Deal Overview |
| [**getDealsPaymentOnboardingQuestionnaireInitialQuestions()**](DefaultApi.md#getDealsPaymentOnboardingQuestionnaireInitialQuestions) | **GET** /deals/payment_onboarding/questionnaire/initial_questions | Get initial questions |
| [**getWebhooks()**](DefaultApi.md#getWebhooks) | **GET** /webhooks | Returns a list of webhook subscription which is associated to the user |
| [**getWebhooksDealId()**](DefaultApi.md#getWebhooksDealId) | **GET** /webhooks/deal/{id} | Finds a deal using the id |
| [**getWebhooksDealsSearch()**](DefaultApi.md#getWebhooksDealsSearch) | **GET** /webhooks/deals/search | Searches for deals for a given user |
| [**getWebhooksSecurityToken()**](DefaultApi.md#getWebhooksSecurityToken) | **GET** /webhooks/security_token | Creates a new security token for webhook subscription |
| [**patchDealsIdPlatformEmailsDomain()**](DefaultApi.md#patchDealsIdPlatformEmailsDomain) | **PATCH** /deals/{id}/platform_emails/domain | Update the email domain settings for the deal |
| [**postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit()**](DefaultApi.md#postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/submit | Submit a payout account details form |
| [**postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit()**](DefaultApi.md#postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/response/submit | Submit a qualification questionnaire response |
| [**postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit()**](DefaultApi.md#postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/submit | Submit a qualification questionnaire form |
| [**postInvestorsInvestorIdDeleteInvestmentProcess()**](DefaultApi.md#postInvestorsInvestorIdDeleteInvestmentProcess) | **POST** /investors/{investor_id}/delete_investment/process | Delete investment |
| [**postInvestorsInvestorIdTransactionsRequestRefundProcess()**](DefaultApi.md#postInvestorsInvestorIdTransactionsRequestRefundProcess) | **POST** /investors/{investor_id}/transactions/request_refund/process | Request refund for investor transactions |
| [**postWebhooks()**](DefaultApi.md#postWebhooks) | **POST** /webhooks | Creates a webhook subscription which is associated to the user |
| [**putWebhooksId()**](DefaultApi.md#putWebhooksId) | **PUT** /webhooks/{id} | Updates webhook subscription and webhooks subcription deals |


## `getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData()`

```php
getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData($deal_id): \DealMaker\Model\V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData
```

Load data for the digital payments connection stage

Load data for the digital payments connection stage

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$deal_id = 56; // int

try {
    $result = $apiInstance->getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData($deal_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getDealsDealIdPaymentOnboardingQuestionnaireDigitalPaymentsConnectionData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **deal_id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData**](../Model/V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData()`

```php
getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData($deal_id): \DealMaker\Model\V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData
```

Get payout account data

Get payout account data

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$deal_id = 56; // int

try {
    $result = $apiInstance->getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData($deal_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsData: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **deal_id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData**](../Model/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsData.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions()`

```php
getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions($id, $investor_id): \DealMaker\Model\V1EntitiesExpressWireInstruction
```

Displays the express wire instructions for an investor on a deal

Get express wire instructions

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$investor_id = 56; // int

try {
    $result = $apiInstance->getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions($id, $investor_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getDealsIdInvestorsInvestorIdPaymentsExpressWireInstructions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **investor_id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesExpressWireInstruction**](../Model/V1EntitiesExpressWireInstruction.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDealsIdInvestorsPaymentsExpressWireInstructions()`

```php
getDealsIdInvestorsPaymentsExpressWireInstructions($id): \DealMaker\Model\V1EntitiesExpressWireInstructions
```

Displays the express wire instructions for all the investors on a deal

Get list of express wire instructions

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->getDealsIdInvestorsPaymentsExpressWireInstructions($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getDealsIdInvestorsPaymentsExpressWireInstructions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesExpressWireInstructions**](../Model/V1EntitiesExpressWireInstructions.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDealsIdPlatformEmailsDomain()`

```php
getDealsIdPlatformEmailsDomain($id): \DealMaker\Model\V1EntitiesDealsPlatformEmailsDomainSettings
```

Get the email domain settings for the deal

Get the email domain settings for the deal

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.

try {
    $result = $apiInstance->getDealsIdPlatformEmailsDomain($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getDealsIdPlatformEmailsDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |

### Return type

[**\DealMaker\Model\V1EntitiesDealsPlatformEmailsDomainSettings**](../Model/V1EntitiesDealsPlatformEmailsDomainSettings.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDealsIdProgressPage()`

```php
getDealsIdProgressPage($id): \DealMaker\Model\V1EntitiesDealsProgress
```

Get deal progress

Get deal progress

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.

try {
    $result = $apiInstance->getDealsIdProgressPage($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getDealsIdProgressPage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |

### Return type

[**\DealMaker\Model\V1EntitiesDealsProgress**](../Model/V1EntitiesDealsProgress.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDealsIdProgressPageSummary()`

```php
getDealsIdProgressPageSummary($id): \DealMaker\Model\V1EntitiesDealsProgressPageSummary
```

Get the deal progress summary

Get the deal progress summary

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.

try {
    $result = $apiInstance->getDealsIdProgressPageSummary($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getDealsIdProgressPageSummary: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |

### Return type

[**\DealMaker\Model\V1EntitiesDealsProgressPageSummary**](../Model/V1EntitiesDealsProgressPageSummary.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDealsIdSummary()`

```php
getDealsIdSummary($id)
```

Get Deal Overview

Get Deal Overview

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $apiInstance->getDealsIdSummary($id);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getDealsIdSummary: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

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

## `getDealsPaymentOnboardingQuestionnaireInitialQuestions()`

```php
getDealsPaymentOnboardingQuestionnaireInitialQuestions()
```

Get initial questions

Get initial questions

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $apiInstance->getDealsPaymentOnboardingQuestionnaireInitialQuestions();
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getDealsPaymentOnboardingQuestionnaireInitialQuestions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

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

## `getWebhooks()`

```php
getWebhooks($page, $per_page, $offset): \DealMaker\Model\V1EntitiesWebhooksSubscription
```

Returns a list of webhook subscription which is associated to the user

Returns a list of webhook subscription

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page offset to fetch.
$per_page = 25; // int | Number of results to return per page.
$offset = 0; // int | Pad a number of results.

try {
    $result = $apiInstance->getWebhooks($page, $per_page, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getWebhooks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page offset to fetch. | [optional] [default to 1] |
| **per_page** | **int**| Number of results to return per page. | [optional] [default to 25] |
| **offset** | **int**| Pad a number of results. | [optional] [default to 0] |

### Return type

[**\DealMaker\Model\V1EntitiesWebhooksSubscription**](../Model/V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebhooksDealId()`

```php
getWebhooksDealId($id): \DealMaker\Model\V1EntitiesWebhooksDeal
```

Finds a deal using the id

Returns a deal

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->getWebhooksDealId($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getWebhooksDealId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesWebhooksDeal**](../Model/V1EntitiesWebhooksDeal.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebhooksDealsSearch()`

```php
getWebhooksDealsSearch(): \DealMaker\Model\V1EntitiesWebhooksSecurityToken
```

Searches for deals for a given user

Searches for deals for a given user

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getWebhooksDealsSearch();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getWebhooksDealsSearch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\DealMaker\Model\V1EntitiesWebhooksSecurityToken**](../Model/V1EntitiesWebhooksSecurityToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebhooksSecurityToken()`

```php
getWebhooksSecurityToken(): \DealMaker\Model\V1EntitiesWebhooksSecurityToken
```

Creates a new security token for webhook subscription

Creates a new security token for webhook subscription

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getWebhooksSecurityToken();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getWebhooksSecurityToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\DealMaker\Model\V1EntitiesWebhooksSecurityToken**](../Model/V1EntitiesWebhooksSecurityToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchDealsIdPlatformEmailsDomain()`

```php
patchDealsIdPlatformEmailsDomain($id, $patch_deals_id_platform_emails_domain_request)
```

Update the email domain settings for the deal

Update the email domain settings for the deal

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$patch_deals_id_platform_emails_domain_request = new \DealMaker\Model\PatchDealsIdPlatformEmailsDomainRequest(); // \DealMaker\Model\PatchDealsIdPlatformEmailsDomainRequest

try {
    $apiInstance->patchDealsIdPlatformEmailsDomain($id, $patch_deals_id_platform_emails_domain_request);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->patchDealsIdPlatformEmailsDomain: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **patch_deals_id_platform_emails_domain_request** | [**\DealMaker\Model\PatchDealsIdPlatformEmailsDomainRequest**](../Model/PatchDealsIdPlatformEmailsDomainRequest.md)|  | |

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

## `postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit()`

```php
postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit($deal_id): \DealMaker\Model\V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult
```

Submit a payout account details form

Submit a payout account details form

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$deal_id = 56; // int

try {
    $result = $apiInstance->postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit($deal_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->postDealsDealIdPaymentOnboardingQuestionnairePayoutAccountDetailsSubmit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **deal_id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult**](../Model/V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit()`

```php
postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit($deal_id)
```

Submit a qualification questionnaire response

Submit a qualification questionnaire response

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$deal_id = 56; // int

try {
    $apiInstance->postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit($deal_id);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireResponseSubmit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **deal_id** | **int**|  | |

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

## `postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit()`

```php
postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit($deal_id): \DealMaker\Model\V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult
```

Submit a qualification questionnaire form

Submit a qualification questionnaire form

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$deal_id = 56; // int

try {
    $result = $apiInstance->postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit($deal_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->postDealsDealIdPaymentOnboardingQuestionnaireQualificationQuestionnaireSubmit: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **deal_id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult**](../Model/V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `postInvestorsInvestorIdDeleteInvestmentProcess()`

```php
postInvestorsInvestorIdDeleteInvestmentProcess($investor_id)
```

Delete investment

Delete investment

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$investor_id = 56; // int

try {
    $apiInstance->postInvestorsInvestorIdDeleteInvestmentProcess($investor_id);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->postInvestorsInvestorIdDeleteInvestmentProcess: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_id** | **int**|  | |

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

## `postInvestorsInvestorIdTransactionsRequestRefundProcess()`

```php
postInvestorsInvestorIdTransactionsRequestRefundProcess($investor_id)
```

Request refund for investor transactions

Request refund for investor transactions

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$investor_id = 56; // int

try {
    $apiInstance->postInvestorsInvestorIdTransactionsRequestRefundProcess($investor_id);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->postInvestorsInvestorIdTransactionsRequestRefundProcess: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **investor_id** | **int**|  | |

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

## `postWebhooks()`

```php
postWebhooks($post_webhooks_request): \DealMaker\Model\V1EntitiesWebhooksSubscription
```

Creates a webhook subscription which is associated to the user

Creates new webhook subscription

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$post_webhooks_request = new \DealMaker\Model\PostWebhooksRequest(); // \DealMaker\Model\PostWebhooksRequest

try {
    $result = $apiInstance->postWebhooks($post_webhooks_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->postWebhooks: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **post_webhooks_request** | [**\DealMaker\Model\PostWebhooksRequest**](../Model/PostWebhooksRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesWebhooksSubscription**](../Model/V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `putWebhooksId()`

```php
putWebhooksId($id, $put_webhooks_id_request): \DealMaker\Model\V1EntitiesWebhooksSubscription
```

Updates webhook subscription and webhooks subcription deals

Updates webhook subscription

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$put_webhooks_id_request = new \DealMaker\Model\PutWebhooksIdRequest(); // \DealMaker\Model\PutWebhooksIdRequest

try {
    $result = $apiInstance->putWebhooksId($id, $put_webhooks_id_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->putWebhooksId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **put_webhooks_id_request** | [**\DealMaker\Model\PutWebhooksIdRequest**](../Model/PutWebhooksIdRequest.md)|  | [optional] |

### Return type

[**\DealMaker\Model\V1EntitiesWebhooksSubscription**](../Model/V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
