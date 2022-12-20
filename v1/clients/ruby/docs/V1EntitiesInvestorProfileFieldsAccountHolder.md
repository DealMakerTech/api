# DealMakerAPI::V1EntitiesInvestorProfileFieldsAccountHolder

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **first_name** | **String** | Investor profile first name | [optional] |
| **last_name** | **String** | Investor profile last name | [optional] |
| **suffix** | **String** | Investor profile suffix | [optional] |
| **date_of_birth** | **String** | The date of birth | [optional] |
| **taxpayer_id** | **String** | The taxpayer identification number | [optional] |
| **address** | [**V1EntitiesInvestorProfileAddress**](V1EntitiesInvestorProfileAddress.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesInvestorProfileFieldsAccountHolder.new(
  first_name: null,
  last_name: null,
  suffix: null,
  date_of_birth: null,
  taxpayer_id: null,
  address: null
)
```

