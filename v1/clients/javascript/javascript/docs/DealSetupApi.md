# Api.DealSetupApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createDealSetup**](DealSetupApi.md#createDealSetup) | **POST** /deal_setups | Create deal setup



## createDealSetup

> V1EntitiesDealSetup createDealSetup(createDealSetupRequest)

Create deal setup

Create deal setup

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DealSetupApi();
let createDealSetupRequest = new Api.CreateDealSetupRequest(); // CreateDealSetupRequest | 
apiInstance.createDealSetup(createDealSetupRequest, (error, data, response) => {
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
 **createDealSetupRequest** | [**CreateDealSetupRequest**](CreateDealSetupRequest.md)|  | 

### Return type

[**V1EntitiesDealSetup**](V1EntitiesDealSetup.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

