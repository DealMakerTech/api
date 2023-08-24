# DealMakerAPI::InvestorProfileApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**create_corporation_profile**](InvestorProfileApi.md#create_corporation_profile) | **POST** /investor_profiles/corporations | Create new corporation investor profile. |
| [**create_individual_profile**](InvestorProfileApi.md#create_individual_profile) | **POST** /investor_profiles/individuals | Create new individual investor profile |
| [**create_joint_profile**](InvestorProfileApi.md#create_joint_profile) | **POST** /investor_profiles/joints | Create new joint investor profile |
| [**create_trust_profile**](InvestorProfileApi.md#create_trust_profile) | **POST** /investor_profiles/trusts | Create new trust investor profile. |
| [**get_deal_investor_profiles**](InvestorProfileApi.md#get_deal_investor_profiles) | **GET** /investor_profiles/{deal_id} | Get list of InvestorProfiles for a specific deal |
| [**get_investor_profile**](InvestorProfileApi.md#get_investor_profile) | **GET** /investor_profiles/profile/{id} | Get an investor profile by id |
| [**get_investor_profiles**](InvestorProfileApi.md#get_investor_profiles) | **GET** /investor_profiles | Get list of InvestorProfiles |
| [**patch_corporation_profile**](InvestorProfileApi.md#patch_corporation_profile) | **PATCH** /investor_profiles/corporations/{investor_profile_id} | Patch a corporation investor profile |
| [**patch_individual_profile**](InvestorProfileApi.md#patch_individual_profile) | **PATCH** /investor_profiles/individuals/{investor_profile_id} | Patch an individual investor profile. |
| [**patch_joint_profile**](InvestorProfileApi.md#patch_joint_profile) | **PATCH** /investor_profiles/joints/{investor_profile_id} | Patch a joint investor profile |
| [**patch_trust_profile**](InvestorProfileApi.md#patch_trust_profile) | **PATCH** /investor_profiles/trusts/{investor_profile_id} | Patch a trust investor profile |


## create_corporation_profile

> <V1EntitiesInvestorProfileCorporation> create_corporation_profile(create_corporation_profile_request)

Create new corporation investor profile.

Create new corporation investor profile associated to the user by email.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
create_corporation_profile_request = DealMakerAPI::CreateCorporationProfileRequest.new({email: 'email_example'}) # CreateCorporationProfileRequest | 

begin
  # Create new corporation investor profile.
  result = api_instance.create_corporation_profile(create_corporation_profile_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_corporation_profile: #{e}"
end
```

#### Using the create_corporation_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileCorporation>, Integer, Hash)> create_corporation_profile_with_http_info(create_corporation_profile_request)

```ruby
begin
  # Create new corporation investor profile.
  data, status_code, headers = api_instance.create_corporation_profile_with_http_info(create_corporation_profile_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileCorporation>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_corporation_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **create_corporation_profile_request** | [**CreateCorporationProfileRequest**](CreateCorporationProfileRequest.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileCorporation**](V1EntitiesInvestorProfileCorporation.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## create_individual_profile

> <V1EntitiesInvestorProfileIndividual> create_individual_profile(create_individual_profile_request)

Create new individual investor profile

Create new individual investor profile associated to the user by email.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
create_individual_profile_request = DealMakerAPI::CreateIndividualProfileRequest.new({email: 'email_example'}) # CreateIndividualProfileRequest | 

begin
  # Create new individual investor profile
  result = api_instance.create_individual_profile(create_individual_profile_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_individual_profile: #{e}"
end
```

#### Using the create_individual_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileIndividual>, Integer, Hash)> create_individual_profile_with_http_info(create_individual_profile_request)

```ruby
begin
  # Create new individual investor profile
  data, status_code, headers = api_instance.create_individual_profile_with_http_info(create_individual_profile_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileIndividual>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_individual_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **create_individual_profile_request** | [**CreateIndividualProfileRequest**](CreateIndividualProfileRequest.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileIndividual**](V1EntitiesInvestorProfileIndividual.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## create_joint_profile

> <V1EntitiesInvestorProfileJoint> create_joint_profile(create_joint_profile_request)

Create new joint investor profile

Create new joint investor profile associated to the user by email.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
create_joint_profile_request = DealMakerAPI::CreateJointProfileRequest.new({email: 'email_example'}) # CreateJointProfileRequest | 

begin
  # Create new joint investor profile
  result = api_instance.create_joint_profile(create_joint_profile_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_joint_profile: #{e}"
end
```

#### Using the create_joint_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileJoint>, Integer, Hash)> create_joint_profile_with_http_info(create_joint_profile_request)

```ruby
begin
  # Create new joint investor profile
  data, status_code, headers = api_instance.create_joint_profile_with_http_info(create_joint_profile_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileJoint>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_joint_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **create_joint_profile_request** | [**CreateJointProfileRequest**](CreateJointProfileRequest.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileJoint**](V1EntitiesInvestorProfileJoint.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## create_trust_profile

> <V1EntitiesInvestorProfileTrust> create_trust_profile(create_trust_profile_request)

Create new trust investor profile.

Create new trust investor profile associated to the user by email.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
create_trust_profile_request = DealMakerAPI::CreateTrustProfileRequest.new({email: 'email_example'}) # CreateTrustProfileRequest | 

begin
  # Create new trust investor profile.
  result = api_instance.create_trust_profile(create_trust_profile_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_trust_profile: #{e}"
end
```

#### Using the create_trust_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileTrust>, Integer, Hash)> create_trust_profile_with_http_info(create_trust_profile_request)

```ruby
begin
  # Create new trust investor profile.
  data, status_code, headers = api_instance.create_trust_profile_with_http_info(create_trust_profile_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileTrust>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_trust_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **create_trust_profile_request** | [**CreateTrustProfileRequest**](CreateTrustProfileRequest.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileTrust**](V1EntitiesInvestorProfileTrust.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## get_deal_investor_profiles

> <V1EntitiesInvestorProfiles> get_deal_investor_profiles(deal_id, opts)

Get list of InvestorProfiles for a specific deal

Get investor profiles for a specific deal

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
deal_id = 56 # Integer | The deal id.
opts = {
  page: 56, # Integer | Page offset to fetch.
  per_page: 56, # Integer | Number of results to return per page.
  offset: 56, # Integer | Pad a number of results.
  user_id: 56 # Integer | The user id filter.
}

begin
  # Get list of InvestorProfiles for a specific deal
  result = api_instance.get_deal_investor_profiles(deal_id, opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->get_deal_investor_profiles: #{e}"
end
```

#### Using the get_deal_investor_profiles_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfiles>, Integer, Hash)> get_deal_investor_profiles_with_http_info(deal_id, opts)

```ruby
begin
  # Get list of InvestorProfiles for a specific deal
  data, status_code, headers = api_instance.get_deal_investor_profiles_with_http_info(deal_id, opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfiles>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->get_deal_investor_profiles_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **deal_id** | **Integer** | The deal id. |  |
| **page** | **Integer** | Page offset to fetch. | [optional][default to 1] |
| **per_page** | **Integer** | Number of results to return per page. | [optional][default to 25] |
| **offset** | **Integer** | Pad a number of results. | [optional][default to 0] |
| **user_id** | **Integer** | The user id filter. | [optional] |

### Return type

[**V1EntitiesInvestorProfiles**](V1EntitiesInvestorProfiles.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_investor_profile

> <V1EntitiesInvestorProfileItem> get_investor_profile(id)

Get an investor profile by id

Get an investor profile

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
id = 56 # Integer | The id of the investor profile.

begin
  # Get an investor profile by id
  result = api_instance.get_investor_profile(id)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->get_investor_profile: #{e}"
end
```

#### Using the get_investor_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileItem>, Integer, Hash)> get_investor_profile_with_http_info(id)

```ruby
begin
  # Get an investor profile by id
  data, status_code, headers = api_instance.get_investor_profile_with_http_info(id)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileItem>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->get_investor_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The id of the investor profile. |  |

### Return type

[**V1EntitiesInvestorProfileItem**](V1EntitiesInvestorProfileItem.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## get_investor_profiles

> <V1EntitiesInvestorProfiles> get_investor_profiles(opts)

Get list of InvestorProfiles

Get investor profiles

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
opts = {
  page: 56, # Integer | Page offset to fetch.
  per_page: 56, # Integer | Number of results to return per page.
  offset: 56 # Integer | Pad a number of results.
}

begin
  # Get list of InvestorProfiles
  result = api_instance.get_investor_profiles(opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->get_investor_profiles: #{e}"
end
```

#### Using the get_investor_profiles_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfiles>, Integer, Hash)> get_investor_profiles_with_http_info(opts)

```ruby
begin
  # Get list of InvestorProfiles
  data, status_code, headers = api_instance.get_investor_profiles_with_http_info(opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfiles>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->get_investor_profiles_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **page** | **Integer** | Page offset to fetch. | [optional][default to 1] |
| **per_page** | **Integer** | Number of results to return per page. | [optional][default to 25] |
| **offset** | **Integer** | Pad a number of results. | [optional][default to 0] |

### Return type

[**V1EntitiesInvestorProfiles**](V1EntitiesInvestorProfiles.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json


## patch_corporation_profile

> <V1EntitiesInvestorProfileCorporation> patch_corporation_profile(investor_profile_id, patch_corporation_profile_request)

Patch a corporation investor profile

Patch corporation investor profile

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
investor_profile_id = 56 # Integer | 
patch_corporation_profile_request = DealMakerAPI::PatchCorporationProfileRequest.new({beneficial_owners_index: [37]}) # PatchCorporationProfileRequest | 

begin
  # Patch a corporation investor profile
  result = api_instance.patch_corporation_profile(investor_profile_id, patch_corporation_profile_request)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_corporation_profile: #{e}"
end
```

#### Using the patch_corporation_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileCorporation>, Integer, Hash)> patch_corporation_profile_with_http_info(investor_profile_id, patch_corporation_profile_request)

```ruby
begin
  # Patch a corporation investor profile
  data, status_code, headers = api_instance.patch_corporation_profile_with_http_info(investor_profile_id, patch_corporation_profile_request)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileCorporation>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_corporation_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profile_id** | **Integer** |  |  |
| **patch_corporation_profile_request** | [**PatchCorporationProfileRequest**](PatchCorporationProfileRequest.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileCorporation**](V1EntitiesInvestorProfileCorporation.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## patch_individual_profile

> <V1EntitiesInvestorProfileIndividual> patch_individual_profile(investor_profile_id, opts)

Patch an individual investor profile.

Patch individual investor profile.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
investor_profile_id = 56 # Integer | 
opts = {
  patch_individual_profile_request: DealMakerAPI::PatchIndividualProfileRequest.new # PatchIndividualProfileRequest | 
}

begin
  # Patch an individual investor profile.
  result = api_instance.patch_individual_profile(investor_profile_id, opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_individual_profile: #{e}"
end
```

#### Using the patch_individual_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileIndividual>, Integer, Hash)> patch_individual_profile_with_http_info(investor_profile_id, opts)

```ruby
begin
  # Patch an individual investor profile.
  data, status_code, headers = api_instance.patch_individual_profile_with_http_info(investor_profile_id, opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileIndividual>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_individual_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profile_id** | **Integer** |  |  |
| **patch_individual_profile_request** | [**PatchIndividualProfileRequest**](PatchIndividualProfileRequest.md) |  | [optional] |

### Return type

[**V1EntitiesInvestorProfileIndividual**](V1EntitiesInvestorProfileIndividual.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## patch_joint_profile

> <V1EntitiesInvestorProfileJoint> patch_joint_profile(investor_profile_id, opts)

Patch a joint investor profile

Patch joint investor profile

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
investor_profile_id = 56 # Integer | 
opts = {
  patch_joint_profile_request: DealMakerAPI::PatchJointProfileRequest.new # PatchJointProfileRequest | 
}

begin
  # Patch a joint investor profile
  result = api_instance.patch_joint_profile(investor_profile_id, opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_joint_profile: #{e}"
end
```

#### Using the patch_joint_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileJoint>, Integer, Hash)> patch_joint_profile_with_http_info(investor_profile_id, opts)

```ruby
begin
  # Patch a joint investor profile
  data, status_code, headers = api_instance.patch_joint_profile_with_http_info(investor_profile_id, opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileJoint>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_joint_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profile_id** | **Integer** |  |  |
| **patch_joint_profile_request** | [**PatchJointProfileRequest**](PatchJointProfileRequest.md) |  | [optional] |

### Return type

[**V1EntitiesInvestorProfileJoint**](V1EntitiesInvestorProfileJoint.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## patch_trust_profile

> <V1EntitiesInvestorProfileTrust> patch_trust_profile(investor_profile_id, opts)

Patch a trust investor profile

Patch trust investor profile

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
investor_profile_id = 56 # Integer | 
opts = {
  patch_trust_profile_request: DealMakerAPI::PatchTrustProfileRequest.new # PatchTrustProfileRequest | 
}

begin
  # Patch a trust investor profile
  result = api_instance.patch_trust_profile(investor_profile_id, opts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_trust_profile: #{e}"
end
```

#### Using the patch_trust_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileTrust>, Integer, Hash)> patch_trust_profile_with_http_info(investor_profile_id, opts)

```ruby
begin
  # Patch a trust investor profile
  data, status_code, headers = api_instance.patch_trust_profile_with_http_info(investor_profile_id, opts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileTrust>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_trust_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profile_id** | **Integer** |  |  |
| **patch_trust_profile_request** | [**PatchTrustProfileRequest**](PatchTrustProfileRequest.md) |  | [optional] |

### Return type

[**V1EntitiesInvestorProfileTrust**](V1EntitiesInvestorProfileTrust.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

