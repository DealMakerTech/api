# DealMakerAPI::ReservationApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**create_reservation**](ReservationApi.md#create_reservation) | **POST** /ttw/reservations | Create a new reservation |
| [**get_ttw_reservation**](ReservationApi.md#get_ttw_reservation) | **GET** /ttw/reservations/{id} | Gets a TTW reservation |


## create_reservation

> <V1EntitiesTtwReservationCreate> create_reservation(create_reservation_request)

Create a new reservation

Create a new reservation

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::ReservationApi.new
create_reservation_request = DealMakerAPI::CreateReservationRequest.new({campaign_id: 37, email: 'email_example'}) # CreateReservationRequest | 

begin
  # Create a new reservation
  result = api_instance.create_reservation(create_reservation_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling ReservationApi->create_reservation: #{e}"
end
```

#### Using the create_reservation_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesTtwReservationCreate>, Integer, Hash)> create_reservation_with_http_info(create_reservation_request)

```ruby
begin
  # Create a new reservation
  data, status_code, headers = api_instance.create_reservation_with_http_info(create_reservation_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesTtwReservationCreate>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling ReservationApi->create_reservation_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **create_reservation_request** | [**CreateReservationRequest**](CreateReservationRequest.md) |  |  |

### Return type

[**V1EntitiesTtwReservationCreate**](V1EntitiesTtwReservationCreate.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## get_ttw_reservation

> <V1EntitiesTtwReservationResponse> get_ttw_reservation(id)

Gets a TTW reservation

Gets a TTW reservation

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::ReservationApi.new
id = 56 # Integer | 

begin
  # Gets a TTW reservation
  result = api_instance.get_ttw_reservation(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling ReservationApi->get_ttw_reservation: #{e}"
end
```

#### Using the get_ttw_reservation_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesTtwReservationResponse>, Integer, Hash)> get_ttw_reservation_with_http_info(id)

```ruby
begin
  # Gets a TTW reservation
  data, status_code, headers = api_instance.get_ttw_reservation_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesTtwReservationResponse>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling ReservationApi->get_ttw_reservation_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |

### Return type

[**V1EntitiesTtwReservationResponse**](V1EntitiesTtwReservationResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

