# DealMaker\InvestorApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addDocument()**](InvestorApi.md#addDocument) | **POST** /deals/{id}/investors/{investor_id}/add_document | Add document for deal investor |
| [**createInvestor()**](InvestorApi.md#createInvestor) | **POST** /deals/{id}/investors | Create a deal investor |
| [**deleteDocument()**](InvestorApi.md#deleteDocument) | **DELETE** /deals/{id}/investors/{investor_id}/delete_document/{document_id} | Delete document for deal investor |
| [**getInvestor()**](InvestorApi.md#getInvestor) | **GET** /deals/{id}/investors/{investor_id} | Get a deal investor by id |
| [**getInvestorOtpLink()**](InvestorApi.md#getInvestorOtpLink) | **GET** /deals/{id}/investors/{investor_id}/otp_access_link | Get OTP access link for deal investor |
| [**listInvestors()**](InvestorApi.md#listInvestors) | **GET** /deals/{id}/investors | List deal investors |
| [**patchInvestor()**](InvestorApi.md#patchInvestor) | **PATCH** /deals/{id}/investors/{investor_id} | Patch a deal investor |
| [**updateInvestor()**](InvestorApi.md#updateInvestor) | **PUT** /deals/{id}/investors/{investor_id} | Update a deal investor |


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

## `createInvestor()`

```php
createInvestor($id, $create_investor_request): \DealMaker\Model\V1EntitiesInvestor
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
$create_investor_request = new \DealMaker\Model\CreateInvestorRequest(); // \DealMaker\Model\CreateInvestorRequest

try {
    $result = $apiInstance->createInvestor($id, $create_investor_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InvestorApi->createInvestor: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The deal id. | |
| **create_investor_request** | [**\DealMaker\Model\CreateInvestorRequest**](../Model/CreateInvestorRequest.md)|  | |

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

Get OTP access link for deal investor by id

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

## `updateInvestor()`

```php
updateInvestor($id, $investor_id, $update_investor_request): \DealMaker\Model\V1EntitiesInvestor
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
$update_investor_request = new \DealMaker\Model\UpdateInvestorRequest(); // \DealMaker\Model\UpdateInvestorRequest

try {
    $result = $apiInstance->updateInvestor($id, $investor_id, $update_investor_request);
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
| **update_investor_request** | [**\DealMaker\Model\UpdateInvestorRequest**](../Model/UpdateInvestorRequest.md)|  | [optional] |

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
