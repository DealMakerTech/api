# DealMakerAPI::V1EntitiesInvestorPriceDetails

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investment_amount** | **String** | The investment amount in dollar. | [optional] |
| **full_investment_amount** | **String** | The investment amount at full price to get the same number of securities | [optional] |
| **saved_investment_amount** | **String** | The saved amount. | [optional] |
| **number_of_securities** | **Integer** | The number of securities. | [optional] |
| **full_number_of_securities** | **Integer** | The number of securities you could get at full price | [optional] |
| **full_price** | [**V1EntitiesMoneyEntity**](V1EntitiesMoneyEntity.md) |  | [optional] |
| **final_price** | [**V1EntitiesMoneyEntity**](V1EntitiesMoneyEntity.md) |  | [optional] |
| **effective_tier** | [**V1EntitiesInvestorIncentiveTier**](V1EntitiesInvestorIncentiveTier.md) |  | [optional] |
| **incentive_plan** | [**V1EntitiesInvestorIncentivePlan**](V1EntitiesInvestorIncentivePlan.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesInvestorPriceDetails.new(
  investment_amount: null,
  full_investment_amount: null,
  saved_investment_amount: null,
  number_of_securities: null,
  full_number_of_securities: null,
  full_price: null,
  final_price: null,
  effective_tier: null,
  incentive_plan: null
)
```

