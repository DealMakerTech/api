# DealMakerAPI::V1EntitiesInvestorProfileJoint

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | Investor Profile id | [optional] |
| **user_id** | **Integer** | User id | [optional] |
| **email** | **String** | User email | [optional] |
| **type** | **String** | Investor Profile type | [optional] |
| **us_accredited_category** | **String** | The United States accredited investor information | [optional] |
| **ca_accredited_investor** | **String** | The Canadian accredited investor information | [optional] |
| **complete** | **Boolean** | To check if the profile is complete or not | [optional] |
| **owner_type** | **String** | Type of the investor profile owner | [optional] |
| **owner** | [**V1EntitiesInvestorProfileOwner**](V1EntitiesInvestorProfileOwner.md) |  | [optional] |
| **joint_type** | **String** | The kind of joint investor | [optional] |
| **primary_holder** | [**V1EntitiesInvestorProfileFieldsPrimaryHolder**](V1EntitiesInvestorProfileFieldsPrimaryHolder.md) |  | [optional] |
| **joint_holder** | [**V1EntitiesInvestorProfileFieldsAccountHolder**](V1EntitiesInvestorProfileFieldsAccountHolder.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesInvestorProfileJoint.new(
  id: null,
  user_id: null,
  email: null,
  type: null,
  us_accredited_category: null,
  ca_accredited_investor: null,
  complete: null,
  owner_type: null,
  owner: null,
  joint_type: null,
  primary_holder: null,
  joint_holder: null
)
```

