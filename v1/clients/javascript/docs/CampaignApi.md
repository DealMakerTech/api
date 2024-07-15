# Api.CampaignApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getTtwCampaign**](CampaignApi.md#getTtwCampaign) | **GET** /ttw/campaigns/{id} | Gets a TTW campaign for a given company
[**getTtwCampaigns**](CampaignApi.md#getTtwCampaigns) | **GET** /ttw/companies/{company_id}/campaigns | Gets a list TTW campaigns for a given company
[**getUserTtwReservation**](CampaignApi.md#getUserTtwReservation) | **GET** /ttw/campaign/{id}/reservation/{reservation_uuid} | Gets User ID for a TTW reservation



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


## getTtwCampaigns

> V1EntitiesTtwCampaignList getTtwCampaigns(companyId)

Gets a list TTW campaigns for a given company

Gets a list TTW campaigns for a given company

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CampaignApi();
let companyId = 56; // Number | 
apiInstance.getTtwCampaigns(companyId, (error, data, response) => {
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
 **companyId** | **Number**|  | 

### Return type

[**V1EntitiesTtwCampaignList**](V1EntitiesTtwCampaignList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## getUserTtwReservation

> V1EntitiesTtwReservationGetResponse getUserTtwReservation(id, reservationUuid)

Gets User ID for a TTW reservation

Gets a TTW reservation

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.CampaignApi();
let id = 56; // Number | 
let reservationUuid = 56; // Number | 
apiInstance.getUserTtwReservation(id, reservationUuid, (error, data, response) => {
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
 **reservationUuid** | **Number**|  | 

### Return type

[**V1EntitiesTtwReservationGetResponse**](V1EntitiesTtwReservationGetResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

