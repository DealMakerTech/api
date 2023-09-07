# Api.CountryApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getCountryStates**](CountryApi.md#getCountryStates) | **GET** /country/states | Returns a list of all valid countries and it states



## getCountryStates

> V1EntitiesCountries getCountryStates()

Returns a list of all valid countries and it states

Get countries and states

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CountryApi();
apiInstance.getCountryStates((error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully. Returned data: ' + data);
  }
});
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**V1EntitiesCountries**](V1EntitiesCountries.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

