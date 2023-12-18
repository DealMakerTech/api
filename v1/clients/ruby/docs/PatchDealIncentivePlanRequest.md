# DealMakerAPI::PatchDealIncentivePlanRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **active_at** | **Time** | The incentive plan active date. | [optional] |
| **funded_by_offset** | **Integer** | The incentive plan funded by offset in days. | [optional] |
| **tiers_id** | **Array&lt;Integer&gt;** | The incentive plan tier id. If none it will be created | [optional] |
| **tiers__delete** | **Array&lt;Boolean&gt;** | If true, this entry will be cleared. | [optional] |
| **tiers_incentive_percentage** | **Array&lt;Float&gt;** | The incentive plan tier percentage. | [optional] |
| **tiers_end_at** | **Array&lt;Time&gt;** | The incentive plan tier end date. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PatchDealIncentivePlanRequest.new(
  active_at: null,
  funded_by_offset: null,
  tiers_id: null,
  tiers__delete: null,
  tiers_incentive_percentage: null,
  tiers_end_at: null
)
```

