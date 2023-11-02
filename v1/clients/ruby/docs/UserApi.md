# DealMakerAPI::UserApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**get_user**](UserApi.md#get_user) | **GET** /users/{id} | Get user by User ID |
| [**update_user_password**](UserApi.md#update_user_password) | **PUT** /users/{id}/update_password | Update user password |


## get_user

> <V1EntitiesUser> get_user(id)

Get user by User ID

Get a single user using the User ID

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::UserApi.new
id = 56 # Integer | 

begin
  # Get user by User ID
  result = api_instance.get_user(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UserApi->get_user: #{e}"
end
```

#### Using the get_user_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesUser>, Integer, Hash)> get_user_with_http_info(id)

```ruby
begin
  # Get user by User ID
  data, status_code, headers = api_instance.get_user_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesUser>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UserApi->get_user_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |

### Return type

[**V1EntitiesUser**](V1EntitiesUser.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## update_user_password

> <V1EntitiesUser> update_user_password(id, update_user_password_request)

Update user password

Update user password

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::UserApi.new
id = 56 # Integer | 
update_user_password_request = DealMakerAPI::UpdateUserPasswordRequest.new({password: 'password_example'}) # UpdateUserPasswordRequest | 

begin
  # Update user password
  result = api_instance.update_user_password(id, update_user_password_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UserApi->update_user_password: #{e}"
end
```

#### Using the update_user_password_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesUser>, Integer, Hash)> update_user_password_with_http_info(id, update_user_password_request)

```ruby
begin
  # Update user password
  data, status_code, headers = api_instance.update_user_password_with_http_info(id, update_user_password_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesUser>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UserApi->update_user_password_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |
| **update_user_password_request** | [**UpdateUserPasswordRequest**](UpdateUserPasswordRequest.md) |  |  |

### Return type

[**V1EntitiesUser**](V1EntitiesUser.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

