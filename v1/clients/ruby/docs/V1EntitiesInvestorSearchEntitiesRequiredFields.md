# DealMakerAPI::V1EntitiesInvestorSearchEntitiesRequiredFields

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **count** | **Integer** | The quantity of fields that needs to be updated. | [optional] |
| **name** | **Boolean** | Whether or not the name needs to be updated. | [optional] |
| **address** | **Boolean** | Whether or not the address needs to be updated. | [optional] |
| **date_of_birth** | **Boolean** | Whether or not the date of birth needs to be updated. | [optional] |
| **tin** | **Boolean** | Whether or not the taxpayer identification number needs to be updated. | [optional] |
| **enforcements** | **Boolean** | Whether or not entity is flagged due to enforcements | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesInvestorSearchEntitiesRequiredFields.new(
  count: null,
  name: null,
  address: null,
  date_of_birth: null,
  tin: null,
  enforcements: null
)
```

