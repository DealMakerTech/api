# DealMakerAPI::V1EntitiesDealsProgressPageSummary

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **investment_proceeds** | **Float** | Investment Proceeds | [optional] |
| **fees_and_adjustments** | **Float** | Fees and Adjustments | [optional] |
| **total_proceeds** | **Float** | Total Proceeds | [optional] |
| **processing_fees** | **Float** | Processing Fees | [optional] |
| **invoice_deductions** | **Float** | Invoice Deductions | [optional] |
| **holdback** | **Float** | Holdback | [optional] |
| **paid_out** | **Float** | Paid Out | [optional] |
| **available_for_payout** | **Float** | Available for Payout | [optional] |

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

