# DealMaker\ReservationApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createReservation()**](ReservationApi.md#createReservation) | **POST** /ttw/reservations | Create a new reservation |


## `createReservation()`

```php
createReservation($create_reservation_request): \DealMaker\Model\V1EntitiesTtwReservation
```

Create a new reservation

Create a new reservation

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new DealMaker\Api\ReservationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_reservation_request = new \DealMaker\Model\CreateReservationRequest(); // \DealMaker\Model\CreateReservationRequest

try {
    $result = $apiInstance->createReservation($create_reservation_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReservationApi->createReservation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_reservation_request** | [**\DealMaker\Model\CreateReservationRequest**](../Model/CreateReservationRequest.md)|  | |

### Return type

[**\DealMaker\Model\V1EntitiesTtwReservation**](../Model/V1EntitiesTtwReservation.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
