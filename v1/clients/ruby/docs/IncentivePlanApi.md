# DealMakerAPI::IncentivePlanApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**get_deal_incentive_plans_time**](IncentivePlanApi.md#get_deal_incentive_plans_time) | **GET** /deals/{id}/incentive_plans/time | Get incentive plans by deal id |


## get_deal_incentive_plans_time

> <V1EntitiesDealsPriceDetails> get_deal_incentive_plans_time(id, opts)

Get incentive plans by deal id

Gets incentive plans with time tiers from the deal given deal id.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::IncentivePlanApi.new
id = 56 # Integer | The deal id.
opts = {
  page: 56, # Integer | Page offset to fetch.
  per_page: 56, # Integer | Number of results to return per page.
  offset: 56 # Integer | Pad a number of results.
}

begin
  # Get incentive plans by deal id
  result = api_instance.get_deal_incentive_plans_time(id, opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling IncentivePlanApi->get_deal_incentive_plans_time: #{e}"
end
```

#### Using the get_deal_incentive_plans_time_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesDealsPriceDetails>, Integer, Hash)> get_deal_incentive_plans_time_with_http_info(id, opts)

```ruby
begin
  # Get incentive plans by deal id
  data, status_code, headers = api_instance.get_deal_incentive_plans_time_with_http_info(id, opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesDealsPriceDetails>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling IncentivePlanApi->get_deal_incentive_plans_time_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal id. |  |
| **page** | **Integer** | Page offset to fetch. | [optional][default to 1] |
| **per_page** | **Integer** | Number of results to return per page. | [optional][default to 25] |
| **offset** | **Integer** | Pad a number of results. | [optional][default to 0] |

### Return type

[**V1EntitiesDealsPriceDetails**](V1EntitiesDealsPriceDetails.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

