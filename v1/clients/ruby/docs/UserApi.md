# DealMakerAPI::UserApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**create_factor**](UserApi.md#create_factor) | **POST** /users/{id}/create_factor | Creates an API endpoint for creating a new TOTP factor |
| [**get_two_factor_channels**](UserApi.md#get_two_factor_channels) | **GET** /users/{id}/two_factor_channels | Creates an API endpoint to return a list of existing TOTP factor |
| [**get_user**](UserApi.md#get_user) | **GET** /users/{id} | Get user by User ID |
| [**setup_sms_verification**](UserApi.md#setup_sms_verification) | **POST** /users/{id}/setup_sms_verification | Start a setup for a SMS Verification by creating a two factor channel of sms type |
| [**update_user_password**](UserApi.md#update_user_password) | **PUT** /users/{id}/update_password | Update user password |
| [**verify_factor**](UserApi.md#verify_factor) | **PUT** /users/{id}/verify_factor | Creates an API endpoint to verify an existing TOTP factor |


## create_factor

> <V1EntitiesUsersFactor> create_factor(id)

Creates an API endpoint for creating a new TOTP factor

Create an API endpoint for creating a new TOTP factor

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::UserApi.new
id = 56 # Integer | 

begin
  # Creates an API endpoint for creating a new TOTP factor
  result = api_instance.create_factor(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UserApi->create_factor: #{e}"
end
```

#### Using the create_factor_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesUsersFactor>, Integer, Hash)> create_factor_with_http_info(id)

```ruby
begin
  # Creates an API endpoint for creating a new TOTP factor
  data, status_code, headers = api_instance.create_factor_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesUsersFactor>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UserApi->create_factor_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |

### Return type

[**V1EntitiesUsersFactor**](V1EntitiesUsersFactor.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_two_factor_channels

> <V1EntitiesUsersTwoFactorChannels> get_two_factor_channels(id)

Creates an API endpoint to return a list of existing TOTP factor

Create an API endpoint to return a list of existing TOTP factor

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::UserApi.new
id = 56 # Integer | 

begin
  # Creates an API endpoint to return a list of existing TOTP factor
  result = api_instance.get_two_factor_channels(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UserApi->get_two_factor_channels: #{e}"
end
```

#### Using the get_two_factor_channels_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesUsersTwoFactorChannels>, Integer, Hash)> get_two_factor_channels_with_http_info(id)

```ruby
begin
  # Creates an API endpoint to return a list of existing TOTP factor
  data, status_code, headers = api_instance.get_two_factor_channels_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesUsersTwoFactorChannels>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UserApi->get_two_factor_channels_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |

### Return type

[**V1EntitiesUsersTwoFactorChannels**](V1EntitiesUsersTwoFactorChannels.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


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


## setup_sms_verification

> setup_sms_verification(id, setup_sms_verification_request)

Start a setup for a SMS Verification by creating a two factor channel of sms type

Start a setup for a SMS Verification by creating a two factor channel of sms type

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::UserApi.new
id = 56 # Integer | 
setup_sms_verification_request = DealMakerAPI::SetupSmsVerificationRequest.new({phone_number: 'phone_number_example'}) # SetupSmsVerificationRequest | 

begin
  # Start a setup for a SMS Verification by creating a two factor channel of sms type
  api_instance.setup_sms_verification(id, setup_sms_verification_request)
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UserApi->setup_sms_verification: #{e}"
end
```

#### Using the setup_sms_verification_with_http_info variant

This returns an Array which contains the response data (`nil` in this case), status code and headers.

> <Array(nil, Integer, Hash)> setup_sms_verification_with_http_info(id, setup_sms_verification_request)

```ruby
begin
  # Start a setup for a SMS Verification by creating a two factor channel of sms type
  data, status_code, headers = api_instance.setup_sms_verification_with_http_info(id, setup_sms_verification_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => nil
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UserApi->setup_sms_verification_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |
| **setup_sms_verification_request** | [**SetupSmsVerificationRequest**](SetupSmsVerificationRequest.md) |  |  |

### Return type

nil (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined


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


## verify_factor

> <V1EntitiesUsersTwoFactorChannel> verify_factor(id, verify_factor_request)

Creates an API endpoint to verify an existing TOTP factor

Create an API endpoint to verify an existing TOTP factor

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::UserApi.new
id = 56 # Integer | 
verify_factor_request = DealMakerAPI::VerifyFactorRequest.new({code: 'code_example'}) # VerifyFactorRequest | 

begin
  # Creates an API endpoint to verify an existing TOTP factor
  result = api_instance.verify_factor(id, verify_factor_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UserApi->verify_factor: #{e}"
end
```

#### Using the verify_factor_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesUsersTwoFactorChannel>, Integer, Hash)> verify_factor_with_http_info(id, verify_factor_request)

```ruby
begin
  # Creates an API endpoint to verify an existing TOTP factor
  data, status_code, headers = api_instance.verify_factor_with_http_info(id, verify_factor_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesUsersTwoFactorChannel>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling UserApi->verify_factor_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** |  |  |
| **verify_factor_request** | [**VerifyFactorRequest**](VerifyFactorRequest.md) |  |  |

### Return type

[**V1EntitiesUsersTwoFactorChannel**](V1EntitiesUsersTwoFactorChannel.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

