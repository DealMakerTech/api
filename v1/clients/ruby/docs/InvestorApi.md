# DealMakerAPI::InvestorApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**add_document**](InvestorApi.md#add_document) | **POST** /deals/{id}/investors/{investor_id}/add_document | Add document for deal investor |
| [**create_investor**](InvestorApi.md#create_investor) | **POST** /deals/{id}/investors | Create a deal investor |
| [**delete_document**](InvestorApi.md#delete_document) | **DELETE** /deals/{id}/investors/{investor_id}/delete_document/{document_id} | Delete document for deal investor |
| [**get_investor**](InvestorApi.md#get_investor) | **GET** /deals/{id}/investors/{investor_id} | Get a deal investor by id |
| [**get_investor_otp_link**](InvestorApi.md#get_investor_otp_link) | **GET** /deals/{id}/investors/{investor_id}/otp_access_link | Get OTP access link for deal investor |
| [**list_investors**](InvestorApi.md#list_investors) | **GET** /deals/{id}/investors | List deal investors |
| [**patch_investor**](InvestorApi.md#patch_investor) | **PATCH** /deals/{id}/investors/{investor_id} | Patch a deal investor |
| [**update_investor**](InvestorApi.md#update_investor) | **PUT** /deals/{id}/investors/{investor_id} | Update a deal investor |


## add_document

> <V1EntitiesInvestor> add_document(id, investor_id, add_document_request)

Add document for deal investor

Add document for deal investor

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorApi.new
id = 56 # Integer | The deal id.
investor_id = 56 # Integer | The investor id.
add_document_request = DealMakerAPI::AddDocumentRequest.new({type: 'regular', file: File.new('/path/to/some/file')}) # AddDocumentRequest | 

begin
  # Add document for deal investor
  result = api_instance.add_document(id, investor_id, add_document_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorApi->add_document: #{e}"
end
```

#### Using the add_document_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestor>, Integer, Hash)> add_document_with_http_info(id, investor_id, add_document_request)

```ruby
begin
  # Add document for deal investor
  data, status_code, headers = api_instance.add_document_with_http_info(id, investor_id, add_document_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestor>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorApi->add_document_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal id. |  |
| **investor_id** | **Integer** | The investor id. |  |
| **add_document_request** | [**AddDocumentRequest**](AddDocumentRequest.md) |  |  |

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## create_investor

> <V1EntitiesInvestor> create_investor(id, create_investor_request)

Create a deal investor

Create a single deal investor.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorApi.new
id = 56 # Integer | The deal id.
create_investor_request = DealMakerAPI::CreateInvestorRequest.new({email: 'email_example'}) # CreateInvestorRequest | 

begin
  # Create a deal investor
  result = api_instance.create_investor(id, create_investor_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorApi->create_investor: #{e}"
end
```

#### Using the create_investor_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestor>, Integer, Hash)> create_investor_with_http_info(id, create_investor_request)

```ruby
begin
  # Create a deal investor
  data, status_code, headers = api_instance.create_investor_with_http_info(id, create_investor_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestor>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorApi->create_investor_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal id. |  |
| **create_investor_request** | [**CreateInvestorRequest**](CreateInvestorRequest.md) |  |  |

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## delete_document

> delete_document(id, investor_id, document_id)

Delete document for deal investor

Delete document for deal investor

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorApi.new
id = 56 # Integer | 
investor_id = 56 # Integer | 
document_id = 56 # Integer | 

begin
  # Delete document for deal investor
  api_instance.delete_document(id, investor_id, document_id)
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorApi->delete_document: #{e}"
end
```

#### Using the delete_document_with_http_info variant

This returns an Array which contains the response data (`nil` in this case), status code and headers.

> <Array(nil, Integer, Hash)> delete_document_with_http_info(id, investor_id, document_id)

```ruby
begin
  # Delete document for deal investor
  data, status_code, headers = api_instance.delete_document_with_http_info(id, investor_id, document_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => nil
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorApi->delete_document_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |
| **investor_id** | **Integer** |  |  |
| **document_id** | **Integer** |  |  |

### Return type

nil (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined


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

api_instance = DealMakerAPI::InvestorApi.new
id = 56 # Integer | The deal id.
investor_id = 56 # Integer | The investor id.

begin
  # Get a deal investor by id
  result = api_instance.get_investor(id, investor_id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorApi->get_investor: #{e}"
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
  puts "Error when calling InvestorApi->get_investor_with_http_info: #{e}"
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


## get_investor_otp_link

> <V1EntitiesInvestorOtpAccessLink> get_investor_otp_link(id, investor_id)

Get OTP access link for deal investor

Get OTP access link for deal investor by id

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorApi.new
id = 56 # Integer | The deal id.
investor_id = 56 # Integer | The investor id.

begin
  # Get OTP access link for deal investor
  result = api_instance.get_investor_otp_link(id, investor_id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorApi->get_investor_otp_link: #{e}"
end
```

#### Using the get_investor_otp_link_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorOtpAccessLink>, Integer, Hash)> get_investor_otp_link_with_http_info(id, investor_id)

```ruby
begin
  # Get OTP access link for deal investor
  data, status_code, headers = api_instance.get_investor_otp_link_with_http_info(id, investor_id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorOtpAccessLink>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorApi->get_investor_otp_link_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal id. |  |
| **investor_id** | **Integer** | The investor id. |  |

### Return type

[**V1EntitiesInvestorOtpAccessLink**](V1EntitiesInvestorOtpAccessLink.md)

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

api_instance = DealMakerAPI::InvestorApi.new
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
  puts "Error when calling InvestorApi->list_investors: #{e}"
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
  puts "Error when calling InvestorApi->list_investors_with_http_info: #{e}"
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


## patch_investor

> <V1EntitiesInvestor> patch_investor(id, investor_id, patch_investor_request)

Patch a deal investor

Patch deal investor

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorApi.new
id = 56 # Integer | The deal id.
investor_id = 56 # Integer | The investor id.
patch_investor_request = DealMakerAPI::PatchInvestorRequest.new({investor_profile_id: 37}) # PatchInvestorRequest | 

begin
  # Patch a deal investor
  result = api_instance.patch_investor(id, investor_id, patch_investor_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorApi->patch_investor: #{e}"
end
```

#### Using the patch_investor_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestor>, Integer, Hash)> patch_investor_with_http_info(id, investor_id, patch_investor_request)

```ruby
begin
  # Patch a deal investor
  data, status_code, headers = api_instance.patch_investor_with_http_info(id, investor_id, patch_investor_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestor>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorApi->patch_investor_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal id. |  |
| **investor_id** | **Integer** | The investor id. |  |
| **patch_investor_request** | [**PatchInvestorRequest**](PatchInvestorRequest.md) |  |  |

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## update_investor

> <V1EntitiesInvestor> update_investor(id, investor_id, opts)

Update a deal investor

Update deal investor

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorApi.new
id = 56 # Integer | The deal id.
investor_id = 56 # Integer | The investor id.
opts = {
  update_investor_request: DealMakerAPI::UpdateInvestorRequest.new # UpdateInvestorRequest | 
}

begin
  # Update a deal investor
  result = api_instance.update_investor(id, investor_id, opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorApi->update_investor: #{e}"
end
```

#### Using the update_investor_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestor>, Integer, Hash)> update_investor_with_http_info(id, investor_id, opts)

```ruby
begin
  # Update a deal investor
  data, status_code, headers = api_instance.update_investor_with_http_info(id, investor_id, opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestor>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorApi->update_investor_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The deal id. |  |
| **investor_id** | **Integer** | The investor id. |  |
| **update_investor_request** | [**UpdateInvestorRequest**](UpdateInvestorRequest.md) |  | [optional] |

### Return type

[**V1EntitiesInvestor**](V1EntitiesInvestor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

