# DealMakerAPI::V1EntitiesInvestorProfileFieldsPrimaryHolder

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **first_name** | **String** | Investor profile first name | [optional] |
| **last_name** | **String** | Investor profile last name | [optional] |
| **suffix** | **String** | Investor profile suffix | [optional] |
| **date_of_birth** | **String** | The date of birth | [optional] |
| **taxpayer_id** | **String** | The taxpayer identification number | [optional] |
| **phone_number** | **String** | The phone number of the primary account holder | [optional] |
| **income** | **Float** | The income | [optional] |
| **net_worth** | **Float** | The net worth | [optional] |
| **reg_cf_prior_offerings_amount** | **Float** | The prior offering amount in the last 12 months | [optional] |
| **address** | [**V1EntitiesInvestorProfileAddress**](V1EntitiesInvestorProfileAddress.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesInvestorProfileFieldsPrimaryHolder.new(
  first_name: null,
  last_name: null,
  suffix: null,
  date_of_birth: null,
  taxpayer_id: null,
  phone_number: null,
  income: null,
  net_worth: null,
  reg_cf_prior_offerings_amount: null,
  address: null
)
```

