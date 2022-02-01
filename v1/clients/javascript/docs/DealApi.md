# Dealmakerapi.DealApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDealsId**](DealApi.md#getDealsId) | **GET** /deals/{id} | Get a deal by id



## getDealsId

> V1EntitiesDeal getDealsId(id)

Get a deal by id

Get a deal

### Example

```javascript
import Dealmakerapi from 'dealmakerapi';
let defaultClient = Dealmakerapi.ApiClient.instance;

let apiInstance = new Dealmakerapi.DealApi();
let id = 56; // Number | The deal id.
apiInstance.getDealsId(id, (error, data, response) => {
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

