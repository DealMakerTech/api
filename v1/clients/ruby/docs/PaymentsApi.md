# DealMakerAPI::PaymentsApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**post_deal_investor_payments_ira**](PaymentsApi.md#post_deal_investor_payments_ira) | **POST** /deals/{id}/investors/{investor_id}/payments/ira | Creates a payment intent for express wire and mail its instructions. |


## post_deal_investor_payments_ira

> post_deal_investor_payments_ira(id, investor_id)

Creates a payment intent for express wire and mail its instructions.

Creates a payment intent for express wire

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::PaymentsApi.new
id = 56 # Integer | The deal id.
investor_id = 56 # Integer | The investor id.

begin
  # Creates a payment intent for express wire and mail its instructions.
  api_instance.post_deal_investor_payments_ira(id, investor_id)
rescue DealMakerAPI::ApiError => e
  puts "Error when calling PaymentsApi->post_deal_investor_payments_ira: #{e}"
end
```

#### Using the post_deal_investor_payments_ira_with_http_info variant

This returns an Array which contains the response data (`nil` in this case), status code and headers.

> <Array(nil, Integer, Hash)> post_deal_investor_payments_ira_with_http_info(id, investor_id)

```ruby
begin
  # Creates a payment intent for express wire and mail its instructions.
  data, status_code, headers = api_instance.post_deal_investor_payments_ira_with_http_info(id, investor_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => nil
rescue DealMakerAPI::ApiError => e
  puts "Error when calling PaymentsApi->post_deal_investor_payments_ira_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal id. |  |
| **investor_id** | **Integer** | The investor id. |  |

### Return type

nil (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

