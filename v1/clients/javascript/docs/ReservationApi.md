# Api.ReservationApi

All URIs are relative to *http://api.dealmaker.tech*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createReservation**](ReservationApi.md#createReservation) | **POST** /ttw/reservations | Create a new reservation



## createReservation

> V1EntitiesTtwReservation createReservation(createReservationRequest)

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

[**V1EntitiesTtwReservation**](V1EntitiesTtwReservation.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

