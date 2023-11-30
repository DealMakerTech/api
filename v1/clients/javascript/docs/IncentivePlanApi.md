# Api.IncentivePlanApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDealIncentivePlansTime**](IncentivePlanApi.md#getDealIncentivePlansTime) | **GET** /deals/{id}/incentive_plans/time | Get incentive plans by deal id



## getDealIncentivePlansTime

> V1EntitiesDealsPriceDetails getDealIncentivePlansTime(id, opts)

Get incentive plans by deal id

Gets incentive plans with time tiers from the deal given deal id.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.IncentivePlanApi();
let id = 56; // Number | The deal id.
let opts = {
  'page': 1, // Number | Page offset to fetch.
  'perPage': 25, // Number | Number of results to return per page.
  'offset': 0 // Number | Pad a number of results.
};
apiInstance.getDealIncentivePlansTime(id, opts, (error, data, response) => {
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

### Return type

[**V1EntitiesDealsPriceDetails**](V1EntitiesDealsPriceDetails.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

