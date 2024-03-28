# DealMakerAPI::DealsApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**post_deals_id_email_campaign_email_campaign_id_send_email**](DealsApi.md#post_deals_id_email_campaign_email_campaign_id_send_email) | **POST** /deals/{id}/email_campaign/{email_campaign_id}/send_email | Send emails to all the investors invited to the material change campaign |
| [**put_deals_id_script_tag_environment**](DealsApi.md#put_deals_id_script_tag_environment) | **PUT** /deals/{id}/script_tag_environment | Update script tag environment for the deal. |


## post_deals_id_email_campaign_email_campaign_id_send_email

> post_deals_id_email_campaign_email_campaign_id_send_email(id, email_campaign_id)

Send emails to all the investors invited to the material change campaign

Send material campaign emails

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DealsApi.new
id = 56 # Integer | The deal id.
email_campaign_id = 56 # Integer | The email campaign id.

begin
  # Send emails to all the investors invited to the material change campaign
  api_instance.post_deals_id_email_campaign_email_campaign_id_send_email(id, email_campaign_id)
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealsApi->post_deals_id_email_campaign_email_campaign_id_send_email: #{e}"
end
```

#### Using the post_deals_id_email_campaign_email_campaign_id_send_email_with_http_info variant

This returns an Array which contains the response data (`nil` in this case), status code and headers.

> <Array(nil, Integer, Hash)> post_deals_id_email_campaign_email_campaign_id_send_email_with_http_info(id, email_campaign_id)

```ruby
begin
  # Send emails to all the investors invited to the material change campaign
  data, status_code, headers = api_instance.post_deals_id_email_campaign_email_campaign_id_send_email_with_http_info(id, email_campaign_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => nil
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealsApi->post_deals_id_email_campaign_email_campaign_id_send_email_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal id. |  |
| **email_campaign_id** | **Integer** | The email campaign id. |  |

### Return type

nil (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined


## put_deals_id_script_tag_environment

> put_deals_id_script_tag_environment(id, put_deals_id_script_tag_environment_request)

Update script tag environment for the deal.

Update script tag environment for the deal.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DealsApi.new
id = 56 # Integer | The deal id.
put_deals_id_script_tag_environment_request = DealMakerAPI::PutDealsIdScriptTagEnvironmentRequest.new({is_production: false}) # PutDealsIdScriptTagEnvironmentRequest | 

begin
  # Update script tag environment for the deal.
  api_instance.put_deals_id_script_tag_environment(id, put_deals_id_script_tag_environment_request)
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealsApi->put_deals_id_script_tag_environment: #{e}"
end
```

#### Using the put_deals_id_script_tag_environment_with_http_info variant

This returns an Array which contains the response data (`nil` in this case), status code and headers.

> <Array(nil, Integer, Hash)> put_deals_id_script_tag_environment_with_http_info(id, put_deals_id_script_tag_environment_request)

```ruby
begin
  # Update script tag environment for the deal.
  data, status_code, headers = api_instance.put_deals_id_script_tag_environment_with_http_info(id, put_deals_id_script_tag_environment_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => nil
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DealsApi->put_deals_id_script_tag_environment_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal id. |  |
| **put_deals_id_script_tag_environment_request** | [**PutDealsIdScriptTagEnvironmentRequest**](PutDealsIdScriptTagEnvironmentRequest.md) |  |  |

### Return type

nil (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined

