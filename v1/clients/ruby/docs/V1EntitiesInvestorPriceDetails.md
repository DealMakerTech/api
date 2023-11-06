# DealMakerAPI::V1EntitiesInvestorPriceDetails

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **full_price** | [**V1EntitiesMoneyEntity**](V1EntitiesMoneyEntity.md) |  | [optional] |
| **final_price** | [**V1EntitiesMoneyEntity**](V1EntitiesMoneyEntity.md) |  | [optional] |
| **effective_tier** | [**V1EntitiesInvestorIncentiveTier**](V1EntitiesInvestorIncentiveTier.md) |  | [optional] |
| **incentive_plan** | [**V1EntitiesInvestorIncentivePlan**](V1EntitiesInvestorIncentivePlan.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesInvestorPriceDetails.new(
  full_price: null,
  final_price: null,
  effective_tier: null,
  incentive_plan: null
)
```

