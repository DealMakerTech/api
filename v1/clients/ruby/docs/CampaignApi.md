# DealMakerAPI::CampaignApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**get_ttw_campaign**](CampaignApi.md#get_ttw_campaign) | **GET** /ttw/campaigns/{id} | Gets a TTW campaign for a given company |


## get_ttw_campaign

> <V1EntitiesTtwCampaignResponse> get_ttw_campaign(id)

Gets a TTW campaign for a given company

Gets a TTW campaign for a given company

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CampaignApi.new
id = 56 # Integer | 

begin
  # Gets a TTW campaign for a given company
  result = api_instance.get_ttw_campaign(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CampaignApi->get_ttw_campaign: #{e}"
end
```

#### Using the get_ttw_campaign_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesTtwCampaignResponse>, Integer, Hash)> get_ttw_campaign_with_http_info(id)

```ruby
begin
  # Gets a TTW campaign for a given company
  data, status_code, headers = api_instance.get_ttw_campaign_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesTtwCampaignResponse>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CampaignApi->get_ttw_campaign_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |

### Return type

[**V1EntitiesTtwCampaignResponse**](V1EntitiesTtwCampaignResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

