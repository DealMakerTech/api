# DealMakerAPI::V1EntitiesInvestorSearchEntities

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | Search entity ID. | [optional] |
| **name** | **String** | The full name of the entity. | [optional] |
| **type** | **String** | The type of the entity. | [optional] |
| **type_num** | **String** | The position in the list when beneficial owner of trustees, if none it returns null. | [optional] |
| **required_fields** | [**V1EntitiesInvestorSearchEntitiesRequiredFields**](V1EntitiesInvestorSearchEntitiesRequiredFields.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesInvestorSearchEntities.new(
  id: null,
  name: null,
  type: null,
  type_num: null,
  required_fields: null
)
```

