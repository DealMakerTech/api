# Api.DealApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getAnalyticsDashboardInfo**](DealApi.md#getAnalyticsDashboardInfo) | **GET** /deals/{id}/analytics_dashboard_info | Get Analytics Dashboard Info
[**getDeal**](DealApi.md#getDeal) | **GET** /deals/{id} | Get deal by Deal ID
[**listDeals**](DealApi.md#listDeals) | **GET** /deals | List available deals



## getAnalyticsDashboardInfo

> Object getAnalyticsDashboardInfo(id, opts)

Get Analytics Dashboard Info

Get Analytics Dashboard Info

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DealApi();
let id = 56; // Number | The deal id.
let opts = {
  'dashboardKey': "dashboardKey_example" // String | The dashboard key.
};
apiInstance.getAnalyticsDashboardInfo(id, opts, (error, data, response) => {
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
 **dashboardKey** | **String**| The dashboard key. | [optional] 

### Return type

**Object**

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getDeal

> V1EntitiesDeal getDeal(id)

Get deal by Deal ID

Gets a single deal using the Deal ID

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DealApi();
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


## listDeals

> V1EntitiesDeals listDeals(opts)

List available deals

List available deals

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DealApi();
let opts = {
  'page': 1, // Number | Page offset to fetch.
  'perPage': 25, // Number | Number of results to return per page.
  'offset': 0 // Number | Pad a number of results.
};
apiInstance.listDeals(opts, (error, data, response) => {
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

[**V1EntitiesDeals**](V1EntitiesDeals.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

