# @DealmakertechApi.InvestorProfileApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createInvestorProfile**](InvestorProfileApi.md#createInvestorProfile) | **POST** /investor_profiles | Create new investor profile



## createInvestorProfile

> V1EntitiesInvestorProfileIndividual createInvestorProfile(UNKNOWN_BASE_TYPE)

Create new investor profile

Create new investor profile associated to the user by email.

### Example

```javascript
import @DealmakertechApi from '@dealmakertech/api';
let defaultClient = @DealmakertechApi.ApiClient.instance;

let apiInstance = new @DealmakertechApi.InvestorProfileApi();
let UNKNOWN_BASE_TYPE = new @DealmakertechApi.UNKNOWN_BASE_TYPE(); // UNKNOWN_BASE_TYPE | 
apiInstance.createInvestorProfile(UNKNOWN_BASE_TYPE, (error, data, response) => {
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
 **UNKNOWN_BASE_TYPE** | [**UNKNOWN_BASE_TYPE**](UNKNOWN_BASE_TYPE.md)|  | 

### Return type

[**V1EntitiesInvestorProfileIndividual**](V1EntitiesInvestorProfileIndividual.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

