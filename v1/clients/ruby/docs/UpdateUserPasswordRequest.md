# DealMakerAPI::UpdateUserPasswordRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **password** | **String** | The new password for the user. |  |
| **current_password** | **String** | The current password for the user. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::UpdateUserPasswordRequest.new(
  password: null,
  current_password: null
)
```

