# DealMakerAPI::V1EntitiesDealsPriceDetails

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **full_price** | [**V1EntitiesMoneyEntity**](V1EntitiesMoneyEntity.md) |  | [optional] |
| **final_price** | [**V1EntitiesMoneyEntity**](V1EntitiesMoneyEntity.md) |  | [optional] |
| **computed_investment_amount** | **Float** | The computed valid investment amount based on a given investment amount. | [optional] |
| **computed_number_of_securities** | **Integer** | The computed number of securities that can be purchased with a given investment amount. | [optional] |
| **effective_tier** | [**V1EntitiesDealsIncentivePlansIncentiveTier**](V1EntitiesDealsIncentivePlansIncentiveTier.md) |  | [optional] |
| **incentive_plan** | [**V1EntitiesDealsIncentivePlan**](V1EntitiesDealsIncentivePlan.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesDealsPriceDetails.new(
  full_price: null,
  final_price: null,
  computed_investment_amount: null,
  computed_number_of_securities: null,
  effective_tier: null,
  incentive_plan: null
)
```

