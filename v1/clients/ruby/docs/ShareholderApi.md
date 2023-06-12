# DealMakerAPI::ShareholderApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**get_shareholders**](ShareholderApi.md#get_shareholders) | **GET** /companies/{id}/shareholders | Get a company shareholders list |


## get_shareholders

> <V1EntitiesShareholders> get_shareholders(id)

Get a company shareholders list

Gets a list of company shareholders.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::ShareholderApi.new
id = 56 # Integer | The company id.

begin
  # Get a company shareholders list
  result = api_instance.get_shareholders(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling ShareholderApi->get_shareholders: #{e}"
end
```

#### Using the get_shareholders_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesShareholders>, Integer, Hash)> get_shareholders_with_http_info(id)

```ruby
begin
  # Get a company shareholders list
  data, status_code, headers = api_instance.get_shareholders_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesShareholders>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling ShareholderApi->get_shareholders_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The company id. |  |

### Return type

[**V1EntitiesShareholders**](V1EntitiesShareholders.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

