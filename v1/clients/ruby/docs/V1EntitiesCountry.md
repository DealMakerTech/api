# DealMakerAPI::V1EntitiesCountry

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **country** | **String** | The name of the country. | [optional] |
| **country_code** | **String** | The country code. | [optional] |
| **states** | [**V1EntitiesState**](V1EntitiesState.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesCountry.new(
  country: null,
  country_code: null,
  states: null
)
```

