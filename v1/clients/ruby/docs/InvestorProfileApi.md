# DealMakerAPI::InvestorProfileApi

All URIs are relative to *http://api.dealmaker.tech*

| Method | HTTP request | Description |
| ------ | ------------ | ----------- |
| [**create_corporation_profile**](InvestorProfileApi.md#create_corporation_profile) | **POST** /investor_profiles/corporations | Create new corporation investor profile. |
| [**create_individual_profile**](InvestorProfileApi.md#create_individual_profile) | **POST** /investor_profiles/individuals | Create new individual investor profile |
| [**create_joint_profile**](InvestorProfileApi.md#create_joint_profile) | **POST** /investor_profiles/joints | Create new joint investor profile |
| [**create_managed_profile**](InvestorProfileApi.md#create_managed_profile) | **POST** /investor_profiles/managed | Create new managed investor profile. |
| [**create_trust_profile**](InvestorProfileApi.md#create_trust_profile) | **POST** /investor_profiles/trusts | Create new trust investor profile. |
| [**get_deal_investor_profiles**](InvestorProfileApi.md#get_deal_investor_profiles) | **GET** /investor_profiles/{deal_id} | Get list of InvestorProfiles for a specific deal |
| [**get_investor_profile**](InvestorProfileApi.md#get_investor_profile) | **GET** /investor_profiles/profile/{id} | Get an investor profile by id |
| [**get_investor_profiles**](InvestorProfileApi.md#get_investor_profiles) | **GET** /investor_profiles | Get list of InvestorProfiles |
| [**patch_corporation_profile**](InvestorProfileApi.md#patch_corporation_profile) | **PATCH** /investor_profiles/corporations/{investor_profile_id} | Patch a corporation investor profile |
| [**patch_individual_profile**](InvestorProfileApi.md#patch_individual_profile) | **PATCH** /investor_profiles/individuals/{investor_profile_id} | Patch an individual investor profile. |
| [**patch_joint_profile**](InvestorProfileApi.md#patch_joint_profile) | **PATCH** /investor_profiles/joints/{investor_profile_id} | Patch a joint investor profile |
| [**patch_managed_profile**](InvestorProfileApi.md#patch_managed_profile) | **PATCH** /investor_profiles/managed/{investor_profile_id} | Patch managed investor profile. |
| [**patch_trust_profile**](InvestorProfileApi.md#patch_trust_profile) | **PATCH** /investor_profiles/trusts/{investor_profile_id} | Patch a trust investor profile |


## create_corporation_profile

> <V1EntitiesInvestorProfileId> create_corporation_profile(investor_profiles_corporations)

Create new corporation investor profile.

Create new corporation investor profile associated to the user by email.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
investor_profiles_corporations = DealMakerAPI::PostInvestorProfilesCorporations.new({email: 'email_example'}) # PostInvestorProfilesCorporations | 

begin
  # Create new corporation investor profile.
  result = api_instance.create_corporation_profile(investor_profiles_corporations)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_corporation_profile: #{e}"
end
```

#### Using the create_corporation_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileId>, Integer, Hash)> create_corporation_profile_with_http_info(investor_profiles_corporations)

```ruby
begin
  # Create new corporation investor profile.
  data, status_code, headers = api_instance.create_corporation_profile_with_http_info(investor_profiles_corporations)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileId>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_corporation_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profiles_corporations** | [**PostInvestorProfilesCorporations**](PostInvestorProfilesCorporations.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## create_individual_profile

> <V1EntitiesInvestorProfileId> create_individual_profile(investor_profiles_individuals)

Create new individual investor profile

Create new individual investor profile associated to the user by email.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
investor_profiles_individuals = DealMakerAPI::PostInvestorProfilesIndividuals.new({email: 'email_example'}) # PostInvestorProfilesIndividuals | 

begin
  # Create new individual investor profile
  result = api_instance.create_individual_profile(investor_profiles_individuals)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_individual_profile: #{e}"
end
```

#### Using the create_individual_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileId>, Integer, Hash)> create_individual_profile_with_http_info(investor_profiles_individuals)

```ruby
begin
  # Create new individual investor profile
  data, status_code, headers = api_instance.create_individual_profile_with_http_info(investor_profiles_individuals)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileId>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_individual_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profiles_individuals** | [**PostInvestorProfilesIndividuals**](PostInvestorProfilesIndividuals.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## create_joint_profile

> <V1EntitiesInvestorProfileId> create_joint_profile(investor_profiles_joints)

Create new joint investor profile

Create new joint investor profile associated to the user by email.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
investor_profiles_joints = DealMakerAPI::PostInvestorProfilesJoints.new({email: 'email_example'}) # PostInvestorProfilesJoints | 

begin
  # Create new joint investor profile
  result = api_instance.create_joint_profile(investor_profiles_joints)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_joint_profile: #{e}"
end
```

#### Using the create_joint_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileId>, Integer, Hash)> create_joint_profile_with_http_info(investor_profiles_joints)

```ruby
begin
  # Create new joint investor profile
  data, status_code, headers = api_instance.create_joint_profile_with_http_info(investor_profiles_joints)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileId>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_joint_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profiles_joints** | [**PostInvestorProfilesJoints**](PostInvestorProfilesJoints.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## create_managed_profile

> <V1EntitiesInvestorProfileId> create_managed_profile(investor_profiles_managed)

Create new managed investor profile.

Create new managed investor profile associated to the user by email.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
investor_profiles_managed = DealMakerAPI::PostInvestorProfilesManaged.new({email: 'email_example'}) # PostInvestorProfilesManaged | 

begin
  # Create new managed investor profile.
  result = api_instance.create_managed_profile(investor_profiles_managed)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_managed_profile: #{e}"
end
```

#### Using the create_managed_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileId>, Integer, Hash)> create_managed_profile_with_http_info(investor_profiles_managed)

```ruby
begin
  # Create new managed investor profile.
  data, status_code, headers = api_instance.create_managed_profile_with_http_info(investor_profiles_managed)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileId>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_managed_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profiles_managed** | [**PostInvestorProfilesManaged**](PostInvestorProfilesManaged.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## create_trust_profile

> <V1EntitiesInvestorProfileId> create_trust_profile(investor_profiles_trusts)

Create new trust investor profile.

Create new trust investor profile associated to the user by email.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
investor_profiles_trusts = DealMakerAPI::PostInvestorProfilesTrusts.new({email: 'email_example'}) # PostInvestorProfilesTrusts | 

begin
  # Create new trust investor profile.
  result = api_instance.create_trust_profile(investor_profiles_trusts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_trust_profile: #{e}"
end
```

#### Using the create_trust_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileId>, Integer, Hash)> create_trust_profile_with_http_info(investor_profiles_trusts)

```ruby
begin
  # Create new trust investor profile.
  data, status_code, headers = api_instance.create_trust_profile_with_http_info(investor_profiles_trusts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileId>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->create_trust_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profiles_trusts** | [**PostInvestorProfilesTrusts**](PostInvestorProfilesTrusts.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## get_deal_investor_profiles

> <V1EntitiesInvestorProfiles> get_deal_investor_profiles(deal_id, opts)

Get list of InvestorProfiles for a specific deal

Get investor profiles for a specific deal. Because an investor profile belongs                     to the user associated with it, external applications may not use this endpoint                     for other profiles. Only the user may use this endpoint for their own profiles                     (i.e. to see existing profiles within the DealMaker application).

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

Get an investor profile. Because an investor profile belongs to the user associated with it, external applications                     may not use this endpoint for other profiles. Only the user may use this endpoint for their own profiles (i.e. to                     see existing profiles within the DealMaker application).

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

Get investor profiles. Because an investor profile belongs to the user associated with it, external                     applications may not use this endpoint for other profiles. Only the user may use this endpoint for                     their own profiles (i.e. to see existing profiles within the DealMaker application).

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

> <V1EntitiesInvestorProfileId> patch_corporation_profile(investor_profile_id, investor_profiles_corporations)

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
investor_profiles_corporations = DealMakerAPI::PatchInvestorProfilesCorporations.new # PatchInvestorProfilesCorporations | 

begin
  # Patch a corporation investor profile
  result = api_instance.patch_corporation_profile(investor_profile_id, investor_profiles_corporations)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_corporation_profile: #{e}"
end
```

#### Using the patch_corporation_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileId>, Integer, Hash)> patch_corporation_profile_with_http_info(investor_profile_id, investor_profiles_corporations)

```ruby
begin
  # Patch a corporation investor profile
  data, status_code, headers = api_instance.patch_corporation_profile_with_http_info(investor_profile_id, investor_profiles_corporations)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileId>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_corporation_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profile_id** | **Integer** |  |  |
| **investor_profiles_corporations** | [**PatchInvestorProfilesCorporations**](PatchInvestorProfilesCorporations.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## patch_individual_profile

> <V1EntitiesInvestorProfileId> patch_individual_profile(investor_profile_id, investor_profiles_individuals)

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
investor_profiles_individuals = DealMakerAPI::PatchInvestorProfilesIndividuals.new # PatchInvestorProfilesIndividuals | 

begin
  # Patch an individual investor profile.
  result = api_instance.patch_individual_profile(investor_profile_id, investor_profiles_individuals)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_individual_profile: #{e}"
end
```

#### Using the patch_individual_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileId>, Integer, Hash)> patch_individual_profile_with_http_info(investor_profile_id, investor_profiles_individuals)

```ruby
begin
  # Patch an individual investor profile.
  data, status_code, headers = api_instance.patch_individual_profile_with_http_info(investor_profile_id, investor_profiles_individuals)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileId>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_individual_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profile_id** | **Integer** |  |  |
| **investor_profiles_individuals** | [**PatchInvestorProfilesIndividuals**](PatchInvestorProfilesIndividuals.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## patch_joint_profile

> <V1EntitiesInvestorProfileId> patch_joint_profile(investor_profile_id, investor_profiles_joints)

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
investor_profiles_joints = DealMakerAPI::PatchInvestorProfilesJoints.new # PatchInvestorProfilesJoints | 

begin
  # Patch a joint investor profile
  result = api_instance.patch_joint_profile(investor_profile_id, investor_profiles_joints)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_joint_profile: #{e}"
end
```

#### Using the patch_joint_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileId>, Integer, Hash)> patch_joint_profile_with_http_info(investor_profile_id, investor_profiles_joints)

```ruby
begin
  # Patch a joint investor profile
  data, status_code, headers = api_instance.patch_joint_profile_with_http_info(investor_profile_id, investor_profiles_joints)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileId>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_joint_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profile_id** | **Integer** |  |  |
| **investor_profiles_joints** | [**PatchInvestorProfilesJoints**](PatchInvestorProfilesJoints.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## patch_managed_profile

> <V1EntitiesInvestorProfileId> patch_managed_profile(investor_profile_id, investor_profiles_managed)

Patch managed investor profile.

Patch managed investor profile associated to the profile id.

### Examples

```ruby
require 'time'
require 'DealMakerAPI'
# setup authorization
DealMakerAPI.configure do |config|end

api_instance = DealMakerAPI::InvestorProfileApi.new
investor_profile_id = 56 # Integer | 
investor_profiles_managed = DealMakerAPI::PatchInvestorProfilesManaged.new({email: 'email_example'}) # PatchInvestorProfilesManaged | 

begin
  # Patch managed investor profile.
  result = api_instance.patch_managed_profile(investor_profile_id, investor_profiles_managed)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_managed_profile: #{e}"
end
```

#### Using the patch_managed_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileId>, Integer, Hash)> patch_managed_profile_with_http_info(investor_profile_id, investor_profiles_managed)

```ruby
begin
  # Patch managed investor profile.
  data, status_code, headers = api_instance.patch_managed_profile_with_http_info(investor_profile_id, investor_profiles_managed)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileId>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_managed_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profile_id** | **Integer** |  |  |
| **investor_profiles_managed** | [**PatchInvestorProfilesManaged**](PatchInvestorProfilesManaged.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json


## patch_trust_profile

> <V1EntitiesInvestorProfileId> patch_trust_profile(investor_profile_id, investor_profiles_trusts)

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
investor_profiles_trusts = DealMakerAPI::PatchInvestorProfilesTrusts.new # PatchInvestorProfilesTrusts | 

begin
  # Patch a trust investor profile
  result = api_instance.patch_trust_profile(investor_profile_id, investor_profiles_trusts)
  p result
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_trust_profile: #{e}"
end
```

#### Using the patch_trust_profile_with_http_info variant

This returns an Array which contains the response data, status code and headers.

> <Array(<V1EntitiesInvestorProfileId>, Integer, Hash)> patch_trust_profile_with_http_info(investor_profile_id, investor_profiles_trusts)

```ruby
begin
  # Patch a trust investor profile
  data, status_code, headers = api_instance.patch_trust_profile_with_http_info(investor_profile_id, investor_profiles_trusts)
  p status_code # => 2xx
  p headers # => { ... }
  p data # => <V1EntitiesInvestorProfileId>
rescue DealMakerAPI::ApiError => e
  puts "Error when calling InvestorProfileApi->patch_trust_profile_with_http_info: #{e}"
end
```

### Parameters

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investor_profile_id** | **Integer** |  |  |
| **investor_profiles_trusts** | [**PatchInvestorProfilesTrusts**](PatchInvestorProfilesTrusts.md) |  |  |

### Return type

[**V1EntitiesInvestorProfileId**](V1EntitiesInvestorProfileId.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: application/json

