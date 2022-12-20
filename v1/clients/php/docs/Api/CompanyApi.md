# DealMaker\CompanyApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createCompany()**](CompanyApi.md#createCompany) | **POST** /companies | Create new company |
| [**getCompanies()**](CompanyApi.md#getCompanies) | **GET** /companies | Get list of Companies |
| [**getCompany()**](CompanyApi.md#getCompany) | **GET** /companies/{id} | Get a Company |


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
