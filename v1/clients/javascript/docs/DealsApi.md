# Api.DealsApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**putDealsIdScriptTagEnvironment**](DealsApi.md#putDealsIdScriptTagEnvironment) | **PUT** /deals/{id}/script_tag_environment | Update script tag environment for the deal.



## putDealsIdScriptTagEnvironment

> putDealsIdScriptTagEnvironment(id, putDealsIdScriptTagEnvironmentRequest)

Update script tag environment for the deal.

Update script tag environment for the deal.

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DealsApi();
let id = 56; // Number | The deal id.
let putDealsIdScriptTagEnvironmentRequest = new Api.PutDealsIdScriptTagEnvironmentRequest(); // PutDealsIdScriptTagEnvironmentRequest | 
apiInstance.putDealsIdScriptTagEnvironment(id, putDealsIdScriptTagEnvironmentRequest, (error, data, response) => {
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
 **id** | **Number**| The deal id. | 
 **putDealsIdScriptTagEnvironmentRequest** | [**PutDealsIdScriptTagEnvironmentRequest**](PutDealsIdScriptTagEnvironmentRequest.md)|  | 

### Return type

null (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined

