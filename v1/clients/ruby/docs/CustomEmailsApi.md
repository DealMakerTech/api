# DealMakerAPI::CustomEmailsApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**get_access_token**](CustomEmailsApi.md#get_access_token) | **POST** /custom_emails/get_access_token | Generate authorization token information for initializing Beefree editor |


## get_access_token

> <V1EntitiesBeefreeAccessToken> get_access_token(get_access_token_request)

Generate authorization token information for initializing Beefree editor

Generate authorization token information

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::CustomEmailsApi.new
get_access_token_request = DealMakerAPI::GetAccessTokenRequest.new({user_id: 37}) # GetAccessTokenRequest | 

begin
  # Generate authorization token information for initializing Beefree editor
  result = api_instance.get_access_token(get_access_token_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CustomEmailsApi->get_access_token: #{e}"
end
```

#### Using the get_access_token_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesBeefreeAccessToken>, Integer, Hash)> get_access_token_with_http_info(get_access_token_request)

```ruby
begin
  # Generate authorization token information for initializing Beefree editor
  data, status_code, headers = api_instance.get_access_token_with_http_info(get_access_token_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesBeefreeAccessToken>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling CustomEmailsApi->get_access_token_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **get_access_token_request** | [**GetAccessTokenRequest**](GetAccessTokenRequest.md) |  |  |

### Return type

[**V1EntitiesBeefreeAccessToken**](V1EntitiesBeefreeAccessToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

