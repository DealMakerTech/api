# Api.TtwCampaignsApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getTtwCampaignPage**](TtwCampaignsApi.md#getTtwCampaignPage) | **GET** /ttw/campaigns/{id}/page | Get ttw campaign page
[**publishTtwCampaignPage**](TtwCampaignsApi.md#publishTtwCampaignPage) | **PATCH** /ttw/campaigns/{id}/page/publish | Publish ttw campaign page



## getTtwCampaignPage

> V1EntitiesPage getTtwCampaignPage(id)

Get ttw campaign page

Get ttw campaign page

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.TtwCampaignsApi();
let id = 56; // Number | 
apiInstance.getTtwCampaignPage(id, (error, data, response) => {
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


## publishTtwCampaignPage

> V1EntitiesPage publishTtwCampaignPage(id)

Publish ttw campaign page

Publish ttw campaign page

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.TtwCampaignsApi();
let id = 56; // Number | 
apiInstance.publishTtwCampaignPage(id, (error, data, response) => {
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

