# DealMakerAPI::PatchPlatformEmailRequest

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **enabled** | **Boolean** | Specifies if platform email is enabled. |  |
| **subject** | **String** | The platform email subject. |  |
| **reminder_number** | **Integer** | The number of reminder_type periods of platform email. |  |
| **reminder_type** | **String** | The reminder type of platform email. |  |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::PatchPlatformEmailRequest.new(
  enabled: null,
  subject: null,
  reminder_number: null,
  reminder_type: null
)
```

