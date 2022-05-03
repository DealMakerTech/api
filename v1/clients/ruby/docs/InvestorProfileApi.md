# DealMakerAPI::InvestorProfileApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**create_investor_profile**](InvestorProfileApi.md#create_investor_profile) | **POST** /investor_profiles | Create new investor profile |


## create_investor_profile

> <V1EntitiesInvestorProfileIndividual> create_investor_profile(unknown_base_type)

Create new investor profile

Create new investor profile associated to the user by email.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
unknown_base_type = TODO # UNKNOWN_BASE_TYPE | 

begin
  # Create new investor profile
  result = api_instance.create_investor_profile(unknown_base_type)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_investor_profile: #{e}"
end
```

#### Using the create_investor_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileIndividual>, Integer, Hash)> create_investor_profile_with_http_info(unknown_base_type)

```ruby
begin
  # Create new investor profile
  data, status_code, headers = api_instance.create_investor_profile_with_http_info(unknown_base_type)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileIndividual>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_investor_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **unknown_base_type** | [**UNKNOWN_BASE_TYPE**](UNKNOWN_BASE_TYPE.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileIndividual**](V1EntitiesInvestorProfileIndividual.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

