# DealMakerAPI::TtwCampaignsApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**get_ttw_campaign_page**](TtwCampaignsApi.md#get_ttw_campaign_page) | **GET** /ttw/campaigns/{id}/page | Get ttw campaign page |
| [**publish_ttw_campaign_page**](TtwCampaignsApi.md#publish_ttw_campaign_page) | **PATCH** /ttw/campaigns/{id}/page/publish | Publish ttw campaign page |


## get_ttw_campaign_page

> <V1EntitiesPage> get_ttw_campaign_page(id)

Get ttw campaign page

Get ttw campaign page

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::TtwCampaignsApi.new
id = 56 # Integer | 

begin
  # Get ttw campaign page
  result = api_instance.get_ttw_campaign_page(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling TtwCampaignsApi->get_ttw_campaign_page: #{e}"
end
```

#### Using the get_ttw_campaign_page_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesPage>, Integer, Hash)> get_ttw_campaign_page_with_http_info(id)

```ruby
begin
  # Get ttw campaign page
  data, status_code, headers = api_instance.get_ttw_campaign_page_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesPage>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling TtwCampaignsApi->get_ttw_campaign_page_with_http_info: #{e}"
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


## publish_ttw_campaign_page

> <V1EntitiesPage> publish_ttw_campaign_page(id)

Publish ttw campaign page

Publish ttw campaign page

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::TtwCampaignsApi.new
id = 56 # Integer | 

begin
  # Publish ttw campaign page
  result = api_instance.publish_ttw_campaign_page(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling TtwCampaignsApi->publish_ttw_campaign_page: #{e}"
end
```

#### Using the publish_ttw_campaign_page_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesPage>, Integer, Hash)> publish_ttw_campaign_page_with_http_info(id)

```ruby
begin
  # Publish ttw campaign page
  data, status_code, headers = api_instance.publish_ttw_campaign_page_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesPage>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling TtwCampaignsApi->publish_ttw_campaign_page_with_http_info: #{e}"
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

