# Api.ReservationApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createReservation**](ReservationApi.md#createReservation) | **POST** /ttw/reservations | Create a new reservation
[**getTtwReservation**](ReservationApi.md#getTtwReservation) | **GET** /ttw/reservations/{id} | Gets a TTW reservation



## createReservation

> V1EntitiesTtwReservationCreate createReservation(createReservationRequest)

Create a new reservation

Create a new reservation

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.ReservationApi();
let createReservationRequest = new Api.CreateReservationRequest(); // CreateReservationRequest | 
apiInstance.createReservation(createReservationRequest, (error, data, response) => {
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
 **createReservationRequest** | [**CreateReservationRequest**](CreateReservationRequest.md)|  | 

### Return type

[**V1EntitiesTtwReservationCreate**](V1EntitiesTtwReservationCreate.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## getTtwReservation

> V1EntitiesTtwReservationResponse getTtwReservation(id)

Gets a TTW reservation

Gets a TTW reservation

### Example

```javascript
import Api from 'api';
let defaultClient = Api.ApiClient.instance;

let apiInstance = new Api.ReservationApi();
let id = 56; // Number | 
apiInstance.getTtwReservation(id, (error, data, response) => {
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

[**V1EntitiesTtwReservationResponse**](V1EntitiesTtwReservationResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

