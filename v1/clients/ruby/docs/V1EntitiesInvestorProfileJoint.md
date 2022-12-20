# DealMakerAPI::V1EntitiesInvestorProfileJoint

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | Investor Profile id | [optional] |
| **user_id** | **Integer** | User id | [optional] |
| **email** | **String** | User email | [optional] |
| **type** | **String** | Investor Profile type | [optional] |
| **us_accredited_category** | **String** | The accredited investor information | [optional] |
| **complete** | **Boolean** | To check if the profile is complete or not | [optional] |
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
  complete: null,
  joint_type: null,
  primary_holder: null,
  joint_holder: null
)
```

