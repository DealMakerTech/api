# Api.CustomEmailsApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getAccessToken**](CustomEmailsApi.md#getAccessToken) | **POST** /custom_emails/get_access_token | Generate authorization token information for initializing Beefree editor



## getAccessToken

> V1EntitiesBeefreeAccessToken getAccessToken(getAccessTokenRequest)

Generate authorization token information for initializing Beefree editor

Generate authorization token information

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CustomEmailsApi();
let getAccessTokenRequest = new Api.GetAccessTokenRequest(); // GetAccessTokenRequest | 
apiInstance.getAccessToken(getAccessTokenRequest, (error, data, response) => {
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
 **getAccessTokenRequest** | [**GetAccessTokenRequest**](GetAccessTokenRequest.md)|  | 

### Return type

[**V1EntitiesBeefreeAccessToken**](V1EntitiesBeefreeAccessToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

