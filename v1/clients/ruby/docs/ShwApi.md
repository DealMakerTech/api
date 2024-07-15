# DealMakerAPI::ShwApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**get_shw_page**](ShwApi.md#get_shw_page) | **GET** /shw/{id}/page | Get self hosted website page |
| [**publish_shw_page**](ShwApi.md#publish_shw_page) | **PATCH** /shw/{id}/page/publish | Publish self hosted website page |


## get_shw_page

> <V1EntitiesPage> get_shw_page(id)

Get self hosted website page

Get self hosted website page

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::ShwApi.new
id = 56 # Integer | 

begin
  # Get self hosted website page
  result = api_instance.get_shw_page(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling ShwApi->get_shw_page: #{e}"
end
```

#### Using the get_shw_page_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesPage>, Integer, Hash)> get_shw_page_with_http_info(id)

```ruby
begin
  # Get self hosted website page
  data, status_code, headers = api_instance.get_shw_page_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesPage>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling ShwApi->get_shw_page_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |

### Return type

[**V1EntitiesPage**](V1EntitiesPage.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## publish_shw_page

> <V1EntitiesPage> publish_shw_page(id)

Publish self hosted website page

Publish self hosted website page

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::ShwApi.new
id = 56 # Integer | 

begin
  # Publish self hosted website page
  result = api_instance.publish_shw_page(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling ShwApi->publish_shw_page: #{e}"
end
```

#### Using the publish_shw_page_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesPage>, Integer, Hash)> publish_shw_page_with_http_info(id)

```ruby
begin
  # Publish self hosted website page
  data, status_code, headers = api_instance.publish_shw_page_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesPage>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling ShwApi->publish_shw_page_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |

### Return type

[**V1EntitiesPage**](V1EntitiesPage.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

