# DealMakerAPI::V1EntitiesDealsIncentivePlan

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The incentive plan id. | [optional] |
| **deal_id** | **Integer** | The deal id. | [optional] |
| **plan_type** | **String** | The incentive plan type. | [optional] |
| **funded_by_offset** | **Integer** | The incentive plan funded by offset. | [optional] |
| **active_at** | **Time** | The incentive plan active date. | [optional] |
| **created_at** | **Time** | The creation time. | [optional] |
| **updated_at** | **Time** | The last update time. | [optional] |
| **tiers** | [**V1EntitiesDealsIncentivePlansIncentiveTier**](V1EntitiesDealsIncentivePlansIncentiveTier.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesDealsIncentivePlan.new(
  id: null,
  deal_id: null,
  plan_type: null,
  funded_by_offset: null,
  active_at: null,
  created_at: null,
  updated_at: null,
  tiers: null
)
```

