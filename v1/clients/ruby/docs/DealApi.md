# DealMakerAPI::DealApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**create_deal_setup**](DealApi.md#create_deal_setup) | **POST** /deal_setups | Create deal setup |
| [**get_deal**](DealApi.md#get_deal) | **GET** /deals/{id} | Get deal by Deal ID |
| [**list_deals**](DealApi.md#list_deals) | **GET** /deals | List available deals |


## create_deal_setup

> <V1EntitiesDealSetup> create_deal_setup(create_deal_setup_request)

Create deal setup

Create deal setup

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DealApi.new
create_deal_setup_request = DealMakerAPI::CreateDealSetupRequest.new({invoicing_email: 'invoicing_email_example', offering_type: 'other', title: 'title_example', company_id: 37}) # CreateDealSetupRequest | 

begin
  # Create deal setup
  result = api_instance.create_deal_setup(create_deal_setup_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealApi->create_deal_setup: #{e}"
end
```

#### Using the create_deal_setup_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesDealSetup>, Integer, Hash)> create_deal_setup_with_http_info(create_deal_setup_request)

```ruby
begin
  # Create deal setup
  data, status_code, headers = api_instance.create_deal_setup_with_http_info(create_deal_setup_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesDealSetup>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealApi->create_deal_setup_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **create_deal_setup_request** | [**CreateDealSetupRequest**](CreateDealSetupRequest.md) |  |  |

### Return type

[**V1EntitiesDealSetup**](V1EntitiesDealSetup.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## get_deal

> <V1EntitiesDeal> get_deal(id)

Get deal by Deal ID

Gets a single deal using the Deal ID

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DealApi.new
id = 56 # Integer | The deal id.

begin
  # Get deal by Deal ID
  result = api_instance.get_deal(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealApi->get_deal: #{e}"
end
```

#### Using the get_deal_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesDeal>, Integer, Hash)> get_deal_with_http_info(id)

```ruby
begin
  # Get deal by Deal ID
  data, status_code, headers = api_instance.get_deal_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesDeal>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealApi->get_deal_with_http_info: #{e}"
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


## list_deals

> <V1EntitiesDeals> list_deals(opts)

List available deals

List available deals

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DealApi.new
opts = {
  page: 56, # Integer | Page offset to fetch.
  per_page: 56, # Integer | Number of results to return per page.
  offset: 56 # Integer | Pad a number of results.
}

begin
  # List available deals
  result = api_instance.list_deals(opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealApi->list_deals: #{e}"
end
```

#### Using the list_deals_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesDeals>, Integer, Hash)> list_deals_with_http_info(opts)

```ruby
begin
  # List available deals
  data, status_code, headers = api_instance.list_deals_with_http_info(opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesDeals>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealApi->list_deals_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **page** | **Integer** | Page offset to fetch. | [optional][default to 1] |
| **per_page** | **Integer** | Number of results to return per page. | [optional][default to 25] |
| **offset** | **Integer** | Pad a number of results. | [optional][default to 0] |

### Return type

[**V1EntitiesDeals**](V1EntitiesDeals.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

