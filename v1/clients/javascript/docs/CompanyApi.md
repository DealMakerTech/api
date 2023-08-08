# Api.CompanyApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createBulkUpload**](CompanyApi.md#createBulkUpload) | **POST** /companies/{id}/documents/bulk_uploads | Create bulk upload record
[**createBulkUploadDetail**](CompanyApi.md#createBulkUploadDetail) | **POST** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details | Create a BulkUploadDetail class record
[**createCompany**](CompanyApi.md#createCompany) | **POST** /companies | Create new company
[**getBulkUploadDetails**](CompanyApi.md#getBulkUploadDetails) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details | Return full list of bulk upload details order by status desc and id asc
[**getBulkUploads**](CompanyApi.md#getBulkUploads) | **GET** /companies/{id}/documents/bulk_uploads | Return bulk uploads
[**getCompanies**](CompanyApi.md#getCompanies) | **GET** /companies | Get list of Companies
[**getCompany**](CompanyApi.md#getCompany) | **GET** /companies/{id} | Get a Company
[**getDetailsErrorsGrouped**](CompanyApi.md#getDetailsErrorsGrouped) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/grouped_errors | Return bulk upload details grouped by status



## createBulkUpload

> V1EntitiesBulkUpload createBulkUpload(id, createBulkUploadRequest)

Create bulk upload record

Create bulk upload record

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let id = 56; // Number | The company id
let createBulkUploadRequest = new Api.CreateBulkUploadRequest(); // CreateBulkUploadRequest | 
apiInstance.createBulkUpload(id, createBulkUploadRequest, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **Number**| The company id | 
 **createBulkUploadRequest** | [**CreateBulkUploadRequest**](CreateBulkUploadRequest.md)|  | 

### Return type

[**V1EntitiesBulkUpload**](V1EntitiesBulkUpload.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## createBulkUploadDetail

> V1EntitiesBulkUploadDetail createBulkUploadDetail(bulkUploadId, companyId, createBulkUploadDetailRequest)

Create a BulkUploadDetail class record

Create a BulkUploadDetail class record

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let bulkUploadId = "bulkUploadId_example"; // String | The Bulk upload ID from which detail is associated with
let companyId = 56; // Number | 
let createBulkUploadDetailRequest = new Api.CreateBulkUploadDetailRequest(); // CreateBulkUploadDetailRequest | 
apiInstance.createBulkUploadDetail(bulkUploadId, companyId, createBulkUploadDetailRequest, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bulkUploadId** | **String**| The Bulk upload ID from which detail is associated with | 
 **companyId** | **Number**|  | 
 **createBulkUploadDetailRequest** | [**CreateBulkUploadDetailRequest**](CreateBulkUploadDetailRequest.md)|  | 

### Return type

[**V1EntitiesBulkUploadDetail**](V1EntitiesBulkUploadDetail.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## createCompany

> V1EntitiesCompany createCompany(createCompanyRequest)

Create new company

Creates a new company.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let createCompanyRequest = new Api.CreateCompanyRequest(); // CreateCompanyRequest | 
apiInstance.createCompany(createCompanyRequest, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **createCompanyRequest** | [**CreateCompanyRequest**](CreateCompanyRequest.md)|  | 

### Return type

[**V1EntitiesCompany**](V1EntitiesCompany.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## getBulkUploadDetails

> V1EntitiesBulkUploadDetails getBulkUploadDetails(companyId, bulkUploadId)

Return full list of bulk upload details order by status desc and id asc

Return full list of bulk upload details

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let companyId = 56; // Number | 
let bulkUploadId = 56; // Number | 
apiInstance.getBulkUploadDetails(companyId, bulkUploadId, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **companyId** | **Number**|  | 
 **bulkUploadId** | **Number**|  | 

### Return type

[**V1EntitiesBulkUploadDetails**](V1EntitiesBulkUploadDetails.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getBulkUploads

> V1EntitiesBulkUploads getBulkUploads(id, opts)

Return bulk uploads

Return bulk uploads

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let id = 56; // Number | 
let opts = {
  'page': 1, // Number | Page offset to fetch.
  'perPage': 25, // Number | Number of results to return per page.
  'offset': 0 // Number | Pad a number of results.
};
apiInstance.getBulkUploads(id, opts, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **Number**|  | 
 **page** | **Number**| Page offset to fetch. | [optional] [default to 1]
 **perPage** | **Number**| Number of results to return per page. | [optional] [default to 25]
 **offset** | **Number**| Pad a number of results. | [optional] [default to 0]

### Return type

[**V1EntitiesBulkUploads**](V1EntitiesBulkUploads.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getCompanies

> V1EntitiesCompany getCompanies(opts)

Get list of Companies

Get companies

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let opts = {
  'page': 1, // Number | Page offset to fetch.
  'perPage': 25, // Number | Number of results to return per page.
  'offset': 0 // Number | Pad a number of results.
};
apiInstance.getCompanies(opts, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **page** | **Number**| Page offset to fetch. | [optional] [default to 1]
 **perPage** | **Number**| Number of results to return per page. | [optional] [default to 25]
 **offset** | **Number**| Pad a number of results. | [optional] [default to 0]

### Return type

[**V1EntitiesCompany**](V1EntitiesCompany.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getCompany

> V1EntitiesCompany getCompany(id)

Get a Company

Get a Company.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let id = 56; // Number | 
apiInstance.getCompany(id, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **Number**|  | 

### Return type

[**V1EntitiesCompany**](V1EntitiesCompany.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getDetailsErrorsGrouped

> V1EntitiesBulkUploadDetails getDetailsErrorsGrouped(companyId, bulkUploadId)

Return bulk upload details grouped by status

Return bulk upload details grouped by status

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let companyId = 56; // Number | 
let bulkUploadId = 56; // Number | 
apiInstance.getDetailsErrorsGrouped(companyId, bulkUploadId, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **companyId** | **Number**|  | 
 **bulkUploadId** | **Number**|  | 

### Return type

[**V1EntitiesBulkUploadDetails**](V1EntitiesBulkUploadDetails.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

