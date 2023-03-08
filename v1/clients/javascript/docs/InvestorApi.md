# Api.InvestorApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createInvestor**](InvestorApi.md#createInvestor) | **POST** /deals/{id}/investors | Create a deal investor
[**getInvestor**](InvestorApi.md#getInvestor) | **GET** /deals/{id}/investors/{investor_id} | Get a deal investor by id
[**getInvestorOtpLink**](InvestorApi.md#getInvestorOtpLink) | **GET** /deals/{id}/investors/{investor_id}/otp_access_link | Get OTP access link for deal investor
[**listInvestors**](InvestorApi.md#listInvestors) | **GET** /deals/{id}/investors | List deal investors
[**patchInvestor**](InvestorApi.md#patchInvestor) | **PATCH** /deals/{id}/investors/{investor_id} | Patch a deal investor
[**updateInvestor**](InvestorApi.md#updateInvestor) | **PUT** /deals/{id}/investors/{investor_id} | Update a deal investor



## createInvestor

> V1EntitiesInvestor createInvestor(id, createInvestorRequest)

Create a deal investor

Create a single deal investor.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | The deal id.
let createInvestorRequest = new Api.CreateInvestorRequest(); // CreateInvestorRequest | 
apiInstance.createInvestor(id, createInvestorRequest, (error, data, response) => {
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
 **createInvestorRequest** | [**CreateInvestorRequest**](CreateInvestorRequest.md)|  | 

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
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

Get OTP access link for deal investor by id

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


## updateInvestor

> V1EntitiesInvestor updateInvestor(id, investorId, opts)

Update a deal investor

Update deal investor

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.InvestorApi();
let id = 56; // Number | The deal id.
let investorId = 56; // Number | The investor id.
let opts = {
  'updateInvestorRequest': new Api.UpdateInvestorRequest() // UpdateInvestorRequest | 
};
apiInstance.updateInvestor(id, investorId, opts, (error, data, response) => {
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
 **updateInvestorRequest** | [**UpdateInvestorRequest**](UpdateInvestorRequest.md)|  | [optional] 

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

