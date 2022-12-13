# DealMakerAPI::V1EntitiesInvestorProfileIndividual

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | Investor Profile id | [optional] |
| **user_id** | **Integer** | User id | [optional] |
| **email** | **String** | User email | [optional] |
| **type** | **String** | Investor Profile type | [optional] |
| **us_accredited_category** | **String** | The accredited investor information | [optional] |
| **complete** | **Boolean** | To check if the profile is complete or not | [optional] |
| **account_holder** | [**V1EntitiesInvestorProfileFieldsPrimaryHolder**](V1EntitiesInvestorProfileFieldsPrimaryHolder.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesInvestorProfileIndividual.new(
  id: null,
  user_id: null,
  email: null,
  type: null,
  us_accredited_category: null,
  complete: null,
  account_holder: null
)
```

