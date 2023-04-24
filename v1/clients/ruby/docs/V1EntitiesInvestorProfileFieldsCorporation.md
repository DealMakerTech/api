# DealMakerAPI::V1EntitiesInvestorProfileFieldsCorporation

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **name** | **String** | The corporation name | [optional] |
| **business_number** | **String** | The corporation business number | [optional] |
| **phone_number** | **String** | The corporation phone number | [optional] |
| **income** | **Float** | The income | [optional] |
| **net_worth** | **Float** | The net worth | [optional] |
| **reg_cf_prior_offerings_amount** | **Float** | The prior offering amount in the last 12 months | [optional] |
| **address** | [**V1EntitiesInvestorProfileAddress**](V1EntitiesInvestorProfileAddress.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesInvestorProfileFieldsCorporation.new(
  name: null,
  business_number: null,
  phone_number: null,
  income: null,
  net_worth: null,
  reg_cf_prior_offerings_amount: null,
  address: null
)
```

