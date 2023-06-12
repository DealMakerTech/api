# Api.ShareholderApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getShareholders**](ShareholderApi.md#getShareholders) | **GET** /companies/{id}/shareholders | Get a company shareholders list



## getShareholders

> V1EntitiesShareholders getShareholders(id)

Get a company shareholders list

Gets a list of company shareholders.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.ShareholderApi();
let id = 56; // Number | The company id.
apiInstance.getShareholders(id, (error, data, response) => {
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
 **id** | **Number**| The company id. | 

### Return type

[**V1EntitiesShareholders**](V1EntitiesShareholders.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

