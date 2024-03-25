# Api.CompanyApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createBulkUpload**](CompanyApi.md#createBulkUpload) | **POST** /companies/{id}/documents/bulk_uploads | Create bulk upload record
[**createBulkUploadDetail**](CompanyApi.md#createBulkUploadDetail) | **POST** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details | Create a BulkUploadDetail class record
[**createCompany**](CompanyApi.md#createCompany) | **POST** /companies | Create new company
[**createEmailTemplate**](CompanyApi.md#createEmailTemplate) | **POST** /companies/{id}/news_releases/email_template | Creates an email template
[**createMembersBulkUpload**](CompanyApi.md#createMembersBulkUpload) | **POST** /companies/{id}/members/bulk_uploads | Create bulk upload record
[**createShareholderAction**](CompanyApi.md#createShareholderAction) | **POST** /companies/{company_id}/shareholders/{shareholder_id}/actions | Create a shareholder action
[**getBulkUpload**](CompanyApi.md#getBulkUpload) | **GET** /companies/{id}/documents/bulk_uploads/{bulk_upload_id} | Return a given bulk upload by id
[**getBulkUploadDetailsErrors**](CompanyApi.md#getBulkUploadDetailsErrors) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/errors | Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc
[**getBulkUploads**](CompanyApi.md#getBulkUploads) | **GET** /companies/{id}/documents/bulk_uploads | Return bulk uploads
[**getCompanies**](CompanyApi.md#getCompanies) | **GET** /companies | Get list of Companies
[**getCompany**](CompanyApi.md#getCompany) | **GET** /companies/{id} | Get a Company
[**getDetailsErrorsGrouped**](CompanyApi.md#getDetailsErrorsGrouped) | **GET** /companies/{company_id}/documents/bulk_uploads/{bulk_upload_id}/details/grouped_errors | Return bulk upload details grouped by status
[**getDividends**](CompanyApi.md#getDividends) | **GET** /companies/{company_id}/portal/dividends | Return dividends
[**getEmailEvents**](CompanyApi.md#getEmailEvents) | **GET** /companies/{company_communication_id}/email_events | Get a list of email events for a company communication
[**getEmailTemplate**](CompanyApi.md#getEmailTemplate) | **GET** /companies/{id}/news_releases/email_template/{template_id} | Get a email template
[**getEmailTemplates**](CompanyApi.md#getEmailTemplates) | **GET** /companies/{id}/news_releases/email_templates | Get list of email template
[**getMembersBulkUpload**](CompanyApi.md#getMembersBulkUpload) | **GET** /companies/{id}/members/bulk_uploads/{id_members_bulk_upload} | Get bulk upload record
[**getMembersBulkUploads**](CompanyApi.md#getMembersBulkUploads) | **GET** /companies/{id}/members/bulk_uploads | Get bulk uploads records
[**getShareholderLedger**](CompanyApi.md#getShareholderLedger) | **GET** /companies/{id}/shareholder_ledger | Get shareholder ledger by company
[**getUserAccessibleCompanies**](CompanyApi.md#getUserAccessibleCompanies) | **GET** /users/accessible_companies | Get list of all Companies accessible by the user
[**sendPortalInvite**](CompanyApi.md#sendPortalInvite) | **POST** /companies/{id}/shareholders/{shareholder_id}/send_portal_invite | Send portal invite to shareholder



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


## createEmailTemplate

> V1EntitiesEmailTemplate createEmailTemplate(id, createEmailTemplateRequest)

Creates an email template

Create new email template

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let id = 56; // Number | 
let createEmailTemplateRequest = new Api.CreateEmailTemplateRequest(); // CreateEmailTemplateRequest | 
apiInstance.createEmailTemplate(id, createEmailTemplateRequest, (error, data, response) => {
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
 **createEmailTemplateRequest** | [**CreateEmailTemplateRequest**](CreateEmailTemplateRequest.md)|  | 

### Return type

[**V1EntitiesEmailTemplate**](V1EntitiesEmailTemplate.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## createMembersBulkUpload

> V1EntitiesMembersBulkUpload createMembersBulkUpload(id, createMembersBulkUploadRequest)

Create bulk upload record

Create members bulk upload record

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let id = 56; // Number | The company id
let createMembersBulkUploadRequest = new Api.CreateMembersBulkUploadRequest(); // CreateMembersBulkUploadRequest | 
apiInstance.createMembersBulkUpload(id, createMembersBulkUploadRequest, (error, data, response) => {
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
 **createMembersBulkUploadRequest** | [**CreateMembersBulkUploadRequest**](CreateMembersBulkUploadRequest.md)|  | 

### Return type

[**V1EntitiesMembersBulkUpload**](V1EntitiesMembersBulkUpload.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## createShareholderAction

> V1EntitiesGenericResponse createShareholderAction(companyId, shareholderId, createShareholderActionRequest)

Create a shareholder action

Create a shareholder action

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let companyId = 56; // Number | The company id
let shareholderId = 56; // Number | The shareholder id
let createShareholderActionRequest = new Api.CreateShareholderActionRequest(); // CreateShareholderActionRequest | 
apiInstance.createShareholderAction(companyId, shareholderId, createShareholderActionRequest, (error, data, response) => {
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
 **companyId** | **Number**| The company id | 
 **shareholderId** | **Number**| The shareholder id | 
 **createShareholderActionRequest** | [**CreateShareholderActionRequest**](CreateShareholderActionRequest.md)|  | 

### Return type

[**V1EntitiesGenericResponse**](V1EntitiesGenericResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## getBulkUpload

> V1EntitiesBulkUpload getBulkUpload(id, bulkUploadId, opts)

Return a given bulk upload by id

Return a given bulk upload by id

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let id = 56; // Number | 
let bulkUploadId = 56; // Number | 
let opts = {
  'page': 1, // Number | Page offset to fetch.
  'perPage': 25, // Number | Number of results to return per page.
  'offset': 0 // Number | Pad a number of results.
};
apiInstance.getBulkUpload(id, bulkUploadId, opts, (error, data, response) => {
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
 **bulkUploadId** | **Number**|  | 
 **page** | **Number**| Page offset to fetch. | [optional] [default to 1]
 **perPage** | **Number**| Number of results to return per page. | [optional] [default to 25]
 **offset** | **Number**| Pad a number of results. | [optional] [default to 0]

### Return type

[**V1EntitiesBulkUpload**](V1EntitiesBulkUpload.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getBulkUploadDetailsErrors

> V1EntitiesBulkUploadDetails getBulkUploadDetailsErrors(companyId, bulkUploadId)

Returns a full list of details with errors of the given bulk upload ordered by status desc and id asc

Returns a full list of details with errors of the given bulk upload

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let companyId = 56; // Number | 
let bulkUploadId = 56; // Number | 
apiInstance.getBulkUploadDetailsErrors(companyId, bulkUploadId, (error, data, response) => {
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


## getDividends

> V1EntitiesDividends getDividends(companyId)

Return dividends

Return dividends associated with a shareholder

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let companyId = 56; // Number | 
apiInstance.getDividends(companyId, (error, data, response) => {
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

### Return type

[**V1EntitiesDividends**](V1EntitiesDividends.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getEmailEvents

> V1EntitiesEmailEvents getEmailEvents(companyCommunicationId)

Get a list of email events for a company communication

Gets a list of email events for a specific company communication.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let companyCommunicationId = 56; // Number | The id of the company communication.
apiInstance.getEmailEvents(companyCommunicationId, (error, data, response) => {
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
 **companyCommunicationId** | **Number**| The id of the company communication. | 

### Return type

[**V1EntitiesEmailEvents**](V1EntitiesEmailEvents.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getEmailTemplate

> V1EntitiesEmailTemplate getEmailTemplate(id, templateId)

Get a email template

Get a email template

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let id = 56; // Number | The company id
let templateId = 56; // Number | The email template id
apiInstance.getEmailTemplate(id, templateId, (error, data, response) => {
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
 **templateId** | **Number**| The email template id | 

### Return type

[**V1EntitiesEmailTemplate**](V1EntitiesEmailTemplate.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getEmailTemplates

> V1EntitiesEmailTemplate getEmailTemplates(id, opts)

Get list of email template

Get list of email template

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let id = 56; // Number | The company id
let opts = {
  'page': 0, // Number | The page number
  'perPage': 10, // Number | The number of items per page
  'publicTemplate': false // Boolean | The public template
};
apiInstance.getEmailTemplates(id, opts, (error, data, response) => {
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
 **page** | **Number**| The page number | [optional] [default to 0]
 **perPage** | **Number**| The number of items per page | [optional] [default to 10]
 **publicTemplate** | **Boolean**| The public template | [optional] [default to false]

### Return type

[**V1EntitiesEmailTemplate**](V1EntitiesEmailTemplate.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getMembersBulkUpload

> V1EntitiesMembersBulkUpload getMembersBulkUpload(id, idMembersBulkUpload)

Get bulk upload record

Get members bulk upload record

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let id = 56; // Number | The company id
let idMembersBulkUpload = 56; // Number | The bulk upload id
apiInstance.getMembersBulkUpload(id, idMembersBulkUpload, (error, data, response) => {
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
 **idMembersBulkUpload** | **Number**| The bulk upload id | 

### Return type

[**V1EntitiesMembersBulkUpload**](V1EntitiesMembersBulkUpload.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getMembersBulkUploads

> V1EntitiesMembersBulkUploads getMembersBulkUploads(id)

Get bulk uploads records

Get members bulk uploads records

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let id = 56; // Number | The company id
apiInstance.getMembersBulkUploads(id, (error, data, response) => {
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

### Return type

[**V1EntitiesMembersBulkUploads**](V1EntitiesMembersBulkUploads.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getShareholderLedger

> V1EntitiesShareholderLedger getShareholderLedger(id)

Get shareholder ledger by company

Get shareholder ledger by company.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let id = 56; // Number | 
apiInstance.getShareholderLedger(id, (error, data, response) => {
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

[**V1EntitiesShareholderLedger**](V1EntitiesShareholderLedger.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getUserAccessibleCompanies

> V1EntitiesCompany getUserAccessibleCompanies(opts)

Get list of all Companies accessible by the user

Get user accessible companies

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
apiInstance.getUserAccessibleCompanies(opts, (error, data, response) => {
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


## sendPortalInvite

> sendPortalInvite(id, shareholderId, opts)

Send portal invite to shareholder

Send portal invite to shareholder.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CompanyApi();
let id = 56; // Number | 
let shareholderId = 56; // Number | 
let opts = {
  'sendPortalInviteRequest': new Api.SendPortalInviteRequest() // SendPortalInviteRequest | 
};
apiInstance.sendPortalInvite(id, shareholderId, opts, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully.');
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **Number**|  | 
 **shareholderId** | **Number**|  | 
 **sendPortalInviteRequest** | [**SendPortalInviteRequest**](SendPortalInviteRequest.md)|  | [optional] 

### Return type

null (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined

