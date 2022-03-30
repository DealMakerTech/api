# Dealmakerapi.DealApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createInvestor**](DealApi.md#createInvestor) | **POST** /deals/{id}/investors | Create a deal investor
[**getDeal**](DealApi.md#getDeal) | **GET** /deals/{id} | Get a deal by id
[**getInvestor**](DealApi.md#getInvestor) | **GET** /deals/{id}/investors/{investor_id} | Get a deal investor by id
[**listInvestors**](DealApi.md#listInvestors) | **GET** /deals/{id}/investors | List deal investors



## createInvestor

> V1EntitiesInvestor createInvestor(id, UNKNOWN_BASE_TYPE)

Create a deal investor

Create a single deal investor.

### Example

```javascript
import Dealmakerapi from 'dealmakerapi';
let defaultClient = Dealmakerapi.ApiClient.instance;

let apiInstance = new Dealmakerapi.DealApi();
let id = 56; // Number | The deal id.
let UNKNOWN_BASE_TYPE = new Dealmakerapi.UNKNOWN_BASE_TYPE(); // UNKNOWN_BASE_TYPE | 
apiInstance.createInvestor(id, UNKNOWN_BASE_TYPE, (error, data, response) => {
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
 **UNKNOWN_BASE_TYPE** | [**UNKNOWN_BASE_TYPE**](UNKNOWN_BASE_TYPE.md)|  | 

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## getDeal

> V1EntitiesDeal getDeal(id)

Get a deal by id

Get a deal

### Example

```javascript
import Dealmakerapi from 'dealmakerapi';
let defaultClient = Dealmakerapi.ApiClient.instance;

let apiInstance = new Dealmakerapi.DealApi();
let id = 56; // Number | The deal id.
apiInstance.getDeal(id, (error, data, response) => {
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

### Return type

[**V1EntitiesDeal**](V1EntitiesDeal.md)

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
import Dealmakerapi from 'dealmakerapi';
let defaultClient = Dealmakerapi.ApiClient.instance;

let apiInstance = new Dealmakerapi.DealApi();
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


## listInvestors

> V1EntitiesInvestors listInvestors(id, opts)

List deal investors

List deal investors according to the specified search criteria.

### Example

```javascript
import Dealmakerapi from 'dealmakerapi';
let defaultClient = Dealmakerapi.ApiClient.instance;

let apiInstance = new Dealmakerapi.DealApi();
let id = 56; // Number | The deal id.
let opts = {
  'page': 1, // Number | Page offset to fetch.
  'perPage': 25, // Number | Number of results to return per page.
  'offset': 0, // Number | Pad a number of results.
  'investorIds': [null] // [Number] | An array of investor ids.
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

### Return type

[**V1EntitiesInvestors**](V1EntitiesInvestors.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

