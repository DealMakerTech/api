# DealMakerAPI::V1EntitiesInvestorProfileFieldsProvider

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **name** | **String** | The provider name | [optional] |
| **taxpayer_id** | **String** | The taxpayer identification number | [optional] |
| **confirmation** | **Boolean** | Confirms that the provider is able to custody these securities and release respective funds in order to complete the purchase | [optional] |
| **income** | **Float** | The income | [optional] |
| **net_worth** | **Float** | The net worth | [optional] |
| **reg_cf_prior_offerings_amount** | **Float** | The prior offering amount in the last 12 months | [optional] |
| **address** | [**V1EntitiesInvestorProfileAddress**](V1EntitiesInvestorProfileAddress.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesInvestorProfileFieldsProvider.new(
  name: null,
  taxpayer_id: null,
  confirmation: null,
  income: null,
  net_worth: null,
  reg_cf_prior_offerings_amount: null,
  address: null
)
```

