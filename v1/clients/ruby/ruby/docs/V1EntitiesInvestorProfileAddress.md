# DealMakerAPI::V1EntitiesInvestorProfileAddress

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **street_address** | **String** | Investor profile street address | [optional] |
| **unit2** | **String** | Investor profile street address line 2 | [optional] |
| **city** | **String** | Investor profile city | [optional] |
| **region** | **String** | Investor profile region or state | [optional] |
| **country** | **String** | Investor profile country | [optional] |
| **postal_code** | **String** | Investor profile postal code or zipcode | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesInvestorProfileAddress.new(
  street_address: null,
  unit2: null,
  city: null,
  region: null,
  country: null,
  postal_code: null
)
```

