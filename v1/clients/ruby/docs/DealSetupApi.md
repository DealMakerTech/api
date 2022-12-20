# DealMakerAPI::DealSetupApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**create_deal_setup**](DealSetupApi.md#create_deal_setup) | **POST** /deal_setups | Create deal setup |


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

api_instance = DealMakerAPI::DealSetupApi.new
create_deal_setup_request = DealMakerAPI::CreateDealSetupRequest.new({invoicing_email: 'invoicing_email_example', offering_type: 'other', title: 'title_example', company_id: 37}) # CreateDealSetupRequest | 

begin
  # Create deal setup
  result = api_instance.create_deal_setup(create_deal_setup_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealSetupApi->create_deal_setup: #{e}"
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
  puts "Error when calling DealSetupApi->create_deal_setup_with_http_info: #{e}"
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

