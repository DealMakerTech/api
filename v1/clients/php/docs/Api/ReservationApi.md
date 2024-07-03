# DealMaker\ReservationApi

All URIs are relative to http://api.dealmaker.tech, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**createReservation()**](ReservationApi.md#createReservation) | **POST** /ttw/reservations | Create a new reservation |
| [**getTtwReservation()**](ReservationApi.md#getTtwReservation) | **GET** /ttw/reservations/{id} | Gets a TTW reservation |


## `createReservation()`

```php
createReservation($create_reservation_request): \DealMaker\Model\V1EntitiesTtwReservationCreate
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

[**\DealMaker\Model\V1EntitiesTtwReservationCreate**](../Model/V1EntitiesTtwReservationCreate.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getTtwReservation()`

```php
getTtwReservation($id): \DealMaker\Model\V1EntitiesTtwReservationResponse
```

Gets a TTW reservation

Gets a TTW reservation

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
$id = 56; // int

try {
    $result = $apiInstance->getTtwReservation($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ReservationApi->getTtwReservation: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **int**|  | |

### Return type

[**\DealMaker\Model\V1EntitiesTtwReservationResponse**](../Model/V1EntitiesTtwReservationResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
