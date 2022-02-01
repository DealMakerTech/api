# DealMakerAPI::DealApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**get_deals_id**](DealApi.md#get_deals_id) | **GET** /deals/{id} | Get a deal by id |


## get_deals_id

> <V1EntitiesDeal> get_deals_id(id)

Get a deal by id

Get a deal

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DealApi.new
id = 56 # Integer | The deal id.

begin
  # Get a deal by id
  result = api_instance.get_deals_id(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealApi->get_deals_id: #{e}"
end
```

#### Using the get_deals_id_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesDeal>, Integer, Hash)> get_deals_id_with_http_info(id)

```ruby
begin
  # Get a deal by id
  data, status_code, headers = api_instance.get_deals_id_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesDeal>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealApi->get_deals_id_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal id. |  |

### Return type

[**V1EntitiesDeal**](V1EntitiesDeal.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

