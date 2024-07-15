# Api.ShwApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getShwPage**](ShwApi.md#getShwPage) | **GET** /shw/{id}/page | Get self hosted website page
[**publishShwPage**](ShwApi.md#publishShwPage) | **PATCH** /shw/{id}/page/publish | Publish self hosted website page



## getShwPage

> V1EntitiesPage getShwPage(id)

Get self hosted website page

Get self hosted website page

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.ShwApi();
let id = 56; // Number | 
apiInstance.getShwPage(id, (error, data, response) => {
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

[**V1EntitiesPage**](V1EntitiesPage.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## publishShwPage

> V1EntitiesPage publishShwPage(id)

Publish self hosted website page

Publish self hosted website page

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.ShwApi();
let id = 56; // Number | 
apiInstance.publishShwPage(id, (error, data, response) => {
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

[**V1EntitiesPage**](V1EntitiesPage.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

