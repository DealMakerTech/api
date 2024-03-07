# DealMaker\InvestorApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**add506cDocument()**](InvestorApi.md#add506cDocument) | **POST** /deals/{id}/investors/{investor_id}/add_506c_document | Add 506c document for deal investor |
| [**addDocument()**](InvestorApi.md#addDocument) | **POST** /deals/{id}/investors/{investor_id}/add_document | Add document for deal investor |
| [**bulkUploadInvestors()**](InvestorApi.md#bulkUploadInvestors) | **POST** /deals/{id}/investors/bulk_upload | Bulk upload investors for deal investor |
| [**createInvestor()**](InvestorApi.md#createInvestor) | **POST** /deals/{id}/investors | Create a deal investor |
| [**deleteDocument()**](InvestorApi.md#deleteDocument) | **DELETE** /deals/{id}/investors/{investor_id}/delete_document/{document_id} | Delete document for deal investor |
| [**deleteInvestorProfile()**](InvestorApi.md#deleteInvestorProfile) | **DELETE** /investor_profiles/{type}/{id} | Delete investor profile. |
| [**editInvestorTags()**](InvestorApi.md#editInvestorTags) | **POST** /deals/{id}/investors/{investor_id}/edit_tags | Append or replace tag(s) for a specific investor |
| [**getDealInvestorSearchEntities()**](InvestorApi.md#getDealInvestorSearchEntities) | **GET** /deals/{id}/investors/{investor_id}/search_entities | Get the search entities attached to the investor |
| [**getEnforcements()**](InvestorApi.md#getEnforcements) | **GET** /deals/{id}/investors/{investor_id}/background_checks/{search_entity_id}/enforcements | Get enforcements for a background search |
| [**getIncentivePlan()**](InvestorApi.md#getIncentivePlan) | **GET** /deals/{id}/investors/{investor_id}/incentive_plan | Get investor incentive plan by investor id |
| [**getInvestor()**](InvestorApi.md#getInvestor) | **GET** /deals/{id}/investors/{investor_id} | Get a deal investor by id |
| [**getInvestorOtpLink()**](InvestorApi.md#getInvestorOtpLink) | **GET** /deals/{id}/investors/{investor_id}/otp_access_link | Get OTP access link for deal investor |
| [**listInvestors()**](InvestorApi.md#listInvestors) | **GET** /deals/{id}/investors | List deal investors |
| [**patchInvestor()**](InvestorApi.md#patchInvestor) | **PATCH** /deals/{id}/investors/{investor_id} | Patch a deal investor |
| [**runBackgroundSearch()**](InvestorApi.md#runBackgroundSearch) | **POST** /deals/{id}/investors/{investor_id}/background_checks/run | Run Alloy background search for the investor |
| [**updateInvestor()**](InvestorApi.md#updateInvestor) | **PUT** /deals/{id}/investors/{investor_id} | Update a deal investor |


## `add506cDocument()`

```php
add506cDocument($id, $investor_id, $add506c_document_request): \DealMaker\Model\V1EntitiesInvestor
```

Add 506c document for deal investor

Add 506c document for deal investor

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$investor_id = 56; // int | The investor id.
$add506c_document_request = new \DealMaker\Model\Add506cDocumentRequest(); // \DealMaker\Model\Add506cDocumentRequest

try {
    $result = $apiInstance->add506cDocument($id, $investor_id, $add506c_document_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->add506cDocument: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **investor_id** | **int**| The investor id. | |
| **add506c_document_request** | [**\DealMaker\Model\Add506cDocumentRequest**](../Model/Add506cDocumentRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestor**](../Model/V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addDocument()`

```php
addDocument($id, $investor_id, $add_document_request): \DealMaker\Model\V1EntitiesInvestor
```

Add document for deal investor

Add document for deal investor

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$investor_id = 56; // int | The investor id.
$add_document_request = new \DealMaker\Model\AddDocumentRequest(); // \DealMaker\Model\AddDocumentRequest

try {
    $result = $apiInstance->addDocument($id, $investor_id, $add_document_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->addDocument: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **investor_id** | **int**| The investor id. | |
| **add_document_request** | [**\DealMaker\Model\AddDocumentRequest**](../Model/AddDocumentRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestor**](../Model/V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `bulkUploadInvestors()`

```php
bulkUploadInvestors($id, $bulk_upload_investors_request): \DealMaker\Model\V1EntitiesInvestor
```

Bulk upload investors for deal investor

Bulk upload investors

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$bulk_upload_investors_request = new \DealMaker\Model\BulkUploadInvestorsRequest(); // \DealMaker\Model\BulkUploadInvestorsRequest

try {
    $result = $apiInstance->bulkUploadInvestors($id, $bulk_upload_investors_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->bulkUploadInvestors: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **bulk_upload_investors_request** | [**\DealMaker\Model\BulkUploadInvestorsRequest**](../Model/BulkUploadInvestorsRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestor**](../Model/V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createInvestor()`

```php
createInvestor($id, $deals_id_investors): \DealMaker\Model\V1EntitiesInvestor
```

Create a deal investor

Create a single deal investor.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$deals_id_investors = new \DealMaker\Model\PostDealsIdInvestors(); // \DealMaker\Model\PostDealsIdInvestors

try {
    $result = $apiInstance->createInvestor($id, $deals_id_investors);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->createInvestor: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **deals_id_investors** | [**\DealMaker\Model\PostDealsIdInvestors**](../Model/PostDealsIdInvestors.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestor**](../Model/V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteDocument()`

```php
deleteDocument($id, $investor_id, $document_id)
```

Delete document for deal investor

Delete document for deal investor

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$investor_id = 56; // int
$document_id = 56; // int

try {
    $apiInstance->deleteDocument($id, $investor_id, $document_id);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->deleteDocument: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **investor_id** | **int**|  | |
| **document_id** | **int**|  | |

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

## `deleteInvestorProfile()`

```php
deleteInvestorProfile($type, $id)
```

Delete investor profile.

Deletes the investor profile.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$type = 56; // int
$id = 56; // int

try {
    $apiInstance->deleteInvestorProfile($type, $id);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->deleteInvestorProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **type** | **int**|  | |
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

## `editInvestorTags()`

```php
editInvestorTags($id, $investor_id, $edit_investor_tags_request): \DealMaker\Model\V1EntitiesInvestor
```

Append or replace tag(s) for a specific investor

Edit investor tag

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$investor_id = 56; // int
$edit_investor_tags_request = new \DealMaker\Model\EditInvestorTagsRequest(); // \DealMaker\Model\EditInvestorTagsRequest

try {
    $result = $apiInstance->editInvestorTags($id, $investor_id, $edit_investor_tags_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->editInvestorTags: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **investor_id** | **int**|  | |
| **edit_investor_tags_request** | [**\DealMaker\Model\EditInvestorTagsRequest**](../Model/EditInvestorTagsRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestor**](../Model/V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDealInvestorSearchEntities()`

```php
getDealInvestorSearchEntities($id, $investor_id): \DealMaker\Model\V1EntitiesInvestorSearchEntities
```

Get the search entities attached to the investor

Get the entities that needs to be updated due to wrong information.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$investor_id = 56; // int | The investor id.

try {
    $result = $apiInstance->getDealInvestorSearchEntities($id, $investor_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->getDealInvestorSearchEntities: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **investor_id** | **int**| The investor id. | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorSearchEntities**](../Model/V1EntitiesInvestorSearchEntities.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEnforcements()`

```php
getEnforcements($id, $investor_id, $search_entity_id): \DealMaker\Model\V1EntitiesInvestor
```

Get enforcements for a background search

Get enforcements for a background search

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$investor_id = 56; // int
$search_entity_id = 56; // int

try {
    $result = $apiInstance->getEnforcements($id, $investor_id, $search_entity_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->getEnforcements: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **investor_id** | **int**|  | |
| **search_entity_id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestor**](../Model/V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getIncentivePlan()`

```php
getIncentivePlan($id, $investor_id): \DealMaker\Model\V1EntitiesDealsPriceDetails
```

Get investor incentive plan by investor id

Gets a single investor incentive plan by the investor id.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$investor_id = 56; // int | The investor id.

try {
    $result = $apiInstance->getIncentivePlan($id, $investor_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->getIncentivePlan: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **investor_id** | **int**| The investor id. | |

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

## `getInvestor()`

```php
getInvestor($id, $investor_id): \DealMaker\Model\V1EntitiesInvestor
```

Get a deal investor by id

Gets a single investor by the id.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$investor_id = 56; // int | The investor id.

try {
    $result = $apiInstance->getInvestor($id, $investor_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->getInvestor: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **investor_id** | **int**| The investor id. | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestor**](../Model/V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getInvestorOtpLink()`

```php
getInvestorOtpLink($id, $investor_id): \DealMaker\Model\V1EntitiesInvestorOtpAccessLink
```

Get OTP access link for deal investor

The access link for the investor. This is the access link for the specific investment, not the user.                       If the same user has multiple investments, each one will have a different access link.                       Please note that this access link expires every hour. In order to redirect the investor into their authentication screen,                       use the https://app.dealmaker.tech/deals/{{deal_id}}/investors/{{investor_id}}/otp_access url.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$investor_id = 56; // int | The investor id.

try {
    $result = $apiInstance->getInvestorOtpLink($id, $investor_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->getInvestorOtpLink: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **investor_id** | **int**| The investor id. | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestorOtpAccessLink**](../Model/V1EntitiesInvestorOtpAccessLink.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listInvestors()`

```php
listInvestors($id, $page, $per_page, $offset, $investor_ids, $q): \DealMaker\Model\V1EntitiesInvestors
```

List deal investors

List deal investors according to the specified search criteria.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$page = 1; // int | Page offset to fetch.
$per_page = 25; // int | Number of results to return per page.
$offset = 0; // int | Pad a number of results.
$investor_ids = array(56); // int[] | An array of investor ids.
$q = 'q_example'; // string | The search query for investors. For additional information on filtering and seach, click [here](#section/Search-and-Filtering-(The-q-parameter)/Keyword-filtering)

try {
    $result = $apiInstance->listInvestors($id, $page, $per_page, $offset, $investor_ids, $q);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->listInvestors: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **page** | **int**| Page offset to fetch. | [optional] [default to 1] |
| **per_page** | **int**| Number of results to return per page. | [optional] [default to 25] |
| **offset** | **int**| Pad a number of results. | [optional] [default to 0] |
| **investor_ids** | [**int[]**](../Model/int.md)| An array of investor ids. | [optional] |
| **q** | **string**| The search query for investors. For additional information on filtering and seach, click [here](#section/Search-and-Filtering-(The-q-parameter)/Keyword-filtering) | [optional] |

### Return type

[**\DealMaker\Model\V1EntitiesInvestors**](../Model/V1EntitiesInvestors.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `patchInvestor()`

```php
patchInvestor($id, $investor_id, $patch_investor_request): \DealMaker\Model\V1EntitiesInvestor
```

Patch a deal investor

Patch deal investor

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$investor_id = 56; // int | The investor id.
$patch_investor_request = new \DealMaker\Model\PatchInvestorRequest(); // \DealMaker\Model\PatchInvestorRequest

try {
    $result = $apiInstance->patchInvestor($id, $investor_id, $patch_investor_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->patchInvestor: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **investor_id** | **int**| The investor id. | |
| **patch_investor_request** | [**\DealMaker\Model\PatchInvestorRequest**](../Model/PatchInvestorRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestor**](../Model/V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `runBackgroundSearch()`

```php
runBackgroundSearch($id, $investor_id, $run_background_search_request)
```

Run Alloy background search for the investor

Run Alloy background search for the investor

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$investor_id = 56; // int
$run_background_search_request = new \DealMaker\Model\RunBackgroundSearchRequest(); // \DealMaker\Model\RunBackgroundSearchRequest

try {
    $apiInstance->runBackgroundSearch($id, $investor_id, $run_background_search_request);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->runBackgroundSearch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **investor_id** | **int**|  | |
| **run_background_search_request** | [**\DealMaker\Model\RunBackgroundSearchRequest**](../Model/RunBackgroundSearchRequest.md)|  | |

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

## `updateInvestor()`

```php
updateInvestor($id, $investor_id, $deals_id_investors): \DealMaker\Model\V1EntitiesInvestor
```

Update a deal investor

Update deal investor

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\InvestorApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The deal id.
$investor_id = 56; // int | The investor id.
$deals_id_investors = new \DealMaker\Model\PutDealsIdInvestors(); // \DealMaker\Model\PutDealsIdInvestors

try {
    $result = $apiInstance->updateInvestor($id, $investor_id, $deals_id_investors);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->updateInvestor: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **investor_id** | **int**| The investor id. | |
| **deals_id_investors** | [**\DealMaker\Model\PutDealsIdInvestors**](../Model/PutDealsIdInvestors.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesInvestor**](../Model/V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
