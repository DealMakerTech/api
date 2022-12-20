# DealMakerAPI::UpdateInvestorRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **warrant_expiry_date** | **Date** | The warrant expiry date of the investor. | [optional] |
| **warrant_certificate_number** | **Integer** | The certificate number of the investor. | [optional] |
| **allocated_amount** | **Float** | The allocation amount of the investor. | [optional] |
| **allocation_unit** | **String** | The allocation unit of the investor. | [optional][default to &#39;securities&#39;] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::UpdateInvestorRequest.new(
  warrant_expiry_date: null,
  warrant_certificate_number: null,
  allocated_amount: null,
  allocation_unit: null
)
```

