# DealMakerAPI::UsersApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**get_users_id_contexts**](UsersApi.md#get_users_id_contexts) | **GET** /users/{id}/contexts | Get contexts for a user |
| [**get_users_investments**](UsersApi.md#get_users_investments) | **GET** /users/investments | Gets the investments for a specific user. |


## get_users_id_contexts

> <V1EntitiesUsersContexts> get_users_id_contexts(id)

Get contexts for a user

Get contexts for a user

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::UsersApi.new
id = 56 # Integer | 

begin
  # Get contexts for a user
  result = api_instance.get_users_id_contexts(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UsersApi->get_users_id_contexts: #{e}"
end
```

#### Using the get_users_id_contexts_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesUsersContexts>, Integer, Hash)> get_users_id_contexts_with_http_info(id)

```ruby
begin
  # Get contexts for a user
  data, status_code, headers = api_instance.get_users_id_contexts_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesUsersContexts>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UsersApi->get_users_id_contexts_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |

### Return type

[**V1EntitiesUsersContexts**](V1EntitiesUsersContexts.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_users_investments

> <V1EntitiesInvestors> get_users_investments(email, opts)

Gets the investments for a specific user.

Get Investments

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::UsersApi.new
email = 'email_example' # String | The email of the user.
opts = {
  page: 56, # Integer | Page offset to fetch.
  per_page: 56, # Integer | Number of results to return per page.
  offset: 56 # Integer | Pad a number of results.
}

begin
  # Gets the investments for a specific user.
  result = api_instance.get_users_investments(email, opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UsersApi->get_users_investments: #{e}"
end
```

#### Using the get_users_investments_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestors>, Integer, Hash)> get_users_investments_with_http_info(email, opts)

```ruby
begin
  # Gets the investments for a specific user.
  data, status_code, headers = api_instance.get_users_investments_with_http_info(email, opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestors>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UsersApi->get_users_investments_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **email** | **String** | The email of the user. |  |
| **page** | **Integer** | Page offset to fetch. | [optional][default to 1] |
| **per_page** | **Integer** | Number of results to return per page. | [optional][default to 25] |
| **offset** | **Integer** | Pad a number of results. | [optional][default to 0] |

### Return type

[**V1EntitiesInvestors**](V1EntitiesInvestors.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

