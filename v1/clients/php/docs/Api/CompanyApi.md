# DealMaker\CompanyApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createBulkUpload()**](CompanyApi.md#createBulkUpload) | **POST** /companies/{id}/documents/bulk_uploads | Create bulk upload record |
| [**createBulkUploadDetail()**](CompanyApi.md#createBulkUploadDetail) | **POST** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details | Create a BulkUploadDetail class record |
| [**createCompany()**](CompanyApi.md#createCompany) | **POST** /companies | Create new company |
| [**createShareholderAction()**](CompanyApi.md#createShareholderAction) | **POST** /companies/{company_id}/shareholders/{shareholder_id}/actions | Create a shareholder action |
| [**getBulkUpload()**](CompanyApi.md#getBulkUpload) | **GET** /companies/{id}/documents/bulk_uploads/{bulk_upload_id} | Return a given bulk upload by id |
| [**getBulkUploadDetailsErrors()**](CompanyApi.md#getBulkUploadDetailsErrors) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/errors | Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc |
| [**getBulkUploads()**](CompanyApi.md#getBulkUploads) | **GET** /companies/{id}/documents/bulk_uploads | Return bulk uploads |
| [**getCompanies()**](CompanyApi.md#getCompanies) | **GET** /companies | Get list of Companies |
| [**getCompany()**](CompanyApi.md#getCompany) | **GET** /companies/{id} | Get a Company |
| [**getDetailsErrorsGrouped()**](CompanyApi.md#getDetailsErrorsGrouped) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/grouped_errors | Return bulk upload details grouped by status |
| [**getDividends()**](CompanyApi.md#getDividends) | **GET** /companies/{company_id}/portal/dividends | Return dividends |
| [**getUserAccessibleCompanies()**](CompanyApi.md#getUserAccessibleCompanies) | **GET** /users/accessible_companies | Get list of all Companies accessible by the user |
| [**sendPortalInvite()**](CompanyApi.md#sendPortalInvite) | **POST** /companies/{id}/shareholders/{shareholder_id}/send_portal_invite | Send portal invite to shareholder |


## `createBulkUpload()`

```php
createBulkUpload($id, $create_bulk_upload_request): \DealMaker\Model\V1EntitiesBulkUpload
```

Create bulk upload record

Create bulk upload record

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | The company id
$create_bulk_upload_request = new \DealMaker\Model\CreateBulkUploadRequest(); // \DealMaker\Model\CreateBulkUploadRequest

try {
    $result = $apiInstance->createBulkUpload($id, $create_bulk_upload_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->createBulkUpload: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The company id | |
| **create_bulk_upload_request** | [**\DealMaker\Model\CreateBulkUploadRequest**](../Model/CreateBulkUploadRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesBulkUpload**](../Model/V1EntitiesBulkUpload.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createBulkUploadDetail()`

```php
createBulkUploadDetail($bulk_upload_id, $company_id, $create_bulk_upload_detail_request): \DealMaker\Model\V1EntitiesBulkUploadDetail
```

Create a BulkUploadDetail class record

Create a BulkUploadDetail class record

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$bulk_upload_id = 'bulk_upload_id_example'; // string | The Bulk upload ID from which detail is associated with
$company_id = 56; // int
$create_bulk_upload_detail_request = new \DealMaker\Model\CreateBulkUploadDetailRequest(); // \DealMaker\Model\CreateBulkUploadDetailRequest

try {
    $result = $apiInstance->createBulkUploadDetail($bulk_upload_id, $company_id, $create_bulk_upload_detail_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->createBulkUploadDetail: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **bulk_upload_id** | **string**| The Bulk upload ID from which detail is associated with | |
| **company_id** | **int**|  | |
| **create_bulk_upload_detail_request** | [**\DealMaker\Model\CreateBulkUploadDetailRequest**](../Model/CreateBulkUploadDetailRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesBulkUploadDetail**](../Model/V1EntitiesBulkUploadDetail.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createCompany()`

```php
createCompany($create_company_request): \DealMaker\Model\V1EntitiesCompany
```

Create new company

Creates a new company.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_company_request = new \DealMaker\Model\CreateCompanyRequest(); // \DealMaker\Model\CreateCompanyRequest

try {
    $result = $apiInstance->createCompany($create_company_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->createCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_company_request** | [**\DealMaker\Model\CreateCompanyRequest**](../Model/CreateCompanyRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesCompany**](../Model/V1EntitiesCompany.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createShareholderAction()`

```php
createShareholderAction($company_id, $shareholder_id, $create_shareholder_action_request): \DealMaker\Model\V1EntitiesGenericResponse
```

Create a shareholder action

Create a shareholder action

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_id = 56; // int | The company id
$shareholder_id = 56; // int | The shareholder id
$create_shareholder_action_request = new \DealMaker\Model\CreateShareholderActionRequest(); // \DealMaker\Model\CreateShareholderActionRequest

try {
    $result = $apiInstance->createShareholderAction($company_id, $shareholder_id, $create_shareholder_action_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->createShareholderAction: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_id** | **int**| The company id | |
| **shareholder_id** | **int**| The shareholder id | |
| **create_shareholder_action_request** | [**\DealMaker\Model\CreateShareholderActionRequest**](../Model/CreateShareholderActionRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesGenericResponse**](../Model/V1EntitiesGenericResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBulkUpload()`

```php
getBulkUpload($id, $bulk_upload_id, $page, $per_page, $offset): \DealMaker\Model\V1EntitiesBulkUpload
```

Return a given bulk upload by id

Return a given bulk upload by id

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$bulk_upload_id = 56; // int
$page = 1; // int | Page offset to fetch.
$per_page = 25; // int | Number of results to return per page.
$offset = 0; // int | Pad a number of results.

try {
    $result = $apiInstance->getBulkUpload($id, $bulk_upload_id, $page, $per_page, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getBulkUpload: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **bulk_upload_id** | **int**|  | |
| **page** | **int**| Page offset to fetch. | [optional] [default to 1] |
| **per_page** | **int**| Number of results to return per page. | [optional] [default to 25] |
| **offset** | **int**| Pad a number of results. | [optional] [default to 0] |

### Return type

[**\DealMaker\Model\V1EntitiesBulkUpload**](../Model/V1EntitiesBulkUpload.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBulkUploadDetailsErrors()`

```php
getBulkUploadDetailsErrors($company_id, $bulk_upload_id): \DealMaker\Model\V1EntitiesBulkUploadDetails
```

Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc

Returns a full list of details with errors of the given bulk upload

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_id = 56; // int
$bulk_upload_id = 56; // int

try {
    $result = $apiInstance->getBulkUploadDetailsErrors($company_id, $bulk_upload_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getBulkUploadDetailsErrors: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_id** | **int**|  | |
| **bulk_upload_id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesBulkUploadDetails**](../Model/V1EntitiesBulkUploadDetails.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBulkUploads()`

```php
getBulkUploads($id, $page, $per_page, $offset): \DealMaker\Model\V1EntitiesBulkUploads
```

Return bulk uploads

Return bulk uploads

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$page = 1; // int | Page offset to fetch.
$per_page = 25; // int | Number of results to return per page.
$offset = 0; // int | Pad a number of results.

try {
    $result = $apiInstance->getBulkUploads($id, $page, $per_page, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getBulkUploads: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **page** | **int**| Page offset to fetch. | [optional] [default to 1] |
| **per_page** | **int**| Number of results to return per page. | [optional] [default to 25] |
| **offset** | **int**| Pad a number of results. | [optional] [default to 0] |

### Return type

[**\DealMaker\Model\V1EntitiesBulkUploads**](../Model/V1EntitiesBulkUploads.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompanies()`

```php
getCompanies($page, $per_page, $offset): \DealMaker\Model\V1EntitiesCompany
```

Get list of Companies

Get companies

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page offset to fetch.
$per_page = 25; // int | Number of results to return per page.
$offset = 0; // int | Pad a number of results.

try {
    $result = $apiInstance->getCompanies($page, $per_page, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getCompanies: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page offset to fetch. | [optional] [default to 1] |
| **per_page** | **int**| Number of results to return per page. | [optional] [default to 25] |
| **offset** | **int**| Pad a number of results. | [optional] [default to 0] |

### Return type

[**\DealMaker\Model\V1EntitiesCompany**](../Model/V1EntitiesCompany.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCompany()`

```php
getCompany($id): \DealMaker\Model\V1EntitiesCompany
```

Get a Company

Get a Company.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int

try {
    $result = $apiInstance->getCompany($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getCompany: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesCompany**](../Model/V1EntitiesCompany.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDetailsErrorsGrouped()`

```php
getDetailsErrorsGrouped($company_id, $bulk_upload_id): \DealMaker\Model\V1EntitiesBulkUploadDetails
```

Return bulk upload details grouped by status

Return bulk upload details grouped by status

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_id = 56; // int
$bulk_upload_id = 56; // int

try {
    $result = $apiInstance->getDetailsErrorsGrouped($company_id, $bulk_upload_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getDetailsErrorsGrouped: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_id** | **int**|  | |
| **bulk_upload_id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesBulkUploadDetails**](../Model/V1EntitiesBulkUploadDetails.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDividends()`

```php
getDividends($company_id): \DealMaker\Model\V1EntitiesDividends
```

Return dividends

Return dividends associated with a shareholder

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$company_id = 56; // int

try {
    $result = $apiInstance->getDividends($company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getDividends: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesDividends**](../Model/V1EntitiesDividends.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getUserAccessibleCompanies()`

```php
getUserAccessibleCompanies($page, $per_page, $offset): \DealMaker\Model\V1EntitiesCompany
```

Get list of all Companies accessible by the user

Get user accessible companies

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page = 1; // int | Page offset to fetch.
$per_page = 25; // int | Number of results to return per page.
$offset = 0; // int | Pad a number of results.

try {
    $result = $apiInstance->getUserAccessibleCompanies($page, $per_page, $offset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getUserAccessibleCompanies: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **page** | **int**| Page offset to fetch. | [optional] [default to 1] |
| **per_page** | **int**| Number of results to return per page. | [optional] [default to 25] |
| **offset** | **int**| Pad a number of results. | [optional] [default to 0] |

### Return type

[**\DealMaker\Model\V1EntitiesCompany**](../Model/V1EntitiesCompany.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `sendPortalInvite()`

```php
sendPortalInvite($id, $shareholder_id, $send_portal_invite_request)
```

Send portal invite to shareholder

Send portal invite to shareholder.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\CompanyApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int
$shareholder_id = 56; // int
$send_portal_invite_request = new \DealMaker\Model\SendPortalInviteRequest(); // \DealMaker\Model\SendPortalInviteRequest

try {
    $apiInstance->sendPortalInvite($id, $shareholder_id, $send_portal_invite_request);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->sendPortalInvite: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **shareholder_id** | **int**|  | |
| **send_portal_invite_request** | [**\DealMaker\Model\SendPortalInviteRequest**](../Model/SendPortalInviteRequest.md)|  | [optional] |

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
