# DealMakerAPI::CountryApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**get_country_states**](CountryApi.md#get_country_states) | **GET** /country/states | Returns a list of all valid countries and it states |


## get_country_states

> <V1EntitiesCountries> get_country_states

Returns a list of all valid countries and it states

Get countries and states

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CountryApi.new

begin
  # Returns a list of all valid countries and it states
  result = api_instance.get_country_states
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CountryApi->get_country_states: #{e}"
end
```

#### Using the get_country_states_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesCountries>, Integer, Hash)> get_country_states_with_http_info

```ruby
begin
  # Returns a list of all valid countries and it states
  data, status_code, headers = api_instance.get_country_states_with_http_info
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesCountries>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CountryApi->get_country_states_with_http_info: #{e}"
end
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**V1EntitiesCountries**](V1EntitiesCountries.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

