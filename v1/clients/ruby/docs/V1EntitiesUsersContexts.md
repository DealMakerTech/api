# DealMakerAPI::V1EntitiesUsersContexts

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **has_investments** | **Boolean** | A boolean indicating if the user has investments. | [optional] |
| **default** | [**V1EntitiesUsersContext**](V1EntitiesUsersContext.md) |  | [optional] |
| **contexts** | [**V1EntitiesUsersContext**](V1EntitiesUsersContext.md) |  | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesUsersContexts.new(
  has_investments: null,
  default: null,
  contexts: null
)
```

