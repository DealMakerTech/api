# DealMakerAPI::CampaignApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**get_ttw_campaign**](CampaignApi.md#get_ttw_campaign) | **GET** /ttw/campaigns/{id} | Gets a TTW campaign for a given company |
| [**get_ttw_campaigns**](CampaignApi.md#get_ttw_campaigns) | **GET** /ttw/companies/{company_id}/campaigns | Gets a list TTW campaigns for a given company |


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


## get_ttw_campaigns

> <V1EntitiesTtwCampaignList> get_ttw_campaigns(company_id)

Gets a list TTW campaigns for a given company

Gets a list TTW campaigns for a given company

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CampaignApi.new
company_id = 56 # Integer | 

begin
  # Gets a list TTW campaigns for a given company
  result = api_instance.get_ttw_campaigns(company_id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CampaignApi->get_ttw_campaigns: #{e}"
end
```

#### Using the get_ttw_campaigns_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesTtwCampaignList>, Integer, Hash)> get_ttw_campaigns_with_http_info(company_id)

```ruby
begin
  # Gets a list TTW campaigns for a given company
  data, status_code, headers = api_instance.get_ttw_campaigns_with_http_info(company_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesTtwCampaignList>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CampaignApi->get_ttw_campaigns_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **company_id** | **Integer** |  |  |

### Return type

[**V1EntitiesTtwCampaignList**](V1EntitiesTtwCampaignList.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

