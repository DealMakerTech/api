# DealMakerAPI::V1EntitiesDealsProgressPageSummary

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investment_proceeds** | [**V1EntitiesDealsProgressPageSummaryItem**](V1EntitiesDealsProgressPageSummaryItem.md) |  | [optional] |
| **fees_and_adjustments** | [**V1EntitiesDealsProgressPageSummaryItem**](V1EntitiesDealsProgressPageSummaryItem.md) |  | [optional] |
| **total_proceeds** | [**V1EntitiesDealsProgressPageSummaryItem**](V1EntitiesDealsProgressPageSummaryItem.md) |  | [optional] |
| **processing_fees** | [**V1EntitiesDealsProgressPageSummaryItem**](V1EntitiesDealsProgressPageSummaryItem.md) |  | [optional] |
| **invoice_deductions** | [**V1EntitiesDealsProgressPageSummaryItem**](V1EntitiesDealsProgressPageSummaryItem.md) |  | [optional] |
| **holdback** | [**V1EntitiesDealsProgressPageSummaryItem**](V1EntitiesDealsProgressPageSummaryItem.md) |  | [optional] |
| **paid_out** | [**V1EntitiesDealsProgressPageSummaryItem**](V1EntitiesDealsProgressPageSummaryItem.md) |  | [optional] |
| **available_for_payout** | [**V1EntitiesDealsProgressPageSummaryItem**](V1EntitiesDealsProgressPageSummaryItem.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesDealsProgressPageSummary.new(
  investment_proceeds: null,
  fees_and_adjustments: null,
  total_proceeds: null,
  processing_fees: null,
  invoice_deductions: null,
  holdback: null,
  paid_out: null,
  available_for_payout: null
)
```

