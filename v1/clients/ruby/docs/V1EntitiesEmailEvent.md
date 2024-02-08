# DealMakerAPI::V1EntitiesEmailEvent

## Properties

| Name | Type | Description | Notes |
| ---- | ---- | ----------- | ----- |
| **id** | **String** | The id of the email event. | [optional] |
| **name** | **String** | The name of the shareholder. | [optional] |
| **email** | **String** | The email of the shareholder. | [optional] |
| **delivered** | **Integer** | The number of email delivered. | [optional] |
| **opened** | **Integer** | The number of email opened. | [optional] |
| **clicked** | **Integer** | The number of email clicked. | [optional] |
| **bounced** | **Integer** | The number of email bounced. | [optional] |

## Example

```ruby
require 'DealMakerAPI'

instance = DealMakerAPI::V1EntitiesEmailEvent.new(
  id: null,
  name: null,
  email: null,
  delivered: null,
  opened: null,
  clicked: null,
  bounced: null
)
```

