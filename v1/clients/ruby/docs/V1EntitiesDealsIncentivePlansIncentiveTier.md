# DealMakerAPI::V1EntitiesDealsIncentivePlansIncentiveTier

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The incentive tier id. | [optional] |
| **status** | **String** | The incentive tier status. | [optional] |
| **humanized_index** | **Integer** | The incentive tier humanized index. | [optional] |
| **incentive_percentage** | **Float** | The incentive tier percentage. | [optional] |
| **end_at** | **Time** | The incentive tier end date. | [optional] |
| **start_at** | **Time** | The incentive plan start date. | [optional] |
| **funded_by** | **Time** | The incentive tier funded by date, it is computed from the end at and plan funded by offset. | [optional] |
| **created_at** | **Time** | The creation time. | [optional] |
| **updated_at** | **Time** | The last update time. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesDealsIncentivePlansIncentiveTier.new(
  id: null,
  status: null,
  humanized_index: null,
  incentive_percentage: null,
  end_at: null,
  start_at: null,
  funded_by: null,
  created_at: null,
  updated_at: null
)
```

