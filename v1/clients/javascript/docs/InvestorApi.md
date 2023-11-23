# Api.InvestorApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**add506cDocument**](InvestorApi.md#add506cDocument) | **POST** /deals/{id}/investors/{investor_id}/add_506c_document | Add 506c document for deal investor
[**addDocument**](InvestorApi.md#addDocument) | **POST** /deals/{id}/investors/{investor_id}/add_document | Add document for deal investor
[**bulkUploadInvestors**](InvestorApi.md#bulkUploadInvestors) | **POST** /deals/{id}/investors/bulk_upload | Bulk upload investors for deal investor
[**createInvestor**](InvestorApi.md#createInvestor) | **POST** /deals/{id}/investors | Create a deal investor
[**deleteDocument**](InvestorApi.md#deleteDocument) | **DELETE** /deals/{id}/investors/{investor_id}/delete_document/{document_id} | Delete document for deal investor
[**deleteInvestorProfile**](InvestorApi.md#deleteInvestorProfile) | **DELETE** /investor_profiles/{type}/{id} | Delete investor profile.
[**editInvestorTags**](InvestorApi.md#editInvestorTags) | **POST** /deals/{id}/investors/{investor_id}/edit_tags | Append or replace tag(s) for a specific investor
[**getEnforcements**](InvestorApi.md#getEnforcements) | **GET** /deals/{id}/investors/{investor_id}/background_checks/{search_entity_id}/enforcements | Get enforcements for a background search
[**getIncentivePlan**](InvestorApi.md#getIncentivePlan) | **GET** /deals/{id}/investors/{investor_id}/incentive_plan | Get investor incentive plan by investor id
[**getInvestor**](InvestorApi.md#getInvestor) | **GET** /deals/{id}/investors/{investor_id} | Get a deal investor by id
[**getInvestorOtpLink**](InvestorApi.md#getInvestorOtpLink) | **GET** /deals/{id}/investors/{investor_id}/otp_access_link | Get OTP access link for deal investor
[**listInvestors**](InvestorApi.md#listInvestors) | **GET** /deals/{id}/investors | List deal investors
[**patchInvestor**](InvestorApi.md#patchInvestor) | **PATCH** /deals/{id}/investors/{investor_id} | Patch a deal investor
[**runBackgroundSearch**](InvestorApi.md#runBackgroundSearch) | **POST** /deals/{id}/investors/{investor_id}/background_checks/run | Run Alloy background search for the investor
[**updateInvestor**](InvestorApi.md#updateInvestor) | **PUT** /deals/{id}/investors/{investor_id} | Update a deal investor



## add506cDocument

> V1EntitiesInvestor add506cDocument(id, investorId, add506cDocumentRequest)

Add 506c document for deal investor

Add 506c document for deal investor

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | The deal id.
let investorId = 56; // Number | The investor id.
let add506cDocumentRequest = new Api.Add506cDocumentRequest(); // Add506cDocumentRequest | 
apiInstance.add506cDocument(id, investorId, add506cDocumentRequest, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 
 **investorId** | **Number**| The investor id. | 
 **add506cDocumentRequest** | [**Add506cDocumentRequest**](Add506cDocumentRequest.md)|  | 

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## addDocument

> V1EntitiesInvestor addDocument(id, investorId, addDocumentRequest)

Add document for deal investor

Add document for deal investor

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | The deal id.
let investorId = 56; // Number | The investor id.
let addDocumentRequest = new Api.AddDocumentRequest(); // AddDocumentRequest | 
apiInstance.addDocument(id, investorId, addDocumentRequest, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 
 **investorId** | **Number**| The investor id. | 
 **addDocumentRequest** | [**AddDocumentRequest**](AddDocumentRequest.md)|  | 

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## bulkUploadInvestors

> V1EntitiesInvestor bulkUploadInvestors(id, bulkUploadInvestorsRequest)

Bulk upload investors for deal investor

Bulk upload investors

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | The deal id.
let bulkUploadInvestorsRequest = new Api.BulkUploadInvestorsRequest(); // BulkUploadInvestorsRequest | 
apiInstance.bulkUploadInvestors(id, bulkUploadInvestorsRequest, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 
 **bulkUploadInvestorsRequest** | [**BulkUploadInvestorsRequest**](BulkUploadInvestorsRequest.md)|  | 

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## createInvestor

> V1EntitiesInvestor createInvestor(id, dealsIdInvestors)

Create a deal investor

Create a single deal investor.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | The deal id.
let dealsIdInvestors = new Api.PostDealsIdInvestors(); // PostDealsIdInvestors | 
apiInstance.createInvestor(id, dealsIdInvestors, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 
 **dealsIdInvestors** | [**PostDealsIdInvestors**](PostDealsIdInvestors.md)|  | 

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## deleteDocument

> deleteDocument(id, investorId, documentId)

Delete document for deal investor

Delete document for deal investor

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | 
let investorId = 56; // Number | 
let documentId = 56; // Number | 
apiInstance.deleteDocument(id, investorId, documentId, (error, data, response) => {
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
 **investorId** | **Number**|  | 
 **documentId** | **Number**|  | 

### Return type

null (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined


## deleteInvestorProfile

> deleteInvestorProfile(type, id)

Delete investor profile.

Deletes the investor profile.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let type = 56; // Number | 
let id = 56; // Number | 
apiInstance.deleteInvestorProfile(type, id, (error, data, response) => {
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
 **type** | **Number**|  | 
 **id** | **Number**|  | 

### Return type

null (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined


## editInvestorTags

> V1EntitiesInvestor editInvestorTags(id, investorId, editInvestorTagsRequest)

Append or replace tag(s) for a specific investor

Edit investor tag

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | 
let investorId = 56; // Number | 
let editInvestorTagsRequest = new Api.EditInvestorTagsRequest(); // EditInvestorTagsRequest | 
apiInstance.editInvestorTags(id, investorId, editInvestorTagsRequest, (error, data, response) => {
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
 **investorId** | **Number**|  | 
 **editInvestorTagsRequest** | [**EditInvestorTagsRequest**](EditInvestorTagsRequest.md)|  | 

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## getEnforcements

> V1EntitiesInvestor getEnforcements(id, investorId, searchEntityId)

Get enforcements for a background search

Get enforcements for a background search

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | 
let investorId = 56; // Number | 
let searchEntityId = 56; // Number | 
apiInstance.getEnforcements(id, investorId, searchEntityId, (error, data, response) => {
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
 **investorId** | **Number**|  | 
 **searchEntityId** | **Number**|  | 

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getIncentivePlan

> V1EntitiesDealsPriceDetails getIncentivePlan(id, investorId)

Get investor incentive plan by investor id

Gets a single investor incentive plan by the investor id.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | The deal id.
let investorId = 56; // Number | The investor id.
apiInstance.getIncentivePlan(id, investorId, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 
 **investorId** | **Number**| The investor id. | 

### Return type

[**V1EntitiesDealsPriceDetails**](V1EntitiesDealsPriceDetails.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getInvestor

> V1EntitiesInvestor getInvestor(id, investorId)

Get a deal investor by id

Gets a single investor by the id.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | The deal id.
let investorId = 56; // Number | The investor id.
apiInstance.getInvestor(id, investorId, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 
 **investorId** | **Number**| The investor id. | 

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getInvestorOtpLink

> V1EntitiesInvestorOtpAccessLink getInvestorOtpLink(id, investorId)

Get OTP access link for deal investor

The access link for the investor. This is the access link for the specific investment, not the user.                       If the same user has multiple investments, each one will have a different access link.                       Please note that this access link expires every hour. In order to redirect the investor into their authentication screen,                       use the https://app.dealmaker.tech/deals/{{deal_id}}/investors/{{investor_id}}/otp_access url.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | The deal id.
let investorId = 56; // Number | The investor id.
apiInstance.getInvestorOtpLink(id, investorId, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 
 **investorId** | **Number**| The investor id. | 

### Return type

[**V1EntitiesInvestorOtpAccessLink**](V1EntitiesInvestorOtpAccessLink.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## listInvestors

> V1EntitiesInvestors listInvestors(id, opts)

List deal investors

List deal investors according to the specified search criteria.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | The deal id.
let opts = {
  'page': 1, // Number | Page offset to fetch.
  'perPage': 25, // Number | Number of results to return per page.
  'offset': 0, // Number | Pad a number of results.
  'investorIds': [null], // [Number] | An array of investor ids.
  'q': "q_example" // String | The search query for investors. For additional information on filtering and seach, click [here](#section/Search-and-Filtering-(The-q-parameter)/Keyword-filtering)
};
apiInstance.listInvestors(id, opts, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 
 **page** | **Number**| Page offset to fetch. | [optional] [default to 1]
 **perPage** | **Number**| Number of results to return per page. | [optional] [default to 25]
 **offset** | **Number**| Pad a number of results. | [optional] [default to 0]
 **investorIds** | [**[Number]**](Number.md)| An array of investor ids. | [optional] 
 **q** | **String**| The search query for investors. For additional information on filtering and seach, click [here](#section/Search-and-Filtering-(The-q-parameter)/Keyword-filtering) | [optional] 

### Return type

[**V1EntitiesInvestors**](V1EntitiesInvestors.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## patchInvestor

> V1EntitiesInvestor patchInvestor(id, investorId, patchInvestorRequest)

Patch a deal investor

Patch deal investor

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | The deal id.
let investorId = 56; // Number | The investor id.
let patchInvestorRequest = new Api.PatchInvestorRequest(); // PatchInvestorRequest | 
apiInstance.patchInvestor(id, investorId, patchInvestorRequest, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 
 **investorId** | **Number**| The investor id. | 
 **patchInvestorRequest** | [**PatchInvestorRequest**](PatchInvestorRequest.md)|  | 

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## runBackgroundSearch

> V1EntitiesInvestor runBackgroundSearch(id, investorId, runBackgroundSearchRequest)

Run Alloy background search for the investor

Run Alloy background search for the investor

### Example

```javascript
import Api from 'api';

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | 
let investorId = 56; // Number | 
let runBackgroundSearchRequest = new Api.RunBackgroundSearchRequest(); // RunBackgroundSearchRequest | 
apiInstance.runBackgroundSearch(id, investorId, runBackgroundSearchRequest, (error, data, response) => {
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
 **investorId** | **Number**|  | 
 **runBackgroundSearchRequest** | [**RunBackgroundSearchRequest**](RunBackgroundSearchRequest.md)|  | 

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## updateInvestor

> V1EntitiesInvestor updateInvestor(id, investorId, dealsIdInvestors)

Update a deal investor

Update deal investor

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | The deal id.
let investorId = 56; // Number | The investor id.
let dealsIdInvestors = new Api.PutDealsIdInvestors(); // PutDealsIdInvestors | 
apiInstance.updateInvestor(id, investorId, dealsIdInvestors, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 
 **investorId** | **Number**| The investor id. | 
 **dealsIdInvestors** | [**PutDealsIdInvestors**](PutDealsIdInvestors.md)|  | 

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

