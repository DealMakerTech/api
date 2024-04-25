# DealMaker\CompanyApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createBulkUpload()**](CompanyApi.md#createBulkUpload) | **POST** /companies/{id}/documents/bulk_uploads | Create bulk upload record |
| [**createBulkUploadDetail()**](CompanyApi.md#createBulkUploadDetail) | **POST** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details | Create a BulkUploadDetail class record |
| [**createCompany()**](CompanyApi.md#createCompany) | **POST** /companies | Create new company |
| [**createEmailTemplate()**](CompanyApi.md#createEmailTemplate) | **POST** /companies/{id}/news_releases/email_templates | Creates an email template |
| [**createMembersBulkUpload()**](CompanyApi.md#createMembersBulkUpload) | **POST** /companies/{id}/members/bulk_uploads | Create bulk upload record |
| [**createShareholderAction()**](CompanyApi.md#createShareholderAction) | **POST** /companies/{company_id}/shareholders/{shareholder_id}/actions | Create a shareholder action |
| [**deleteEmailTemplate()**](CompanyApi.md#deleteEmailTemplate) | **DELETE** /companies/{id}/news_releases/email_templates/{template_id} | Deletes an email template |
| [**getBulkUpload()**](CompanyApi.md#getBulkUpload) | **GET** /companies/{id}/documents/bulk_uploads/{bulk_upload_id} | Return a given bulk upload by id |
| [**getBulkUploadDetailsErrors()**](CompanyApi.md#getBulkUploadDetailsErrors) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/errors | Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc |
| [**getBulkUploads()**](CompanyApi.md#getBulkUploads) | **GET** /companies/{id}/documents/bulk_uploads | Return bulk uploads |
| [**getCompanies()**](CompanyApi.md#getCompanies) | **GET** /companies | Get list of Companies |
| [**getCompany()**](CompanyApi.md#getCompany) | **GET** /companies/{id} | Get a Company |
| [**getDetailsErrorsGrouped()**](CompanyApi.md#getDetailsErrorsGrouped) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/grouped_errors | Return bulk upload details grouped by status |
| [**getDividends()**](CompanyApi.md#getDividends) | **GET** /companies/{company_id}/portal/dividends | Return dividends |
| [**getEmailEvents()**](CompanyApi.md#getEmailEvents) | **GET** /companies/{company_communication_id}/email_events | Get a list of email events for a company communication |
| [**getEmailTemplate()**](CompanyApi.md#getEmailTemplate) | **GET** /companies/{id}/news_releases/email_templates/{template_id} | Get an email template |
| [**getEmailTemplates()**](CompanyApi.md#getEmailTemplates) | **GET** /companies/{id}/news_releases/email_templates | Get list of email template |
| [**getMembersBulkUpload()**](CompanyApi.md#getMembersBulkUpload) | **GET** /companies/{id}/members/bulk_uploads/{id_members_bulk_upload} | Get bulk upload record |
| [**getMembersBulkUploads()**](CompanyApi.md#getMembersBulkUploads) | **GET** /companies/{id}/members/bulk_uploads | Get bulk uploads records |
| [**getShareholderLedger()**](CompanyApi.md#getShareholderLedger) | **GET** /companies/{id}/shareholder_ledger | Get shareholder ledger by company |
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

## `createEmailTemplate()`

```php
createEmailTemplate($id, $create_email_template_request): \DealMaker\Model\V1EntitiesEmailTemplate
```

Creates an email template

Create new email template

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
$create_email_template_request = new \DealMaker\Model\CreateEmailTemplateRequest(); // \DealMaker\Model\CreateEmailTemplateRequest

try {
    $result = $apiInstance->createEmailTemplate($id, $create_email_template_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->createEmailTemplate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |
| **create_email_template_request** | [**\DealMaker\Model\CreateEmailTemplateRequest**](../Model/CreateEmailTemplateRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesEmailTemplate**](../Model/V1EntitiesEmailTemplate.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createMembersBulkUpload()`

```php
createMembersBulkUpload($id, $create_members_bulk_upload_request): \DealMaker\Model\V1EntitiesMembersBulkUpload
```

Create bulk upload record

Create members bulk upload record

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
$create_members_bulk_upload_request = new \DealMaker\Model\CreateMembersBulkUploadRequest(); // \DealMaker\Model\CreateMembersBulkUploadRequest

try {
    $result = $apiInstance->createMembersBulkUpload($id, $create_members_bulk_upload_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->createMembersBulkUpload: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The company id | |
| **create_members_bulk_upload_request** | [**\DealMaker\Model\CreateMembersBulkUploadRequest**](../Model/CreateMembersBulkUploadRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesMembersBulkUpload**](../Model/V1EntitiesMembersBulkUpload.md)

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

## `deleteEmailTemplate()`

```php
deleteEmailTemplate($id, $template_id)
```

Deletes an email template

Delete an email template

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
$template_id = 56; // int | The email template id

try {
    $apiInstance->deleteEmailTemplate($id, $template_id);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->deleteEmailTemplate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The company id | |
| **template_id** | **int**| The email template id | |

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

## `getEmailEvents()`

```php
getEmailEvents($company_communication_id): \DealMaker\Model\V1EntitiesEmailEvents
```

Get a list of email events for a company communication

Gets a list of email events for a specific company communication.

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
$company_communication_id = 56; // int | The id of the company communication.

try {
    $result = $apiInstance->getEmailEvents($company_communication_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getEmailEvents: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **company_communication_id** | **int**| The id of the company communication. | |

### Return type

[**\DealMaker\Model\V1EntitiesEmailEvents**](../Model/V1EntitiesEmailEvents.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmailTemplate()`

```php
getEmailTemplate($id, $template_id): \DealMaker\Model\V1EntitiesEmailTemplate
```

Get an email template

Get an email template

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
$template_id = 56; // int | The email template id

try {
    $result = $apiInstance->getEmailTemplate($id, $template_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getEmailTemplate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The company id | |
| **template_id** | **int**| The email template id | |

### Return type

[**\DealMaker\Model\V1EntitiesEmailTemplate**](../Model/V1EntitiesEmailTemplate.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getEmailTemplates()`

```php
getEmailTemplates($id, $page, $per_page, $public_template): \DealMaker\Model\V1EntitiesEmailTemplate
```

Get list of email template

Get list of email template

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
$page = 0; // int | The page number
$per_page = 10; // int | The number of items per page
$public_template = false; // bool | The public template

try {
    $result = $apiInstance->getEmailTemplates($id, $page, $per_page, $public_template);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getEmailTemplates: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The company id | |
| **page** | **int**| The page number | [optional] [default to 0] |
| **per_page** | **int**| The number of items per page | [optional] [default to 10] |
| **public_template** | **bool**| The public template | [optional] [default to false] |

### Return type

[**\DealMaker\Model\V1EntitiesEmailTemplate**](../Model/V1EntitiesEmailTemplate.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMembersBulkUpload()`

```php
getMembersBulkUpload($id, $id_members_bulk_upload): \DealMaker\Model\V1EntitiesMembersBulkUpload
```

Get bulk upload record

Get members bulk upload record

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
$id_members_bulk_upload = 56; // int | The bulk upload id

try {
    $result = $apiInstance->getMembersBulkUpload($id, $id_members_bulk_upload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getMembersBulkUpload: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The company id | |
| **id_members_bulk_upload** | **int**| The bulk upload id | |

### Return type

[**\DealMaker\Model\V1EntitiesMembersBulkUpload**](../Model/V1EntitiesMembersBulkUpload.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMembersBulkUploads()`

```php
getMembersBulkUploads($id): \DealMaker\Model\V1EntitiesMembersBulkUploads
```

Get bulk uploads records

Get members bulk uploads records

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

try {
    $result = $apiInstance->getMembersBulkUploads($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getMembersBulkUploads: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**| The company id | |

### Return type

[**\DealMaker\Model\V1EntitiesMembersBulkUploads**](../Model/V1EntitiesMembersBulkUploads.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getShareholderLedger()`

```php
getShareholderLedger($id): \DealMaker\Model\V1EntitiesShareholderLedger
```

Get shareholder ledger by company

Get shareholder ledger by company.

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
    $result = $apiInstance->getShareholderLedger($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyApi->getShareholderLedger: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesShareholderLedger**](../Model/V1EntitiesShareholderLedger.md)

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
