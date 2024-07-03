# DealMakerAPI::V1EntitiesDealsPlatformEmail

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **Integer** | The platform email id. | [optional] |
| **kind** | **String** | The platform email kind. | [optional] |
| **enabled** | **Boolean** | Specifies if platform email is enabled. | [optional] |
| **subject** | **String** | The platform email subject. | [optional] |
| **last_reminder** | **Time** | The platform email last reminder. | [optional] |
| **reminder_number** | **String** | The number of reminder_type periods of platform email. | [optional] |
| **reminder_type** | **String** | The reminder type of platform email. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesDealsPlatformEmail.new(
  id: null,
  kind: null,
  enabled: null,
  subject: null,
  last_reminder: null,
  reminder_number: null,
  reminder_type: null
)
```

