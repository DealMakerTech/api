# DealMakerAPI::DealApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**create_investor**](DealApi.md#create_investor) | **POST** /deals/{id}/investors | Create a deal investor |
| [**get_deal**](DealApi.md#get_deal) | **GET** /deals/{id} | Get a deal by id |
| [**get_investor**](DealApi.md#get_investor) | **GET** /deals/{id}/investors/{investor_id} | Get a deal investor by id |
| [**list_deals**](DealApi.md#list_deals) | **GET** /deals | List available deals |
| [**list_investors**](DealApi.md#list_investors) | **GET** /deals/{id}/investors | List deal investors |


## create_investor

> <V1EntitiesInvestor> create_investor(id, unknown_base_type)

Create a deal investor

Create a single deal investor.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DealApi.new
id = 56 # Integer | The deal id.
unknown_base_type = TODO # UNKNOWN_BASE_TYPE | 

begin
  # Create a deal investor
  result = api_instance.create_investor(id, unknown_base_type)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealApi->create_investor: #{e}"
end
```

#### Using the create_investor_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestor>, Integer, Hash)> create_investor_with_http_info(id, unknown_base_type)

```ruby
begin
  # Create a deal investor
  data, status_code, headers = api_instance.create_investor_with_http_info(id, unknown_base_type)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestor>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealApi->create_investor_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal id. |  |
| **unknown_base_type** | [**UNKNOWN_BASE_TYPE**](UNKNOWN_BASE_TYPE.md) |  |  |

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## get_deal

> <V1EntitiesDeal> get_deal(id)

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
  # Get a deal by id
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


## get_investor

> <V1EntitiesInvestor> get_investor(id, investor_id)

Get a deal investor by id

Gets a single investor by the id.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DealApi.new
id = 56 # Integer | The deal id.
investor_id = 56 # Integer | The investor id.

begin
  # Get a deal investor by id
  result = api_instance.get_investor(id, investor_id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealApi->get_investor: #{e}"
end
```

#### Using the get_investor_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestor>, Integer, Hash)> get_investor_with_http_info(id, investor_id)

```ruby
begin
  # Get a deal investor by id
  data, status_code, headers = api_instance.get_investor_with_http_info(id, investor_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestor>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealApi->get_investor_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal id. |  |
| **investor_id** | **Integer** | The investor id. |  |

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

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


## list_investors

> <V1EntitiesInvestors> list_investors(id, opts)

List deal investors

List deal investors according to the specified search criteria.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DealApi.new
id = 56 # Integer | The deal id.
opts = {
  page: 56, # Integer | Page offset to fetch.
  per_page: 56, # Integer | Number of results to return per page.
  offset: 56, # Integer | Pad a number of results.
  investor_ids: [37], # Array<Integer> | An array of investor ids.
  q: 'q_example' # String | The search query for investors. For additional information on filtering and seach, click [here](#section/Search-and-Filtering-(The-q-parameter)/Keyword-filtering)
}

begin
  # List deal investors
  result = api_instance.list_investors(id, opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealApi->list_investors: #{e}"
end
```

#### Using the list_investors_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestors>, Integer, Hash)> list_investors_with_http_info(id, opts)

```ruby
begin
  # List deal investors
  data, status_code, headers = api_instance.list_investors_with_http_info(id, opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestors>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealApi->list_investors_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal id. |  |
| **page** | **Integer** | Page offset to fetch. | [optional][default to 1] |
| **per_page** | **Integer** | Number of results to return per page. | [optional][default to 25] |
| **offset** | **Integer** | Pad a number of results. | [optional][default to 0] |
| **investor_ids** | [**Array&lt;Integer&gt;**](Integer.md) | An array of investor ids. | [optional] |
| **q** | **String** | The search query for investors. For additional information on filtering and seach, click [here](#section/Search-and-Filtering-(The-q-parameter)/Keyword-filtering) | [optional] |

### Return type

[**V1EntitiesInvestors**](V1EntitiesInvestors.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

