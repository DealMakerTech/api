# DealMakerAPI::V1EntitiesInvestorProfileFieldsTrust

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **name** | **String** | The name of the trust | [optional] |
| **date** | **String** | The creation date of the trust | [optional] |
| **phone_number** | **String** | The phone number of the trust | [optional] |
| **income** | **Float** | The income | [optional] |
| **net_worth** | **Float** | The net worth | [optional] |
| **reg_cf_prior_offerings_amount** | **Float** | The prior offering amount in the last 12 months | [optional] |
| **address** | [**V1EntitiesInvestorProfileAddress**](V1EntitiesInvestorProfileAddress.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesInvestorProfileFieldsTrust.new(
  name: null,
  date: null,
  phone_number: null,
  income: null,
  net_worth: null,
  reg_cf_prior_offerings_amount: null,
  address: null
)
```

