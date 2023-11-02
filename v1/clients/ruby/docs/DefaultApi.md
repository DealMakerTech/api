# DealMakerAPI::DefaultApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data**](DefaultApi.md#get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data) | **GET** /deals/{deal_id}/payment_onboarding/questionnaire/digital_payments_connection/data | Load data for the digital payments connection stage |
| [**get_deals_id_investors_investor_id_payments_express_wire_instructions**](DefaultApi.md#get_deals_id_investors_investor_id_payments_express_wire_instructions) | **GET** /deals/{id}/investors/{investor_id}/payments/express_wire/instructions | Displays the express wire instructions for an investor on a deal |
| [**get_deals_id_investors_payments_express_wire_instructions**](DefaultApi.md#get_deals_id_investors_payments_express_wire_instructions) | **GET** /deals/{id}/investors/payments/express_wire/instructions | Displays the express wire instructions for all the investors on a deal |
| [**get_webhooks**](DefaultApi.md#get_webhooks) | **GET** /webhooks | Returns a list of webhook subscription which is associated to the user |
| [**get_webhooks_deal_id**](DefaultApi.md#get_webhooks_deal_id) | **GET** /webhooks/deal/{id} | Finds a deal using the id |
| [**get_webhooks_deals_search**](DefaultApi.md#get_webhooks_deals_search) | **GET** /webhooks/deals/search | Searches for deals for a given user |
| [**get_webhooks_security_token**](DefaultApi.md#get_webhooks_security_token) | **GET** /webhooks/security_token | Creates a new security token for webhook subscription |
| [**post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit**](DefaultApi.md#post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/payout_account_details/submit | Submit a payout account details form |
| [**post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit**](DefaultApi.md#post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/response/submit | Submit a qualification questionnaire response |
| [**post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit**](DefaultApi.md#post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit) | **POST** /deals/{deal_id}/payment_onboarding/questionnaire/qualification_questionnaire/submit | Submit a qualification questionnaire form |
| [**post_webhooks**](DefaultApi.md#post_webhooks) | **POST** /webhooks | Creates a webhook subscription which is associated to the user |
| [**put_webhooks_id**](DefaultApi.md#put_webhooks_id) | **PUT** /webhooks/{id} | Updates webhook subscription and webhooks subcription deals |


## get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data

> <V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData> get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data(deal_id)

Load data for the digital payments connection stage

Load data for the digital payments connection stage

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DefaultApi.new
deal_id = 56 # Integer | 

begin
  # Load data for the digital payments connection stage
  result = api_instance.get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data(deal_id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data: #{e}"
end
```

#### Using the get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData>, Integer, Hash)> get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data_with_http_info(deal_id)

```ruby
begin
  # Load data for the digital payments connection stage
  data, status_code, headers = api_instance.get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data_with_http_info(deal_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->get_deals_deal_id_payment_onboarding_questionnaire_digital_payments_connection_data_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **deal_id** | **Integer** |  |  |

### Return type

[**V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData**](V1EntitiesPaymentsSelfServeOnboardingDigitalPaymentsConnectionData.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_deals_id_investors_investor_id_payments_express_wire_instructions

> <V1EntitiesExpressWireInstruction> get_deals_id_investors_investor_id_payments_express_wire_instructions(id, investor_id)

Displays the express wire instructions for an investor on a deal

Get express wire instructions

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DefaultApi.new
id = 56 # Integer | 
investor_id = 56 # Integer | 

begin
  # Displays the express wire instructions for an investor on a deal
  result = api_instance.get_deals_id_investors_investor_id_payments_express_wire_instructions(id, investor_id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->get_deals_id_investors_investor_id_payments_express_wire_instructions: #{e}"
end
```

#### Using the get_deals_id_investors_investor_id_payments_express_wire_instructions_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesExpressWireInstruction>, Integer, Hash)> get_deals_id_investors_investor_id_payments_express_wire_instructions_with_http_info(id, investor_id)

```ruby
begin
  # Displays the express wire instructions for an investor on a deal
  data, status_code, headers = api_instance.get_deals_id_investors_investor_id_payments_express_wire_instructions_with_http_info(id, investor_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesExpressWireInstruction>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->get_deals_id_investors_investor_id_payments_express_wire_instructions_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |
| **investor_id** | **Integer** |  |  |

### Return type

[**V1EntitiesExpressWireInstruction**](V1EntitiesExpressWireInstruction.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_deals_id_investors_payments_express_wire_instructions

> <V1EntitiesExpressWireInstructions> get_deals_id_investors_payments_express_wire_instructions(id)

Displays the express wire instructions for all the investors on a deal

Get list of express wire instructions

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DefaultApi.new
id = 56 # Integer | 

begin
  # Displays the express wire instructions for all the investors on a deal
  result = api_instance.get_deals_id_investors_payments_express_wire_instructions(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->get_deals_id_investors_payments_express_wire_instructions: #{e}"
end
```

#### Using the get_deals_id_investors_payments_express_wire_instructions_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesExpressWireInstructions>, Integer, Hash)> get_deals_id_investors_payments_express_wire_instructions_with_http_info(id)

```ruby
begin
  # Displays the express wire instructions for all the investors on a deal
  data, status_code, headers = api_instance.get_deals_id_investors_payments_express_wire_instructions_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesExpressWireInstructions>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->get_deals_id_investors_payments_express_wire_instructions_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |

### Return type

[**V1EntitiesExpressWireInstructions**](V1EntitiesExpressWireInstructions.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_webhooks

> <V1EntitiesWebhooksSubscription> get_webhooks(opts)

Returns a list of webhook subscription which is associated to the user

Returns a list of webhook subscription

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DefaultApi.new
opts = {
  page: 56, # Integer | Page offset to fetch.
  per_page: 56, # Integer | Number of results to return per page.
  offset: 56 # Integer | Pad a number of results.
}

begin
  # Returns a list of webhook subscription which is associated to the user
  result = api_instance.get_webhooks(opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->get_webhooks: #{e}"
end
```

#### Using the get_webhooks_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesWebhooksSubscription>, Integer, Hash)> get_webhooks_with_http_info(opts)

```ruby
begin
  # Returns a list of webhook subscription which is associated to the user
  data, status_code, headers = api_instance.get_webhooks_with_http_info(opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesWebhooksSubscription>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->get_webhooks_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **page** | **Integer** | Page offset to fetch. | [optional][default to 1] |
| **per_page** | **Integer** | Number of results to return per page. | [optional][default to 25] |
| **offset** | **Integer** | Pad a number of results. | [optional][default to 0] |

### Return type

[**V1EntitiesWebhooksSubscription**](V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_webhooks_deal_id

> <V1EntitiesWebhooksDeal> get_webhooks_deal_id(id)

Finds a deal using the id

Returns a deal

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DefaultApi.new
id = 56 # Integer | 

begin
  # Finds a deal using the id
  result = api_instance.get_webhooks_deal_id(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->get_webhooks_deal_id: #{e}"
end
```

#### Using the get_webhooks_deal_id_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesWebhooksDeal>, Integer, Hash)> get_webhooks_deal_id_with_http_info(id)

```ruby
begin
  # Finds a deal using the id
  data, status_code, headers = api_instance.get_webhooks_deal_id_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesWebhooksDeal>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->get_webhooks_deal_id_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |

### Return type

[**V1EntitiesWebhooksDeal**](V1EntitiesWebhooksDeal.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_webhooks_deals_search

> <V1EntitiesWebhooksSecurityToken> get_webhooks_deals_search

Searches for deals for a given user

Searches for deals for a given user

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DefaultApi.new

begin
  # Searches for deals for a given user
  result = api_instance.get_webhooks_deals_search
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->get_webhooks_deals_search: #{e}"
end
```

#### Using the get_webhooks_deals_search_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesWebhooksSecurityToken>, Integer, Hash)> get_webhooks_deals_search_with_http_info

```ruby
begin
  # Searches for deals for a given user
  data, status_code, headers = api_instance.get_webhooks_deals_search_with_http_info
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesWebhooksSecurityToken>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->get_webhooks_deals_search_with_http_info: #{e}"
end
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**V1EntitiesWebhooksSecurityToken**](V1EntitiesWebhooksSecurityToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_webhooks_security_token

> <V1EntitiesWebhooksSecurityToken> get_webhooks_security_token

Creates a new security token for webhook subscription

Creates a new security token for webhook subscription

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DefaultApi.new

begin
  # Creates a new security token for webhook subscription
  result = api_instance.get_webhooks_security_token
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->get_webhooks_security_token: #{e}"
end
```

#### Using the get_webhooks_security_token_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesWebhooksSecurityToken>, Integer, Hash)> get_webhooks_security_token_with_http_info

```ruby
begin
  # Creates a new security token for webhook subscription
  data, status_code, headers = api_instance.get_webhooks_security_token_with_http_info
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesWebhooksSecurityToken>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->get_webhooks_security_token_with_http_info: #{e}"
end
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**V1EntitiesWebhooksSecurityToken**](V1EntitiesWebhooksSecurityToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit

> <V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult> post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit(deal_id)

Submit a payout account details form

Submit a payout account details form

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DefaultApi.new
deal_id = 56 # Integer | 

begin
  # Submit a payout account details form
  result = api_instance.post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit(deal_id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit: #{e}"
end
```

#### Using the post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult>, Integer, Hash)> post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit_with_http_info(deal_id)

```ruby
begin
  # Submit a payout account details form
  data, status_code, headers = api_instance.post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit_with_http_info(deal_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->post_deals_deal_id_payment_onboarding_questionnaire_payout_account_details_submit_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **deal_id** | **Integer** |  |  |

### Return type

[**V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult**](V1EntitiesPaymentsSelfServeOnboardingPayoutAccountDetailsResult.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit

> post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit(deal_id)

Submit a qualification questionnaire response

Submit a qualification questionnaire response

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DefaultApi.new
deal_id = 56 # Integer | 

begin
  # Submit a qualification questionnaire response
  api_instance.post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit(deal_id)
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit: #{e}"
end
```

#### Using the post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit_with_http_info variant

This returns an Array which contains the response data (`nil` in this case), status code and headers.

> <Array(nil, Integer, Hash)> post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit_with_http_info(deal_id)

```ruby
begin
  # Submit a qualification questionnaire response
  data, status_code, headers = api_instance.post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit_with_http_info(deal_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => nil
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_response_submit_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **deal_id** | **Integer** |  |  |

### Return type

nil (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined


## post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit

> <V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult> post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit(deal_id)

Submit a qualification questionnaire form

Submit a qualification questionnaire form

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DefaultApi.new
deal_id = 56 # Integer | 

begin
  # Submit a qualification questionnaire form
  result = api_instance.post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit(deal_id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit: #{e}"
end
```

#### Using the post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult>, Integer, Hash)> post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit_with_http_info(deal_id)

```ruby
begin
  # Submit a qualification questionnaire form
  data, status_code, headers = api_instance.post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit_with_http_info(deal_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->post_deals_deal_id_payment_onboarding_questionnaire_qualification_questionnaire_submit_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **deal_id** | **Integer** |  |  |

### Return type

[**V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult**](V1EntitiesPaymentsSelfServeOnboardingQualificationQuestionnaireResult.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## post_webhooks

> <V1EntitiesWebhooksSubscription> post_webhooks(post_webhooks_request)

Creates a webhook subscription which is associated to the user

Creates new webhook subscription

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DefaultApi.new
post_webhooks_request = DealMakerAPI::PostWebhooksRequest.new({name: 'name_example', enabled: false, webhook_subscription_deals_deal_id: [37]}) # PostWebhooksRequest | 

begin
  # Creates a webhook subscription which is associated to the user
  result = api_instance.post_webhooks(post_webhooks_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->post_webhooks: #{e}"
end
```

#### Using the post_webhooks_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesWebhooksSubscription>, Integer, Hash)> post_webhooks_with_http_info(post_webhooks_request)

```ruby
begin
  # Creates a webhook subscription which is associated to the user
  data, status_code, headers = api_instance.post_webhooks_with_http_info(post_webhooks_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesWebhooksSubscription>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->post_webhooks_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **post_webhooks_request** | [**PostWebhooksRequest**](PostWebhooksRequest.md) |  |  |

### Return type

[**V1EntitiesWebhooksSubscription**](V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## put_webhooks_id

> <V1EntitiesWebhooksSubscription> put_webhooks_id(id, opts)

Updates webhook subscription and webhooks subcription deals

Updates webhook subscription

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::DefaultApi.new
id = 56 # Integer | 
opts = {
  put_webhooks_id_request: DealMakerAPI::PutWebhooksIdRequest.new # PutWebhooksIdRequest | 
}

begin
  # Updates webhook subscription and webhooks subcription deals
  result = api_instance.put_webhooks_id(id, opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->put_webhooks_id: #{e}"
end
```

#### Using the put_webhooks_id_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesWebhooksSubscription>, Integer, Hash)> put_webhooks_id_with_http_info(id, opts)

```ruby
begin
  # Updates webhook subscription and webhooks subcription deals
  data, status_code, headers = api_instance.put_webhooks_id_with_http_info(id, opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesWebhooksSubscription>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling DefaultApi->put_webhooks_id_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |
| **put_webhooks_id_request** | [**PutWebhooksIdRequest**](PutWebhooksIdRequest.md) |  | [optional] |

### Return type

[**V1EntitiesWebhooksSubscription**](V1EntitiesWebhooksSubscription.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

