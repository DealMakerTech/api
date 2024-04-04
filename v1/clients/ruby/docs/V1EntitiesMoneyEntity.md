# DealMakerAPI::V1EntitiesMoneyEntity

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **amount** | **Float** | The amount of money. | [optional] |
| **amount_cents** | **Float** | The amount of money in cents. | [optional] |
| **formatted_amount** | **String** | A string representation of the amount | [optional] |
| **currency** | **String** | The currency of the money. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesMoneyEntity.new(
  amount: null,
  amount_cents: null,
  formatted_amount: null,
  currency: null
)
```

