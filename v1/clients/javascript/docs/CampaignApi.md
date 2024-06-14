# Api.CampaignApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getTtwCampaign**](CampaignApi.md#getTtwCampaign) | **GET** /ttw/campaigns/{id} | Gets a TTW campaign for a given company



## getTtwCampaign

> V1EntitiesTtwCampaignResponse getTtwCampaign(id)

Gets a TTW campaign for a given company

Gets a TTW campaign for a given company

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CampaignApi();
let id = 56; // Number | 
apiInstance.getTtwCampaign(id, (error, data, response) => {
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

[**V1EntitiesTtwCampaignResponse**](V1EntitiesTtwCampaignResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

