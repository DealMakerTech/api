# Api.DefaultApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getWebhooks**](DefaultApi.md#getWebhooks) | **GET** /webhooks | Returns a list of webhook subscription which is associated to the user
[**getWebhooksDealId**](DefaultApi.md#getWebhooksDealId) | **GET** /webhooks/deal/{id} | Finds a deal using the id
[**getWebhooksDealsSearch**](DefaultApi.md#getWebhooksDealsSearch) | **GET** /webhooks/deals/search | Searches for deals for a given user
[**getWebhooksSecurityToken**](DefaultApi.md#getWebhooksSecurityToken) | **GET** /webhooks/security_token | Creates a new security token for webhook subscription
[**postWebhooks**](DefaultApi.md#postWebhooks) | **POST** /webhooks | Creates a webhook subscription which is associated to the user
[**putWebhooksId**](DefaultApi.md#putWebhooksId) | **PUT** /webhooks/{id} | Updates webhook subscription and webhooks subcription deals



## getWebhooks

> V1EntitiesWebhooksSubscription getWebhooks(opts)

Returns a list of webhook subscription which is associated to the user

Returns a list of webhook subscription

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let opts = {
  'page': 1, // Number | Page offset to fetch.
  'perPage': 25, // Number | Number of results to return per page.
  'offset': 0 // Number | Pad a number of results.
};
apiInstance.getWebhooks(opts, (error, data, response) => {
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

[**V1EntitiesWebhooksSubscription**](V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getWebhooksDealId

> V1EntitiesWebhooksDeal getWebhooksDealId(id)

Finds a deal using the id

Returns a deal

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let id = 56; // Number | 
apiInstance.getWebhooksDealId(id, (error, data, response) => {
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
 **id** | **Number**|  | 

### Return type

[**V1EntitiesWebhooksDeal**](V1EntitiesWebhooksDeal.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getWebhooksDealsSearch

> V1EntitiesWebhooksSecurityToken getWebhooksDealsSearch()

Searches for deals for a given user

Searches for deals for a given user

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
apiInstance.getWebhooksDealsSearch((error, data, response) => {
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

[**V1EntitiesWebhooksSecurityToken**](V1EntitiesWebhooksSecurityToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getWebhooksSecurityToken

> V1EntitiesWebhooksSecurityToken getWebhooksSecurityToken()

Creates a new security token for webhook subscription

Creates a new security token for webhook subscription

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
apiInstance.getWebhooksSecurityToken((error, data, response) => {
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

[**V1EntitiesWebhooksSecurityToken**](V1EntitiesWebhooksSecurityToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## postWebhooks

> V1EntitiesWebhooksSubscription postWebhooks(postWebhooksRequest)

Creates a webhook subscription which is associated to the user

Creates new webhook subscription

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let postWebhooksRequest = new Api.PostWebhooksRequest(); // PostWebhooksRequest | 
apiInstance.postWebhooks(postWebhooksRequest, (error, data, response) => {
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
 **postWebhooksRequest** | [**PostWebhooksRequest**](PostWebhooksRequest.md)|  | 

### Return type

[**V1EntitiesWebhooksSubscription**](V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## putWebhooksId

> V1EntitiesWebhooksSubscription putWebhooksId(id, opts)

Updates webhook subscription and webhooks subcription deals

Updates webhook subscription

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.DefaultApi();
let id = 56; // Number | 
let opts = {
  'putWebhooksIdRequest': new Api.PutWebhooksIdRequest() // PutWebhooksIdRequest | 
};
apiInstance.putWebhooksId(id, opts, (error, data, response) => {
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
 **id** | **Number**|  | 
 **putWebhooksIdRequest** | [**PutWebhooksIdRequest**](PutWebhooksIdRequest.md)|  | [optional] 

### Return type

[**V1EntitiesWebhooksSubscription**](V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

