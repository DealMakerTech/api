# DealMakerAPI::PostDealIncentivePlanRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **active_at** | **Time** | The incentive plan active date. |  |
| **funded_by_offset** | **Integer** | The incentive plan funded by offset in days. | [optional][default to 0] |
| **tiers_incentive_percentage** | **Array&lt;Float&gt;** | The incentive plan tier percentage. |  |
| **tiers_end_at** | **Array&lt;Time&gt;** | The incentive plan tier end date. |  |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PostDealIncentivePlanRequest.new(
  active_at: null,
  funded_by_offset: null,
  tiers_incentive_percentage: null,
  tiers_end_at: null
)
```

